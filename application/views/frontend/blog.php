<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="section-tittle mb-30">
                    <h2>Berita</h2>
                </div>

                <div class="blog_left_sidebar">

                    <?php foreach ($berita_blog_list as $beritabl) : ?>
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
                                <a class="d-inline-block" href="<?= base_url('blog/detail/' . $beritabl['slug']) ?>">
                                    <h2><?= $beritabl['title'] ?></h2>
                                </a>
                                <p><?= getFirstParagraph2($beritabl['content']) ?></p>
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