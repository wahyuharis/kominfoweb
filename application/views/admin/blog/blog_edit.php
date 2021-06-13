<div class="box box-primary">
    <form role="form">
        <div class="box-body">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" id="date" name="date" class="form-control" placeholder="Date">
                </div>

                <div class="form-group">
                    <label for="image_upload">Image </label>
                    <input type="hidden" name="image" id="image" value="<?= $image ?>">
                    <br><img id="image_preview" src="#" style="display: none; max-width: 100px;max-height: 100px;">
                    <br><a id="image_delete" href="#" class="btn btn-xs btn-danger" style="display: none;">hapus</a>
                    <input type="file" name="image_upload" id="image_upload" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug">
                </div>

                <div class="form-group">
                    <label for="slug">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="deskripsi">
                </div>
                <div class="form-group">
                    <label for="slug">Kata kunci</label>
                    <input type="text" id="kata_kunci" name="kata_kunci" class="form-control" placeholder="kata_kunci">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="slug">Content</label>
                    <!-- <input type="text" id="content" name="content" class="form-control" placeholder="Content"> -->
                    <textarea id="content" name="content" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <div class="col-md-12">
                <button id="submit-button" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
                <a href="<?=base_url('admin/blog/index')?>" class="btn btn-default"><i class="fa fa-close"></i> Batal</a>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {


        $('input[name=title]').keyup(function() {
            judul = $(this).val();
            judul = slugify(judul);
            $('input[name=slug]').val(judul);
        });


        $('textarea[name=content]').summernote({
            height: 300, // set editor height
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            Pace.start();
            $.ajax({
                url: "<?= base_url('admin/summernote/upload/') ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(res) {
                    // console.log(res)
                    if (res.success) {
                        res_data = JSON.parse(res.data);
                        url = '<?= base_url('assets/uploads/files/') ?>' + res_data.file_name;
                        $('textarea[name=content]').summernote("insertImage", url);
                    } else {
                        toastr.error(res.message);
                    }
                    Pace.stop();
                },
                error: function(data) {
                    console.log(data);
                    Pace.stop();
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {
                    src: src
                },
                type: "POST",
                url: "<?= base_url('admin/summernote/delete/') ?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

        img_def = $('#image').val();
        if (img_def.length > 0) {
            $('#image_preview').show();
            $('#image_delete').show();
            $('#image_upload').hide();
            $('#image_preview').attr('src', '<?= base_url('assets/uploads/files/') ?>' + img_def);

            $('#image_delete').click(function() {
                $('#image_upload').show();
                $.get("<?= base_url('admin/dropzone/delete_image/') ?>" + img_def, function(data, status) {
                    $('input[name=image_upload]').val(null);
                    $('#image_preview').hide();
                    $('#image_delete').hide();
                    $('input[name=image]').val('');
                });
            });
        }



    });


    $("input[name=image_upload]").change(function() {
        var fd = new FormData();
        var files = $('input[name=image_upload]')[0].files;
        // Check file selected or not
        if (files.length > 0) {
            fd.append('file', files[0]);

            $.ajax({
                url: '<?= base_url('admin/dropzone/upload/') ?>',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response['success']) {
                        output = JSON.parse(response.data);
                        $('#image_upload').hide();
                        $('input[name=image]').val(output['file_name']);
                        $('#image_preview').show();
                        $('#image_delete').show();
                        $('#image_preview').attr('src', '<?= base_url('/assets/uploads/files/') ?>' + output['file_name']);
                        $('#image_delete').click(function() {
                            $('#image_upload').show();
                            $.get("<?= base_url('admin/dropzone/delete_image/') ?>" + output['file_name'], function(data, status) {
                                $('input[name=image_upload]').val(null);
                                $('#image_preview').hide();
                                $('#image_delete').hide();
                                $('input[name=image]').val('');
                            });
                        });
                    } else {
                        alert(response['message']);
                    }
                },
                error: function(xhr, res) {
                    alert("Gagal Mengunggah");
                }
            });
        } else {
            alert("Please select a file.");
        }
    });
</script>