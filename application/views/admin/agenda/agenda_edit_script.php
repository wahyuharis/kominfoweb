<script>
    $(document).ready(function() {


        $('input[name=title]').keyup(function() {
            judul = $(this).val();
            judul = slugify(judul);
            $('input[name=slug]').val(judul);
        });


        $('text[name=keterangan]').summernote({
            height: 300, // set editor height
            tabDisable: true,

        });


        $('#form-1').submit(function(e) {
            e.preventDefault();
            Loading = new SubmitLoading('#submit-button');
            Loading.write();

            $.ajax({
                url: '<?= base_url('admin/agenda/submit/') ?>',
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
                        window.location.href = '<?= base_url('admin/agenda/') ?>';
                    } else {
                        toastr.error("Terjadi Kesalahan");
                    }
                },

            });
        });
    });
</script>