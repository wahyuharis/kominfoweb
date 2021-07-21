<div class="box">
    <div class="box-body">
        <?= $output ?>
    </div>
</div>
<div id="custom_add" class="floatL t5 hidden">
    <a class="btn btn-primary" href="<?= base_url('admin/blog/add/') ?>"><i class="fa fa-plus"></i> &nbsp; Tambah Galeri</a>
</div>

<script>


    $(document).ready(function() {

        $('input[name=title]').keyup(function() {
            judul = $(this).val();
            judul = slugify(judul);
            $('input[name=slug]').val(judul);
        });



    });
</script>