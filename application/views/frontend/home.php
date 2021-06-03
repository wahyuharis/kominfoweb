<!-- Trending Area Start -->
<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">
                        <strong>Berita Terkini</strong>
                        <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                        <div class="trending-animated">
                            <ul id="js-news" class="js-hidden">
                                <li class="news-item"><a href="#">Bangladesh dolor sit amet, consectetur
                                        adipisicing elit.</a> (Berita Pemkab)</li>
                                <li class="news-item"><a href="#">Spondon IT sit amet, consectetur.......</a>
                                    (Berita Kominfo)</li>
                                <li class="news-item"><a href="#">Rem ipsum dolor sit amet, consectetur
                                        adipisicing elit.</a> (Berita Pemkab)</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <?php $i = 0; ?>
                            <?php foreach ($slider as $slide) : ?>
                                <div class="carousel-item <?php if ($i < 1) echo 'active' ?>">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img style="height: 500px;" src="<?= base_url('assets/uploads/files/' . $slide['image']) ?>" alt="Second slide">
                                            <div class="trend-top-cap">
                                                <!-- <span>Appetizers</span> -->
                                                <h2><a href="#"><?= ($slide['headline']) ?></a></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <!-- Trending Bottom -->
                    <div class="section-tittle mb-40">
                        <h3>Berita Pemkab Terpopuler</h3>
                    </div>
                    <div class="trending-bottom">
                        <div class="row">
                            <?php foreach ($berita_tengah as $btengah) : ?>
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="<?= base_url('assets/uploads/files/' . $btengah['image']) ?>" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color1">Hot News <?= $btengah['view'] ?> view </span>
                                            <h4><a href="#"><?= $btengah['title'] ?></a></h4>
                                            <p class="text-sm text-dark float-left"><?= waktu_ymd_to_dmy($btengah['date']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- Riht content -->
                <div class="col-lg-4">

                    <div class="trand-right-single d-flex">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">

                                <div class="carousel-item active">

                                    <a href="#" target="_blank"> <img src="<?= base_url() ?>template_kominfo/assets/img/banner/produk hukum.png" alt="" width="330" height="100"> </a>

                                </div>

                                <div class="carousel-item">

                                    <a href="#" target="_blank"> <img src="<?= base_url() ?>template_kominfo/assets/img/banner/bangga.png" alt="" width="330" height="100">
                                    </a>

                                </div>
                                <div class="carousel-item">

                                    <a href="#" target="_blank"> <img src="<?= base_url() ?>template_kominfo/assets/img/banner/kartini.png" alt="" width="330" height="100">
                                    </a>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="section-tittle mb-40">
                        <h3>Berita Pemkab Terbaru</h3>
                    </div>

                    <div class="data-list" data-autoscroll>
                        <?php foreach ($berita_kanan as $bkanan) : ?>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="<?= base_url('assets/uploads/files/' . $bkanan['image']) ?>" alt="">
                                </div>
                                <div class="trand-right-cap hover-show">
                                    <span class="color3">News</span>
                                    <h4 class="short-title"><a href="#"><?= substr($bkanan['title'], 0, 50) ?>...</a></h4>
                                    <h4 class="long-title"><a href="#"><?= $bkanan['title'] ?></a></h4>
                                    <p class="text-sm text-dark float-left"><?= waktu_ymd_to_dmy($btengah['date']) ?></p>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trending Area End -->
<!--   Weekly-News start -->

<!-- End Weekly-News -->
<!-- Whats New Start -->
<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Pilihan Topik</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="properties__button">
                            <!--Nav Button  -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Berita</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Agenda</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Artikel</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Infografis</a>

                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="whats-news-caption">
                                    <div class="row">


                                        <?php foreach ($berita_bawah as $bbawah) : ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="<?= base_url('assets/uploads/files/' . $bbawah['image']) ?>" alt="">
                                                    </div>
                                                    <div class="what-cap hover-show">
                                                        <span class="color1">NEWS</span>
                                                        <h4 class="short-title"><a href="#"><?= substr($bbawah['title'], 0, 50) ?>...</a></h4>
                                                        <h4 class="long-title"><a href="#"><?= $bbawah['title'] ?></a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                            <!-- Card two -->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            </div>
                            <!-- Card three -->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                            </div>
                            <!-- card fure -->
                            <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">

                            </div>

                        </div>
                        <!-- End Nav Card -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Section Tittle -->
                <div class="section-tittle mb-40">
                    <h3>Jumlah Pengikut</h3>
                </div>
                <!-- Flow Socail -->
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="<?= base_url() ?>template_kominfo/assets/img/news/icon-fb.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="<?= base_url() ?>template_kominfo/assets/img/news/icon-tw.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="<?= base_url() ?>template_kominfo/assets/img/news/icon-ins.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="<?= base_url() ?>template_kominfo/assets/img/news/icon-yo.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-tittle mb-40">
                    <h3>Kumpulan Video</h3>
                </div>
                <!-- New Poster -->
                <div class="news-poster">
                    <center>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/videoseries?list=PLDDx9qSJIISMesf6jENuYDzYgJHt7RHou" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Whats New End -->
<!--   Weekly2-News start -->
<div class="weekly2-news-area  weekly2-pading gray-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Link Terkait</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly2-news-active dot-style d-flex dot-style">
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="<?= base_url() ?>template_kominfo/assets/img/banner/kartini.png" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Link ke-1</span>

                                <h4><a href="#">Link Wisata Jember</a></h4>
                            </div>
                        </div>
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="<?= base_url() ?>template_kominfo/assets/img/banner/bangga.png" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Link ke-2</span>

                                <h4><a href="#">Link Kegiatan Pendampingan Satu Desa Satu Dosen</a></h4>
                            </div>
                        </div>
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="<?= base_url() ?>template_kominfo/assets/img/banner/buruh.png" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Link ke-3</span>

                                <h4><a href="#">Link Pojok Informasi</a></h4>
                            </div>
                        </div>
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="<?= base_url() ?>template_kominfo/assets/img/banner/vaksin.png" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Link ke-4</span>

                                <h4><a href="#">Link Statistik</a></h4>
                            </div>
                        </div>
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="<?= base_url() ?>template_kominfo/assets/img/banner/produk hukum.png" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Link ke-5</span>

                                <h4><a href="#">Link Produk Hukum Pemerintah Kabupaten Jember</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Weekly-News -->
<!-- Start Youtube -->

<!-- End Start youtube -->
<!--  Recent Articles start -->

<!--Recent Articles End -->
<!--Start pagination -->

<!-- End pagination  -->