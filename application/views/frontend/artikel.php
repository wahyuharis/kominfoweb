<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">


                <div class="section-tittle mb-30">
                    <h2>ARTIKEL</h2>
                </div>

                <div class="blog_left_sidebar">

                    <?php foreach ($artikel_list as $artikelx) : ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?= base_url('assets/uploads/files/' . $artikelx['image']) ?>" alt="">
                                <span class="blog_item_date">
                                    <h3><?php
                                        $var = date_create($artikelx['date']);
                                        echo date_format($var, "d");
                                        ?></h3>
                                    <p><?= bulan_indo(date_format($var, "m")) ?></p>
                                </span>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?= base_url('artikel/detail/' . $artikelx['slug']) ?>">
                                    <h2><?= $artikelx['title'] ?></h2>
                                </a>
                                <p><?= getFirstParagraph2($artikelx['content']) ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> <?= strtoupper($artikelx['fullname']) ?></a></li>
                                    <li><a href="#"><i class="fa fa-calendar"></i>
                                            <?php
                                            $var = date_create($artikelx['date']);
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
                        <form action="<?= base_url('artikel') ?>" method="get">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder='Cari Artikel' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Artikel'">
                                    <div class="input-group-append">
                                        <button class="btns" type="reset" title="Reset"><i class="ti-close"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Cari</button>
                        </form>
                    </aside>


                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Berita Pemkab Terbaru</h3>
                        <ul class="data-list" data-autoscroll>
                            <?php foreach ($berita_kanan as $bkanan) : ?>
                                <div class="media post_item">
                                    <img src="<?= base_url('assets/uploads/files/' . $bkanan['image']) ?>" alt="post" width="75px" height="65px" style="border-radius: 5px;">
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
                        <ul class="data-list" data-autoscroll>
                            <?php foreach ($berita_kanan as $bkanan) : ?>
                                <div class="media post_item">
                                    <img src="<?= base_url('assets/uploads/files/' . $bkanan['image']) ?>" alt="post" width="75px" height="65px" style="border-radius: 5px;">
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
                        <h4 class="widget_title">Kumpulan Video</h4>
                        <div id="youtube-video">
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
<!--================Blog Area =================-->
<script>
    $(document).ready(function() {
        $.get('<?= base_url('youtube') ?>', function(data, status) {
            $('#youtube-video').html(data);
        });
    });
</script>