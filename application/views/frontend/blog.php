<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">

                    <?php foreach ($berita_blog_list as $beritabl) : ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?= base_url('assets/uploads/files/' . $beritabl['image']) ?>" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3><?php
                                        $var = date_create($beritabl['date']);
                                        echo date_format($var, "d");
                                        ?></h3>
                                    <p><?= bulan_indo(date_format($var, "m")) ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?= base_url('content/' . $beritabl['slug']) ?>">
                                    <h2><?= $beritabl['title'] ?></h2>
                                </a>
                                <p><?= getFirstParagraph($beritabl['content']) ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> <?= strtoupper($beritabl['fullname']) ?></a></li>
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
                        <form action="" method="get">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                        </form>
                    </aside>

                    <!-- <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Resaurant food</p>
                                    <p>(37)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Travel news</p>
                                    <p>(10)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Modern technology</p>
                                    <p>(03)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Product</p>
                                    <p>(11)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Inspiration</p>
                                    <p>21</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Health Care (21)</p>
                                    <p>09</p>
                                </a>
                            </li>
                        </ul>
                    </aside> -->

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Berita Pemkab Terbaru</h3>
                        <!-- <ul class="data-list" data-autoscroll> -->
                        <!-- <li> -->
                        <?php foreach ($berita_kanan as $bkanan) : ?>
                            <div class="media post_item">
                                <img style="width: 75px; height: 65px; border-radius:3px;" src="<?= base_url('assets/uploads/files/' . $bkanan['image']) ?>" alt="post">
                                <div class="media-body hover-show">
                                    <a href="#">
                                        <h3 class="short-title"><a href="#"><?= substr($bkanan['title'], 0, 50) ?>...</a></h4>
                                            <h3 class="long-title"><a href="#"><?= $bkanan['title'] ?></a></h4>
                                    </a>
                                    <p><?= waktu_ymd_to_dmy($bkanan['date']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- </li> -->
                        <!-- </ul> -->

                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Berita PPID Terbaru</h3>
                        <ul class="data-list" data-autoscroll>

                            <div class="media post_item">
                                <img src="assets/img/post/post_1.png" alt="post" width="65px" height="65px" style="border-radius: 5px;">
                                <div class="media-body">
                                    <span class="color4">See beach</span>
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>


                            <div class="media post_item">
                                <img src="assets/img/post/post_2.png" alt="post" width="65px" height="65px" style="border-radius: 5px;">
                                <div class="media-body">
                                    <span class="color2">Bike Show</span>
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>

                            <div class="media post_item">
                                <img src="assets/img/post/post_3.png" alt="post" width="65px" height="65px" style="border-radius: 5px;">
                                <div class="media-body">
                                    <span class="color4">See beach</span>
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>

                            <div class="media post_item">
                                <img src="assets/img/post/post_4.png" alt="post" width="65px" height="65px" style="border-radius: 5px;">
                                <div class="media-body">
                                    <span class="color2">Bike Show</span>
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="assets/img/post/post_6.png" alt="post" width="65px" height="65px" style="border-radius: 5px;">
                                <div class="media-body">
                                    <span class="color4">See beach</span>
                                    <a href="single-blog.html">
                                        <h3>From life was you fish...</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>

                        </ul>

                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
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
                    </aside>


                    <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <iframe src="https://snapwidget.com/embed/940247" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:100%; height:510px"></iframe>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->