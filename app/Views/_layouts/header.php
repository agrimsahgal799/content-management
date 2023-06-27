<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Management System</title>
    <meta name="description" content="Contact Management System">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    
    <!-- dataTable style : start -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.dataTables.min.css">
    <!-- dataTable style : end -->
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>
<header>
    <div class="menu pb-2 pl-2 pt-1">
        <a href="<?php echo base_url(); ?>" class="text-decoration-none text-dark item-inline-block">
            <h3>Contact Management</h3>
        </a>
    </div>
</header>
<section>

<?php if( session()->getFlashdata('success') ){ ?>
    <div class="success_msg flash-message"><?= session()->getFlashdata('success') ?></div>
<?php } ?>
<?php if( session()->getFlashdata('error') ){ ?>
    <div class="error_msg flash-message"><?= session()->getFlashdata('error') ?></div>
<?php } ?>

<div class="ajax-msg-success success_msg flash-message d-none"></div>
<div class="ajax-msg-error error_msg flash-message d-none"></div>