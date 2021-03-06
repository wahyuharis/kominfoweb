<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="blog_details">
                    <h2>
                        <?= $visi_misi->judul ?>
                    </h2>
                    <br>
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $visi_misi->gambar) ?>" alt="">
                        </div>


                        <br>

                        <?= $visi_misi->konten ?>


                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <!-- <p class="like-info"><span class="align-middle"><i class="fa fa-eye"></i></span>
                            <?= $visi_misi->judul ?>
                            kali dilihat </p> -->
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>


                </div>
                <!--kalau dihapus berita kanan pindah bawah-->
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
                            <?php foreach ($berita_pemkab as $bpemkab) : ?>
                                <div class="media post_item">
                                    <img src="<?= substr($bpemkab['post_content'], 53, 93) ?>" alt="post" style="border-radius: 5px;">
                                    <div class="media-body hover-show">
                                        <span class="color2">Berita</span>
                                        <a href="https://www.jemberkab.go.id/<?= $bpemkab['post_name'] ?>" target="_blank">
                                            <h3 class="short-title"><?= substr($bpemkab['post_title'], 0, 50) ?>...</h3>
                                            <h3 class="long-title"><?= ($bpemkab['post_title']) ?></h3>
                                        </a>
                                        <p><?= waktu_ymd_to_dmy($bpemkab['post_date']) ?></p>
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
<script>
    $(document).ready(function() {
        $('.blog_details').find('p').css('font-family', '"Roboto", sans-serif');
        $('.blog_details').find('span').css('font-family', '"Roboto", sans-serif');
        $('.blog_details').find('table').addClass('table');
        $('.blog_details').find('table').addClass('table-bordered');
        $('.blog_details').find('table').removeAttr('border');

        $.get('<?= base_url('youtube') ?>', function(data, status) {
            $('#youtube-video').html(data);
        });


    });
</script>