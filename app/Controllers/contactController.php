<?php

namespace App\Controllers;
use App\Models\GroupModel;
use App\Models\ContactModel;
use Config\Services;

/**
 * class contactController
 * contain all CRUD functions (add, update, view, and delete) to manage contacts.
*/
class contactController extends BaseController
{    
    protected $helpers = ['form'];
    protected $session;

    public function __construct(){
        $conn = \Config\Database::connect();
        $this->db = $conn->table('contacts');
        $this->session = session();
    }

    public function index()
    {
        $contact_obj = model(ContactModel::class);
        $contacts = $contact_obj->getContacts();
        $data['contacts'] = $contacts;
        return view('_layouts/header')
        .view('contacts/view', $data)
        .view('_layouts/footer');
    }
    
    public function create(){
        $group_obj = model(GroupModel::class);
        $groups = $group_obj->getGroups();
        $data['groups'] = $groups;
        $data['title'] = "Add Contact";
        return view('_layouts/header')
        .view('contacts/create', $data)
        .view('_layouts/footer');
    }

    public function save(){
    
        if (! $this->request->is('post')) {
            return redirect()->back();
        }

        $update_id = false;
        $id = $this->request->getVar('id');
        if(isset($id) && $id!=''){
            $update_id = $id;
        }

        $post = $this->request->getPost(['name', 'email', 'phone','group_id']);

        $rules = [
            'name' => 'required|max_length[100]|min_length[2]',
            'phone' => 'integer|max_length[10]|permit_empty',
            'group_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Group field is required.',
                ]
            ]
        ];
        if($update_id){
            $rules['email'] = [
                'rules' => "required|valid_email|is_unique[contacts.email,id,$update_id]",
                'errors' => [
                    'is_unique' => 'Email already exists.',
                ]
            ];
        }else{
            $rules['email'] = [
                'rules' => 'required|valid_email|is_unique[contacts.email]',
                'errors' => [
                    'is_unique' => 'Email already exists.',
                ]
            ];
        }

        if (! $this->validateData($post, $rules)) {
            return redirect()->back()->withInput();
        }

        $contact_obj = model(ContactModel::class);
        $save_array = [
            'name' => $post['name'],
            'email'  => $post['email'],
            'phone'  => $post['phone'],
            'group_id' => $post['group_id']
        ];
        if($update_id){
            $save_array['id'] = $update_id;
        }
        $contact_obj->save($save_array);

        if($update_id){
            $this->session->setFlashdata('success', 'Contact updated successfully.');
        }
        else{
            $this->session->setFlashdata('success', 'Contact created successfully.');
        }
        return redirect()->route('/');
    }

    public function update($id = false){
        
        $contact_obj = model(ContactModel::class);
        $contact = $contact_obj->getContactById($id);
        if(!$contact){
            $this->session->setFlashdata('error', 'Record not found!');
            return redirect()->route('/');
        }
        
        $group_obj = model(GroupModel::class);
        $groups = $group_obj->getGroups();
        $data['groups'] = $groups;
        $data['title'] = "Update Contact";
        $data['contact'] = $contact;
        return view('_layouts/header')
        .view('contacts/update', $data)
        .view('_layouts/footer');
    }

    public function delete(){
        $id = $this->request->getPost('id');
        $contact_obj = model(ContactModel::class);
        $get_contact = $contact_obj->getContactById($id);
        if(!$get_contact){
            $data['error'] = 'true';
            $data['msg'] = 'Something went wrong! contact not deleted.';
        }
        else{
            $contact_obj->deletePost($id);
            $data['error'] = 'false';
            $data['msg'] = 'Contact deleted successfully.';
        }
        return $this->response->setJSON($data);
    }
}
