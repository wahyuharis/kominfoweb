<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <h2>
                        <?= $penghargaan->title ?>
                    </h2>
                    <br>
                    <div class="feature-img">
                        <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $penghargaan->image) ?>" alt="">
                    </div>
                    <div class="blog_details">

                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i> <?= $penghargaan->fullname ?></a></li>
                            <li><a href="#"><i class="fa fa-calendar"></i> <?= waktu_ymd_to_dmy($penghargaan->date)  ?></a></li>
                        </ul>
                        <br>

                        <?= $penghargaan->content ?>


                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-eye"></i></span>
                            <?= $penghargaan->view ?>
                            kali dilihat </p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                    <div class="navigation-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <?php if (!is_null($penghargaan_prev)) { ?>

                                    <div class="thumb">
                                        <a href="<?= base_url('blog/detail/' . $penghargaan_prev->slug) ?>">
                                            <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $penghargaan_prev->image) ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="<?= base_url('blog/detail/' . $penghargaan_prev->slug) ?>">
                                            <span class="lnr text-white ti-arrow-left"></span>
                                        </a>
                                    </div>
                                    <div class="detials hover-show" style="max-width: 174px;">
                                        <p>Prev Post</p>
                                        <a href="<?= base_url('blog/detail/' . $penghargaan_prev->slug) ?>">
                                            <h4 class="long-title"><?= $penghargaan_prev->title ?></h4>
                                            <h4 class="short-title"><?= substr($penghargaan_prev->title, 0, 20) ?> ... </h4>
                                        </a>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <?php if (!is_null($penghargaan_next)) { ?>

                                    <div class="detials hover-show" style="max-width: 174px;">
                                        <p>Next Post</p>
                                        <a href="<?= base_url('penghargaan/detail/' . $penghargaan_next->slug) ?>">
                                            <h4 class="long-title"><?= $penghargaan_next->title ?></h4>
                                            <h4 class="short-title"><?= substr($penghargaan_next->title, 0, 20) ?> ... </h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="<?= base_url('penghargaan/detail/' . $penghargaan_next->slug) ?>">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="<?= base_url('penghargaan/detail/' . $penghargaan_next->slug) ?>">
                                            <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $penghargaan_next->image) ?>" alt="">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
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
<script>
    $(document).ready(function() {
        $('.blog_details').find('p').css('font-family', '"Roboto", sans-serif');
        $('.blog_details').find('span').css('font-family', '"Roboto", sans-serif');
        $('.blog_details').find('table').addClass('table');
        $('.blog_details').find('table').addClass('table-bordered');
        $('.blog_details').find('table').removeAttr('border');

    });
</script>