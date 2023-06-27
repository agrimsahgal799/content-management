<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * model ContactModel
 * contain database functions for contacts (get, delete etc.).
*/
class ContactModel extends Model
{   
    protected $db;
    protected $table         = 'contacts';
    protected $allowedFields = ['group_id','name','email','phone'];

    public function __construct(){
        $conn = \Config\Database::connect();
        $this->db = $conn->table('contacts');
    }

    public function getContacts(){
        $this->db->join("groups", "groups.id=contacts.group_id");
        $sql = $this->db->select("contacts.*, groups.group_name")->orderBy('contacts.id','DESC');
        $data = $sql->get();
        return $data->getResult();
    }

    public function getContactById($id){
        $data = $this->db->where('id',$id)->get();
        return $data->getRow();
    }

    public function deletePost($id){
        $this->db->delete(['id'=>$id]);
    }
}
