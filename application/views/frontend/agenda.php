<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">


                <div class="section-tittle mb-30">
                    <h2>Agenda</h2>
                </div>

                <div class="blog_left_sidebar">
                    <?php foreach ($agenda_list as $agendax) : ?>
                        <div class="w3-card-4" style="width:100%">
                            <header class="w3-container w3-blue">
                                <h3 class="agenda" style="color:white"><?= $agendax['title']; ?></h3>
                            </header>
                            <div class="w3-container w3-light-grey">
                                <br>
                                <div class="table-responsive">
                                    <table>
                                        <tr>
                                            <td style="font-weight:bold">Tanggal</td>
                                            <td>:</td>
                                            <td><?= $agendax['date']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Pukul</td>
                                            <td>:</td>
                                            <td><?= $agendax['waktu']; ?> WIB</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Lokasi</td>
                                            <td>:</td>
                                            <td><?= $agendax['lokasi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Disposisi</td>
                                            <td>:</td>
                                            <td><?= $agendax['disposisi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Keterangan</td>
                                            <td>:</td>
                                            <td style="text-align: justify;"><?= substr($agendax['keterangan'], 0, 90); ?> ...</td>
                                        </tr>
                                    </table>
                                </div>
                                <br>
                            </div>
                            <a href="<?= base_url('agenda/detail/' . $agendax['slug']) ?>" class="w3-button w3-block w3-blue-grey">Lihat Detail</a>
                        </div> <br>
                    <?php endforeach; ?>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <?= $pagination ?>
                    </nav>

                </div>
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