<div class="box">
    <div class="box-body">
        <?= $output ?>
    </div>
</div>
<div id="custom_add" class="floatL t5 hidden">
    <a class="btn btn-primary" href="<?= base_url('admin/agenda/add/') ?>"><i class="fa fa-plus"></i> &nbsp; Tambah Agenda</a>
</div>

<script>
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
                    $.get("<?= base_url('admin/agenda/delete/') ?>" + id, function(data) {
                        window.location.href = '<?= base_url('admin/agenda/index') ?>';
                    });
                }
            }
        });


    }

    $(document).ready(function() {
        // alert('hello');
        $("#custom_add").prependTo(".header-tools");
        $("#custom_add").removeClass("hidden");
    });
</script>