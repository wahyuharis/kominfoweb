<div class="box box-primary">
    <form role="form" method="post" id="form-1">
        <input type="hidden" name="primary_id" value="<?= $primary_id ?>">
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?= $title ?>" class="form-control" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" id="date" name="date" value="<?= $date ?>" class="form-control datepicker" placeholder="Date">
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
                    <input type="text" id="slug" name="slug" value="<?= $slug ?>" class="form-control" placeholder="Slug">
                </div>

                <div class="form-group">
                    <label for="slug">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi" value="<?= $deskripsi ?>" class="form-control" placeholder="deskripsi">
                </div>
                <div class="form-group">
                    <label for="slug">Kata kunci</label>
                    <input type="text" id="kata_kunci" name="kata_kunci" value="<?= $kata_kunci ?>" class="form-control" placeholder="kata_kunci">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="slug">Content</label>
                    <!-- <input type="text" id="content" name="content" class="form-control" placeholder="Content"> -->
                    <textarea id="content" name="content" class="form-control"><?= $content ?></textarea>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <div class="col-md-12">
                <button id="submit-button" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
                <a href="<?= base_url('admin/infografis/index') ?>" class="btn btn-default"><i class="fa fa-close"></i> Batal</a>
            </div>
        </div>
    </form>
</div>
<?php require_once "infografis_edit_script.php" ?>