<div class="box">
    <div class="box-body">
        <form role="form" id="form-1">
            <?= form_open_multipart(base_url('admin/galery/upload/'), ' id="form-1" ') ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?= form_hidden('primary_id', $primary_id) ?>
                            <input type="hidden" name="token" id="token" value="<?=uniqid()?>"  >

                            <div class="form-group">
                                <label for="caption">Caption *</label>
                                <input type="text" name="caption" id="caption" value="<?=$caption?>" placeholder="caption" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="image_upload">Image *</label>
                                <input type="hidden" name="image" id="image" value="<?=$image?>" >
                                <br><img id="image_preview" src="#" style="display: none; max-width: 100px;max-height: 100px;">
                                <br><a id="image_delete" href="#" class="btn btn-xs btn-danger" style="display: none;">hapus</a>
                                <input type="file" name="image_upload" id="image_upload" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="image_upload2">Image Sub </label>
                                <!-- <input type="text" name="image2" id="image2" placeholder="Image" class="form-control"> -->
                                <textarea name="image2" id="image2" class="form-control"></textarea>
                                <br><img id="image_preview2" src="#" style="display: none; max-width: 100px;max-height: 100px;">
                                <br><a id="image_delete2" href="#" class="btn btn-xs btn-danger" style="display: none;">hapus</a>
                                <input type="file" name="image_upload2" id="image_upload2"  class="form-control">
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