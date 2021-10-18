<?php if (isset($_SESSION['success'])) : ?>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <?php echo $_SESSION['success']; ?>
</div>
<?php endif;
unset($_SESSION['success']); ?>

<?php if (isset($_SESSION['error'])) : ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <?php echo $_SESSION['error']; ?>
</div>
<?php endif;
unset($_SESSION['error']); ?>