<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="blog_details">
                    <h2>
                        <?= $struktur_organisasi->judul ?>
                    </h2>
                    <br>
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $struktur_organisasi->gambar) ?>" alt="">
                        </div>


                        <br>
                        <!-- 
                        <?= $struktur_organisasi->konten ?> -->


                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <!-- <p class="like-info"><span class="align-middle"><i class="fa fa-eye"></i></span>
                            <?= $struktur_organisasi->judul ?>
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
                        <!-- <form action="base_url('blog') ini php" method="get">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder='Cari Berita' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Berita'">
                                    <div class="input-group-append">
                                        <button class="btns" type="reset" title="Reset"><i class="ti-close"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Cari</button>
                        </form> -->
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

                    <aside class="single_sidebar_widget instagram_feeds">
                        <div class="section-tittle mb-40">
                            <h3>Kumpulan Video</h3>
                        </div>
                        <!-- New Poster -->
                        <div id="youtube-video" class="news-poster">
                            <div style="font-size: 50px;text-align: center;">
                                <i class="fas fa-spinner fa-spin"></i>
                            </div>
                        </div>
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