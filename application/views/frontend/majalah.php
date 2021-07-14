<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">

                <div class="section-tittle mb-30">
                    <h2>Majalah</h2>
                </div>

                <div class="blog_left_sidebar">

                    <div class="row mb-4 mt-1">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">

                            <form action="<?= base_url('majalah') ?>" method="get">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search_majalah" class="form-control" placeholder='Cari Majalah' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Majalah'">
                                        <div class="input-group-append">
                                            <button class="tombolcari" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <?php $no = 1;
                    foreach ($majalah_list as $row) : ?>
                    <h5><?= $row['nama_majalah'] ?></h5>
                    <embed type="application/pdf" src="<?= base_url('assets/uploads/files/' . $row['document']) ?>" width="750px" height="400px"></embed>
                    <br> <br>
                    <?php endforeach; ?>
                    <nav class="blog-pagination justify-content-center d-flex">
                        <?= $pagination ?>
                    </nav>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                    <div id="carousel-kanan" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <?php $i_slide = 0; ?>
                            <?php foreach ($slider as $srow) : ?>
                                <li data-target="#carousel-kanan" data-slide-to="<?= $i_slide ?>" class="<?php if ($i_slide < 1) echo "active" ?>"></li>
                                <?php $i_slide++; ?>
                            <?php endforeach; ?>
                        </ul>
                        <div class="carousel-inner">
                            <?php $i_slide = 0; ?>
                            <?php foreach ($slider as $srow) : ?>
                                <div class="carousel-item <?php if ($i_slide < 1) echo "active"  ?>">
                                    <img width="100%" height="180px" src="<?= base_url('assets/uploads/files/' . $srow['image']) ?>" alt="">
                                </div>
                                <?php $i_slide++; ?>
                            <?php endforeach; ?>

                        </div>
                        <a class="carousel-control-prev" href="#carousel-kanan" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-kanan" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    </aside>


                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Berita Pemkab Terbaru</h3>
                        <ul class="data-list2" data-autoscroll>
                            <?php foreach ($berita_kanan as $bkanan) : ?>
                                <div class="media post_item">
                                    <img src="<?= base_url('assets/uploads/files/' . $bkanan['image']) ?>" alt="post" style="border-radius: 5px;">
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
                        </ul><br/>
                        <h3 class="widget_title">Berita PPID Terbaru</h3>
                        <ul class="data-list2" data-autoscroll>
                            <?php foreach ($berita_ppid['data'] as $bppid) : ?>
                                <div class="media post_item">
                                    <img src=" https://ppid.jemberkab.go.id/storage/<?= $bppid['foto_berita'] ?>" alt="post" style="border-radius: 5px;">
                                    <div class="media-body hover-show">
                                        <span class="color2">Berita</span>
                                        <a href=" https://ppid.jemberkab.go.id/berita-ppid/detail/<?= $bppid['slug'] ?>" target="_blank">
                                            <h3 class="short-title"><?= substr($bppid['judul_berita'], 0, 50) ?>...</h3>
                                            <h3 class="long-title"><?= ($bppid['judul_berita']) ?></h3>
                                        </a>
                                        <p><?= waktu_ymd_to_dmy($bppid['tanggal_berita']) ?></p>
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