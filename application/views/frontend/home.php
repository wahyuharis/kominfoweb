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
                                <li class="news-item"><a href="#"></a></li>
                                <?php foreach ($berita_kanan as $bkanan) : ?>
                                    <li class="news-item">
                                        <a href="<?= base_url('blog/detail/' . $bkanan['slug']) ?>">
                                            <?= $bkanan['title'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
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
                            <?php foreach ($slider as $srow) : ?>
                                <div class="carousel-item <?php if ($i < 1) echo 'active' ?>">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="<?= base_url('assets/uploads/files/' . $srow['image']) ?>" alt="Second slide">
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
                        <h3>Berita Diskominfo Terbaru</h3>
                    </div>
                    <div class="trending-bottom">
                        <div class="row">
                            <?php foreach ($berita_bawah as $bbawah) : ?>
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="<?= base_url('assets/uploads/files/' . $bbawah['image']) ?>" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color1">BERITA DISKOMINFO</span>
                                            <h4><a href="<?= base_url('blog/detail/' . $bbawah['slug']) ?>"><?= $bbawah['title'] ?></a></h4>
                                            <p class="text-sm text-dark float-left"><?= waktu_ymd_to_dmy($bbawah['date']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- Riht content -->
                <div class="col-lg-4">

                    <div class="section-tittle">
                        <h3>Berita Pemkab Terbaru</h3>
                    </div>

                    <div class="data-list" data-autoscroll>
                        <?php foreach ($berita_pemkab as $bpemkab) : ?>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="<?= substr($bpemkab['post_content'], 53, 93) ?>" alt="">
                                </div>
                                <div class="trand-right-cap hover-show">
                                    <span class="color3">Berita Pemkab</span>
                                    <h4 class="short-title"><a href="https://www.jemberkab.go.id/<?= $bpemkab['post_name'] ?>" target="_blank"><?= substr($bpemkab['post_title'], 0, 50) ?>...</a></h4>
                                    <h4 class="long-title"><a href="https://www.jemberkab.go.id/<?= $bpemkab['post_name'] ?>" target="_blank"><?= $bpemkab['post_title'] ?></a></h4>
                                    <p class="text-sm text-dark float-left"><?= waktu_ymd_to_dmy($bpemkab['post_date']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <br />
                    <div class="section-tittle">
                        <h3>Berita PPID Terbaru</h3>
                    </div>

                    <div class="data-list" data-autoscroll>
                        <?php foreach ($berita_ppid['data'] as $bppid) : ?>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="https://ppid.jemberkab.go.id/storage/<?= $bppid['foto_berita'] ?>" alt="">
                                </div>
                                <div class="trand-right-cap hover-show">
                                    <span class="color3">Berita PPID</span>
                                    <h4 class="short-title"><a href="https://ppid.jemberkab.go.id/berita-ppid/detail/<?= $bppid['slug'] ?>" target="_blank"><?= substr($bppid['judul_berita'], 0, 50) ?>...</a></h4>
                                    <h4 class="long-title"><a href="https://ppid.jemberkab.go.id/berita-ppid/detail/<?= $bppid['slug'] ?>" target="_blank"><?= $bppid['judul_berita'] ?></a></h4>
                                    <p class="text-sm text-dark float-left"><?= waktu_ymd_to_dmy($bppid['tanggal_berita']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <br />
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
                            <h3>Terpopuler</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="properties__button">
                            <!--Nav Button  -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-blog-tab" data-toggle="tab" href="#nav-blog" role="tab" aria-controls="nav-blog" aria-selected="true">Berita</a>
                                    <!-- <a class="nav-item nav-link" id="nav-agenda-tab" data-toggle="tab" href="#nav-agenda" role="tab" aria-controls="nav-agenda" aria-selected="false">Agenda</a> -->
                                    <a class="nav-item nav-link" id="nav-artikel-tab" data-toggle="tab" href="#nav-artikel" role="tab" aria-controls="nav-artikel" aria-selected="false">Artikel</a>
                                    <a class="nav-item nav-link" id="nav-infografis-tab" data-toggle="tab" href="#nav-infografis" role="tab" aria-controls="nav-infografis" aria-selected="false">Infografis</a>
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
                            <div class="tab-pane fade show active" id="nav-blog" role="tabpanel" aria-labelledby="nav-blog-tab">
                                <div class="whats-news-caption">
                                    <div class="row">


                                        <?php foreach ($berita_tengah as $btengah) : ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="<?= base_url('assets/uploads/files/' . $btengah['image']) ?>" alt="">
                                                    </div>
                                                    <div class="what-cap hover-show">
                                                        <span class="color1"><?= $btengah['view'] ?> dilihat </span>
                                                        <h4 class="short-title"><a href="<?= base_url('blog/detail/' . $btengah['slug']) ?>"><?= substr($btengah['title'], 0, 50) ?>...</a></h4>
                                                        <h4 class="long-title"><a href="<?= base_url('blog/detail/' . $btengah['slug']) ?>"><?= $btengah['title'] ?></a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                            <!-- Card two -->
                            <!-- <div class="tab-pane fade" id="nav-agenda" role="tabpanel" aria-labelledby="nav-agenda-tab">

                            </div> -->
                            <!-- Card three -->
                            <div class="tab-pane fade" id="nav-artikel" role="tabpanel" aria-labelledby="nav-artikel-tab">

                            </div>
                            <!-- card fure -->
                            <div class="tab-pane fade" id="nav-infografis" role="tabpanel" aria-labelledby="nav-infografis-tab">

                            </div>

                        </div>
                        <!-- End Nav Card -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="section-tittle mb-40">
                    <h3>Kumpulan Video</h3>
                </div>
                <!-- New Poster -->
                <div id="youtube-video" class="news-poster">
                    <div style="font-size: 50px;text-align: center;">
                        <i class="fas fa-spinner fa-spin"></i>
                    </div>
                </div>
                <br>
                <div class="section-tittle mb-20">
                    <h3>Lainnya</h3>
                </div>

                <div id="gpr-kominfo-widget-container" class="mt-20"></div>
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
                        <?php foreach ($link  as $link_row) : ?>

                            <div class="weekly2-single">
                                <a href="<?= $link_row['url'] ?>" target="_blank">
                                    <div class="weekly2-img">
                                        <img src="<?= base_url('/assets/uploads/files/' . $link_row['icon']) ?>" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <div class="weekly2-caption">
                                            <span class="color1"></span>
                                            <h6><?= $link_row['title'] ?></h6>
                                        </div>

                                    </div>
                                </a>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.get('<?= base_url('youtube') ?>', function(data, status) {
            $('#youtube-video').html(data);
        });
    });
</script>