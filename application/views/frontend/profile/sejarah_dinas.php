<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="blog_details">
                    <h2>
                        <?= $sejarah_dinas->judul ?>
                    </h2>
                    <br>
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $sejarah_dinas->gambar) ?>" alt="">
                        </div>

                        <!-- <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i> </a></li>
                            <li><a href="#"><i class="fa fa-calendar"></i> </a></li> 
                         </ul> -->
                        <br>

                        <?= $sejarah_dinas->konten ?>


                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <!-- <p class="like-info"><span class="align-middle"><i class="fa fa-eye"></i></span>
                            <?= $sejarah_dinas->judul ?>
                            kali dilihat </p> -->
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

                        </div>
                    </div>
                </div>
                <!--kalau dihapus berita kanan pindah bawah-->
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
        $('.single-post').find('p').css('font-family','"Roboto", sans-serif');
         $('.single-post').find('span').css('font-family','"Roboto", sans-serif');
         $('.single-post').find('ul').css('font-family','"Roboto", sans-serif');
         $('.single-post').find('li').css('font-family','"Roboto", sans-serif');

         $('.single-post').find('p').css('color','#506172');
         $('.single-post').find('span').css('color','#506172');
         $('.single-post').find('ul').css('color','#506172');
         $('.single-post').find('li').css('color','#506172');

         // #506172


         $('.blog_details').find('table').addClass('table');
         $('.blog_details').find('table').addClass('table-bordered');
         $('.blog_details').find('table').removeAttr('border');

    });
</script>