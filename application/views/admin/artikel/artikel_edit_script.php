<script>
    $(document).ready(function() {
        $('select[name=category]').change(function() {
            value = $(this).val();
            if (value == 'Draft') {
                $('#date-publish').show();
            } else {
                $('#date-publish').hide();

            }
        });
        var category = $('select[name=category]').val();
        if (category == 'Draft') {
            $('#date-publish').show();
        }

        $('input[name=title]').keyup(function() {
            judul = $(this).val();
            judul = slugify(judul);
            $('input[name=slug]').val(judul);
        });


        $('textarea[name=content]').summernote({
            height: 300, // set editor height
            tabDisable: true,
            callbacks: {
                onImageUpload: function(image) {
                    for (var i = 0; i < image.length; i++) {
                        uploadImage(image[i]);
                    }
                },
                onMediaDelete: function(target) {
                    for (var i = 0; i < target.length; i++) {
                        deleteImage(target[i].src);
                    }
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            // Pace.start();
            $('#spinner-global').show();
            $.ajax({
                url: "<?= base_url('admin/summernote/upload/') ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(res) {
                    if (res.success) {
                        res_data = JSON.parse(res.data);
                        url = '<?= base_url('assets/uploads/files/') ?>' + res_data.file_name;
                        $('textarea[name=content]').summernote("insertImage", url);
                    } else {
                        toastr.error(res.message);
                    }
                    // Pace.stop();
                    $('#spinner-global').hide();

                },
                error: function(data) {
                    console.log(data);
                    // Pace.stop();
                    $('#spinner-global').hide();
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

            // Pace.start();
            $('#spinner-global').show();
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
                    // Pace.stop();
                    $('#spinner-global').hide();
                },
                error: function(xhr, res) {
                    alert("Gagal Mengunggah");
                    // Pace.stop();
                    $('#spinner-global').hide();
                }
            });
        } else {
            alert("Please select a file.");
        }
    });

    $('#form-1').submit(function(e) {
        e.preventDefault();
        Loading = new SubmitLoading('#submit-button');
        Loading.write();

        $.ajax({
            url: '<?= base_url('admin/artikel/submit/') ?>',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            success: function(data) {
                setTimeout(function() {
                    Loading.rewrite();
                }, 200);
                if (!data.succes) {
                    toastr.error(data.message);

                    error = data.error;
                    petik = '"';

                    for (var key in error) {
                        console.log(key + " " + error[key]);
                        $('input[name=' + petik + key + petik + '], select[name=' + petik + key + petik + '],textarea[name=' + petik + key + petik + ' ]').parent().addClass('has-error');

                        $('input[name=' + petik + key + petik + '], select[name=' + petik + key + petik + '],textarea[name=' + petik + key + petik + ' ]').focusout(function() {
                            var input = $(this).val();
                            if (input.length > 0) {
                                $(this).parent().removeClass('has-error');
                            }
                        });
                    }

                } else if (data.succes) {
                    window.location.href = '<?= base_url('admin/artikel/') ?>';
                } else {
                    toastr.error("Terjadi Kesalahan");
                }
            },
            error: function(xhr, res) {
                // alert("Gagal Mengunggah");
                toastr.error("Terjadi Kesalahan");
            }
        });
    });
</script>