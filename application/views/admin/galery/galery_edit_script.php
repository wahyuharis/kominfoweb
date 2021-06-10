<script>
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
                        // console.log(output);
                        $('input[name=image]').val(output['file_name']);
                        $('#image_preview').show();
                        $('#image_delete').show();
                        $('#image_preview').attr('src', '<?= base_url('/assets/uploads/files/') ?>' + output['file_name']);
                        $('#image_delete').click(function() {
                            $.get("<?= base_url('admin/galery/delete_image/') ?>" + output['file_name'], function(data, status) {
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
        var token_image=$('#token').val();

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