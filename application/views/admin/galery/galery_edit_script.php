<script>
    $(document).ready(function() {
        // localStorage.setItem('images',[]);
        generate_images();
    });

    $("input[name=image_upload]").change(function() {

        var fd = new FormData();
        var files = $('input[name=image_upload]')[0].files;
        // Check file selected or not
        if (files.length > 0) {
            fd.append('file', files[0]);

            $.ajax({
                url: '<?= base_url('admin/galery/upload/') ?>',
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
                            $.get("<?= base_url('admin/galery/delete_image/') ?>" + output['file_name'], function(data, status) {
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


    $("input[name=image_upload2]").change(function() {
        var fd = new FormData();
        var files = $('input[name=image_upload2]')[0].files;
        var token_image = $('#token').val();
        var images = null;

        // Check file selected or not
        if (files.length > 0) {
            fd.append('file', files[0]);
            fd.append('token', token_image);

            $.ajax({
                url: '<?= base_url('admin/galery/upload2/') ?>',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response['success']) {
                        output = JSON.parse(response.data);
                        $('input[name=image_upload2]').val(null);

                        images = $('textarea[name=image2]').val();
                        if (images.length < 1) {
                            images = '[]';
                        }
                        images = JSON.parse(images);
                        images.push(output.file_name);
                        $('textarea[name=image2]').val(JSON.stringify(images));
                        generate_images();
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

    function generate_images() {
        img_json = $('textarea[name=image2]').val();
        img_array = JSON.parse(img_json);
        html_str = "";
        for (var i = 0; i < img_array.length; i++) {
            html_str += '<div class="col-sm-3">' +
                '<img src="<?= base_url('/assets/uploads/files/') ?>' + img_array[i] + '" width="100" height="100" >' +
                '<br><a href="#" class="btn btn-xs btn-danger delete_image_list" data-img="' + img_array[i] + '" >hapus</a>' +
                '</div>';
        }
        $('#image_container').html(html_str);
        delete_image_bind();
    }

    function delete_image_bind() {
        $('.delete_image_list').click(function() {
            image_name = ($(this).attr('data-img'));
            img_json = $('textarea[name=image2]').val();
            img_arr = JSON.parse(img_json);

            img_arr = arrayRemove(img_arr, image_name);

            $.get("<?= base_url('admin/galery/delete_image/') ?>" + image_name, function(data, status) {
                $('textarea[name=image2]').val(JSON.stringify(img_arr));
                generate_images();
            });

        });
    }

    function arrayRemove(arr, value) {
        return arr.filter(function(ele) {
            return ele != value;
        });
    }

    $('#form-1').submit(function(e) {
        e.preventDefault();
        Loading = new SubmitLoading('#submit-button');
        Loading.write();

        $.ajax({
            url: '<?= base_url('admin/galery/submit/') ?>',
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
                    primary = '';
                    if (primary.trim().length > 0) {
                        toastr.info(data.message, 'informasi');
                    } else {
                        window.location.href = '<?=base_url('admin/galery/')?>';
                    }
                } else {
                    toastr.error("Terjadi Kesalahan");
                }
            },
            error: function(xhr, res) {
                alert("Gagal Mengunggah");
            }
        });
    });
</script>