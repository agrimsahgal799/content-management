<input type="hidden" class="secure_csrf" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
<div class="heading mb-4 d-flex flex-row justify-content-between">
    <div class="h4">Contacts</div>
    <a type="button" class="btn btn-primary" href="<?= base_url(); ?>contact/create">Add New</a>
</div>
<table class="table table-bordered" id="contacts-table">
    <thead class="table-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Group</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($contacts) && count($contacts)>0){ ?>
            <?php foreach($contacts as $item){ ?>
                <tr>
                    <th scope="row"><?= $item->id ?></th>
                    <td><?= $item->name ?></td>
                    <td><?= $item->email ?></td>
                    <td><?= $item->phone ?></td>
                    <td><?= $item->group_name ?></td>
                    <td>
                        <a class="text-action edit text-decoration-none text-success" href="<?= base_url(); ?>contact/update/<?= $item->id; ?>" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                        <a class="text-action delete text-decoration-none text-danger" onClick="deleteContact(<?= $item->id; ?>)" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
        <?php } }?>
    </tbody>
</table>

<div class="modal" id="delete-contact-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div>Are you really going to delete this contact?</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-sm btn-danger" id="delete-contact" data-id="">Delete</button>
      </div>
    </div>
  </div>
</div>