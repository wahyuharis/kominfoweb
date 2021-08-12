<div class="box">
    <div class="box-body">
        <?= $output ?>
    </div>
</div>

<div id="custom_add" class="floatL t5 hidden">
    <a class="btn btn-primary" href="<?= base_url('admin/galery/add/') ?>"><i class="fa fa-plus"></i> &nbsp; Tambah Galeri</a>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#custom_add").prependTo(".header-tools");
        $("#custom_add").removeClass("hidden");
        <?php if ($state == 'edit' || $state == "add") { ?>



        <?php } ?>

        // alert('hello');
    });

    function delete_validation(id) {

        bootbox.confirm({
            message: "Apakah anda yakin ingin menghapus data?",
            buttons: {
                confirm: {
                    label: 'Ya',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Tidak',
                    className: 'btn-default'
                }
            },
            callback: function(result) {
                if (result) {
                    $.get("<?= base_url('admin/galery/delete/') ?>" + id, function(data) {
                        window.location.href = '<?= base_url('admin/galery/index') ?>';
                    });
                }
            }
        });


    }
</script>