<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">


                <div class="section-tittle mb-30">
                    <h2>Penghargaan</h2>
                </div>

                <div class="blog_left_sidebar">

                    <?php foreach ($penghargaan_list as $beritabl) : ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?= base_url('assets/uploads/files/' . $beritabl['image']) ?>" alt="">
                                <span class="blog_item_date">
                                    <h3><?php
                                        $var = date_create($beritabl['date']);
                                        echo date_format($var, "d");
                                        ?></h3>
                                    <p><?= bulan_indo(date_format($var, "m")) ?></p>
                                </span>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?= base_url('Penghargaan/detail/' . $beritabl['slug']) ?>">
                                    <h2><?= $beritabl['title'] ?></h2>
                                </a>
                                <p><?= getFirstParagraph($beritabl['content']) ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> <?= strtoupper($beritabl['fullname']) ?></a></li>
                                    <li><a href="#"><i class="fa fa-calendar"></i>
                                            <?php
                                            $var = date_create($beritabl['date']);
                                            echo date_format($var, "d/m/Y");
                                            ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </article>
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
                                        <span class="color2">Berita</span>
                                        <a href="<?= base_url('blog/detail/' . $bkanan['slug']) ?>">
                                            <h3 class="short-title"><?= substr($bkanan['title'], 0, 50) ?>...</h3>
                                            <h3 class="long-title"><?= ($bkanan['title']) ?></h3>
                                        </a>
                                        <p><?= waktu_ymd_to_dmy($bkanan['date']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </ul><br />
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

                    <!-- <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Berita</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </aside> -->


                    <aside class="single_sidebar_widget instagram_feeds">
                        <div class="section-tittle mb-40">
                            <h4 class="widget_title">Kumpulan Video</h4>
                        </div>
                        <!-- New Poster -->
                        <div id="youtube-video" class="news-poster">
                            <div style="font-size: 50px;text-align: center;">
                                <i class="fas fa-spinner fa-spin"></i>
                            </div>
                        </div>
                    </aside>
                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Lainnya</h4>

                        <div id="gpr-kominfo-widget-container" class="mt-30"></div>
                    </aside>
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