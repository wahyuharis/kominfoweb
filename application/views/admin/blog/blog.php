<div class="box">
    <div class="box-body">
        <?= $output ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        // alert('hello');

        
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
                },
                error: function(data) {
                    console.log(data);
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



    });
</script>