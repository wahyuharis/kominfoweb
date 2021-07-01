<div class="box">
    <div class="box-body">
        <?= $output ?>
    </div>
</div>
<div id="custom_add" class="floatL t5 hidden">
    <a class="btn btn-primary" href="<?= base_url('admin/infografis/add/') ?>"><i class="fa fa-plus"></i> &nbsp; Tambah Infografis</a>
</div>

<script>
    function delete_validation(id) {

        bootbox.confirm({
            message: "This is a confirm with custom button text and color! Do you like it?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-danger'
                },
            },
            callback: function(result) {
                if (result) {
                    $.get("<?= base_url('admin/infografis/delete/') ?>" + id, function(data) {
                        window.location.href = '<?= base_url('admin/infografis/index') ?>';
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