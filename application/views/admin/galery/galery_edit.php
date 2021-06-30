<div class="box">
    <div class="box-body">
        <form role="form" id="form-1">
            <?= form_open_multipart(base_url('admin/galery/submit/'), ' id="form-1" ') ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?= form_hidden('primary_id', $primary_id) ?>
                            <input type="hidden" name="token" id="token" value="<?= uniqid() ?>">

                            <div class="form-group">
                                <label for="caption">Caption *</label>
                                <input type="text" name="caption" id="caption" value="<?= $caption ?>" placeholder="caption" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="image_upload">Image </label>
                                <input type="hidden" name="image" id="image" value="<?= $image ?>">
                                <br><img id="image_preview" src="#" style="display: none; max-width: 100px;max-height: 100px;">
                                <br><a id="image_delete" href="#" class="btn btn-xs btn-danger" style="display: none;">hapus</a>
                                <input  type="file" name="image_upload" id="image_upload" class="form-control">
                                <script>
                                    $(document).ready(function() {
                                        img_def = $('#image').val();
                                        if (img_def.length > 0) {
                                            $('#image_preview').show();
                                            $('#image_delete').show();
                                            $('#image_upload').hide();
                                            $('#image_preview').attr('src', '<?= base_url('assets/uploads/files/') ?>' + img_def);
                                        }

                                        $('#image_delete').click(function() {
                                            $('#image_upload').show();
                                            $.get("<?= base_url('admin/galery/delete_image/') ?>" + img_def, function(data, status) {
                                                $('input[name=image_upload]').val(null);
                                                $('#image_preview').hide();
                                                $('#image_delete').hide();
                                                $('input[name=image]').val('');
                                            });
                                        });
                                    });
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="image_upload2">Image Sub </label>
                                <textarea name="image2" id="image2" class="form-control hidden"><?=$image2?></textarea>
                                <br><img id="image_preview2" src="#" style="display: none; max-width: 100px;max-height: 100px;">
                                <br><a id="image_delete2" href="#" class="btn btn-xs btn-danger" style="display: none;">hapus</a>
                                <input multiple type="file" name="image_upload2" id="image_upload2" class="form-control">
                                <div id="image_container" class="row">
                                </div>
                                <!-- <br> -->
                            </div>

                        </div>
                        <div class="col-md-6">



                        </div>
                        <div class="col-md-12">
                            <button id="submit-button" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
                            <a href="<?= base_url('admin/galery') ?>" class="btn btn-default"><i class="fa fa-close"></i> Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once "galery_edit_script.php" ?>