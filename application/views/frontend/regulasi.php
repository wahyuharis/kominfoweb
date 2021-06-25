<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">

                <div class="section-tittle mb-30">
                    <h2>REGULASI</h2>
                </div>

                <div class="blog_left_sidebar">

                    <div class="row mb-4 mt-1">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">

                            <form action="<?= base_url('regulasi') ?>" method="get">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search_regulasi" class="form-control" placeholder='Cari Regulasi' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Regulasi'">
                                        <div class="input-group-append">
                                            <button class="tombolcari" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr style="vertical-align:middle">
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Kategori</th>
                                    <th style="text-align: center;">Produk Hukum</th>
                                    <th style="text-align: center;">Nomor</th>
                                    <th style="text-align: center;">Terbit</th>

                                    <th style="text-align: center;">Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($regulasi_list as $row) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $row['nama_kategori'] ?></td>
                                        <td><?= $row['nama_produk'] ?></td>
                                        <td><?= $row['nomor'] ?></td>
                                        <td><?= $row['tanggal_terbit'] ?></td>
                                        <td> <a href="<?= base_url('assets/uploads/files/' . $row['document']) ?>" target="_blank"> Unduh </a> </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <nav class="blog-pagination justify-content-center d-flex">
                        <?= $pagination ?>
                    </nav>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="<?= base_url('blog') ?>" method="get">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder='Cari Berita' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Berita'">
                                    <div class="input-group-append">
                                        <button class="btns" type="reset" title="Reset"><i class="ti-close"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Cari</button>
                        </form>
                    </aside>


                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Berita Terbaru</h3>
                        <ul class="data-list" data-autoscroll>
                            <?php foreach ($berita_kanan as $bkanan) : ?>
                                <div class="media post_item">
                                    <img src="<?= base_url('assets/uploads/files/' . $bkanan['image']) ?>" alt="post" width="65px" height="65px" style="border-radius: 5px;">
                                    <div class="media-body hover-show">
                                        <span class="color2">See beach</span>
                                        <a href="<?= base_url('blog/detail/' . $bkanan['slug']) ?>">
                                            <h3 class="short-title"><?= substr($bkanan['title'], 0, 50) ?>...</h3>
                                            <h3 class="long-title"><?= ($bkanan['title']) ?></h3>
                                        </a>
                                        <p><?= waktu_ymd_to_dmy($bkanan['date']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </ul>
                    </aside>


                    <div id="youtube-video" class="news-poster">
                        <div style="font-size: 50px;text-align: center;">
                            <i class="fas fa-spinner fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
<script>
    $(document).ready(function() {


        $.get('<?= base_url('youtube') ?>', function(data, status) {
            $('#youtube-video').html(data);
        });


    });
</script>