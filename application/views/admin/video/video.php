<div class="box">
    <div class="box-body">
        <?= $output ?>
    </div>
</div>

<div id="custom_add" class="floatL t5 hidden">
    <a class="btn btn-primary" href="<?= base_url('admin/video/add/') ?>"><i class="fa fa-plus"></i> &nbsp; Tambah Video</a>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#custom_add").prependTo(".header-tools");
        $("#custom_add").removeClass("hidden");
        <?php if ($state == 'edit' || $state == "add") { ?>



        <?php } ?>

        // alert('hello');
    });
</script>