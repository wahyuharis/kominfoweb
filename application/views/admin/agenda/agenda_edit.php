<div class="box box-primary">
    <form role="form" method="post" id="form-1">
        <input type="hidden" name="primary_id" value="<?= $primary_id ?>">
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" id="title" name="title" value="<?= $title ?>" class="form-control" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" id="date" name="date" value="<?= $date ?>" class="form-control datepicker" placeholder="Date">
                </div>
                <!-- <div class="form-group">
                    <label for="category">Type</label>
                    <?= form_dropdown('category', $category_opt, $category, ' id="category" class="form-control" ') ?>
                </div> -->

                <!-- <div id="date-publish" class="form-group" style="display: none;">
                    <label for="date_publish">Jadwal Publikasi</label>
                    <input type="text" id="date_publish" name="date_publish" value="<?= $date_publish ?>" class="form-control datepicker" placeholder="Date publish">
                </div> -->

                <div class="form-group">
                    <label for="time">Waktu</label>
                    <input type="time" name="waktu" id="waktu" value="<?= $waktu ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" value="<?= $slug ?>" class="form-control" placeholder="Slug">
                </div>

                <div class="form-group">
                    <label for="slug">Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" value="<?= $keterangan ?>" class="form-control" placeholder="deskripsi">
                </div>
                <div class="form-group">
                    <label for="slug">Kata kunci</label>
                    <input type="text" id="kata_kunci" name="kata_kunci" value="<?= $kata_kunci ?>" class="form-control" placeholder="kata_kunci">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="slug">Disposisi</label>
                    <input type="text" id="disposisi" name="disposisi" value="<?= $disposisi ?>" class="form-control" placeholder="disposisi">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="slug">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" value="<?= $lokasi ?>" class="form-control" placeholder="lokasi">
                </div>
            </div>

        </div>

        <div class="box-footer">
            <div class="col-md-12">
                <button id="submit-button" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
                <a href="<?= base_url('admin/agenda/index') ?>" class="btn btn-default"><i class="fa fa-close"></i> Batal</a>
            </div>
        </div>
    </form>
</div>
<?php require_once "agenda_edit_script.php" ?>