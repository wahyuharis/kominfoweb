<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>Galery
                </h2>
                <div class="blog_details">
                    <div class="row">
                        <?php foreach ($galeri_foto as $row) { ?>
                            <div class="col-md-4" style="height: 300px;">
                                <a href="<?= base_url('galery/detail/' . $row['id']) ?>">
                                    <img src="<?= base_url('assets/uploads/files/' . $row['image']) ?>" alt="Lights" style="width:100%;height:160px">
                                    <p><?= $row['caption'] ?></p>
                                </a>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <nav class="blog-pagination justify-content-center d-flex">
                    <?= $pagination ?>
                </nav>
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
                            <?php foreach ($berita_kanan as $bkanan) : ?>
                                <div class="media post_item">
                                    <img src="<?= base_url('assets/uploads/files/' . $bkanan['image']) ?>" alt="post" style="border-radius: 5px;">
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
                        </ul><br/>
                        <h3 class="widget_title">Berita PPID Terbaru</h3>
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
<!--================Blog Area =================-->


<script>
    $(document).ready(function() {

        $.get('<?= base_url('youtube') ?>', function(data, status) {
            $('#youtube-video').html(data);
        });

    });
</script>