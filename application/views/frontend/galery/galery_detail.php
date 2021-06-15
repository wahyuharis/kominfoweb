<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>Galery
                </h2>
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $galeri_foto_header) ?>" >
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($galeri_foto_detal as $row) { ?>
                        <div class="col-md-4 mb-3" >
                            <img src="<?= base_url('assets/uploads/files/' . $row['image']) ?>" alt="Lights" style="width:100%;height:150px">
                            </a>
                        </div>
                    <?php } ?>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="<?= base_url('blog') ?>" method="get">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
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