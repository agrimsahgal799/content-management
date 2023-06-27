<div class="heading mb-3 d-flex flex-row justify-content-between align-items-center">
    <div class="h4 mb-0"><?= $title; ?></div>
    <a type="button" class="btn btn-secondary" href="<?= base_url(); ?>">Back</a>
</div>

<?= validation_list_errors() ?>
<form action="<?= base_url();?>contact/save" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="<?= old('name') ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="text" name="email" class="form-control" id="email" value="<?= old('email') ?>">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" value="<?= old('phone') ?>">
    </div>
    <div class="mb-3">
        <label for="group_id" class="form-label">Group</label>
        <select class="form-select" name="group_id">
            <?php if($groups){ ?>
            <?php foreach($groups as $item){  ?>
                <option value="<?= $item['id'] ?>"><?= $item['group_name'] ?></option>
            <?php }} ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>