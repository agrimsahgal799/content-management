<div class="heading mb-3 d-flex flex-row justify-content-between align-items-center">
    <div class="h4 mb-0"><?= $title; ?></div>
    <a type="button" class="btn btn-secondary" href="<?= base_url(); ?>">Back</a>
</div>

<?= validation_list_errors() ?>
<form action="<?= base_url();?>contact/save" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?= isset($contact->id) ? $contact->id : '' ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="<?= isset($contact->name) ? $contact->name : old('name') ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="text" name="email" class="form-control" id="email" value="<?= isset($contact->email) ? $contact->email : old('email') ?>">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" value="<?= isset($contact->phone) && $contact->phone!='' ? $contact->phone : old('phone') ?>">
    </div>
    <div class="mb-3">
        <label for="group_id" class="form-label">Group</label>
        <select class="form-select" name="group_id">
            <?php if($groups){ ?>
            <?php foreach($groups as $item){  ?>
                <option value="<?= $item['id'] ?>" <?= isset($contact->group_id) && $contact->group_id == $item['id'] ? 'selected' : '' ?>><?= $item['group_name'] ?></option>
            <?php }} ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>