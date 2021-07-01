<?php
$ci = &get_instance();

//############## get headers value as object #####################
$header = array();
$db = $ci->db->get('header');
foreach ($db->result_array() as $row) {
    $header[$row['header_name']] = $row;
}
$header = json_decode(json_encode($header));
// print_r2($description);
//############## get headers value as object #####################

//############## berita sisi kanan ####################
if (!isset($description)) {
    $description = "";
}
if (!isset($keywords)) {
    $keywords = "";
}


?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= NAMA_APLIKASI ?> </title>
    
    <?php if (isset($description) && !empty(trim($description))) { ?>
        <meta name="description" content="<?= $description ?>">
    <?php } ?>

    <?php if (isset($keywords) && !empty(trim($keywords))) {  ?>
        <meta name="keywords" content="<?= $keywords ?>">
    <?php } ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="icon" href="<?= base_url('assets/uploads/files/' . $header->tab_title->image) ?>">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/ticker-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/custom.css">

    <!-- <script src="<?= base_url() ?>template_kominfo/assets/js/vendor/jquery-1.12.4.min.js"></script> -->
    <script src="<?= base_url() ?>node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    
</head>

<body>

    <!-- Preloader Start -->

    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">
                <div class="header-top bg-custom-theme d-none d-md-block">
                    <div class="container-kedua">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><img style="width:38px; height:20px;" src="<?= base_url() ?>template_kominfo/assets/img/logo/logo ajaa outline.png" alt="">DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN JEMBER </li>
                                        <!-- <li><img src="assets/img/icon/header_icon1.png" alt=""></li> -->
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="https://twitter.com/kominfojember" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li> <a href="https://www.facebook.com/Dinas-Komunikasi-Informatika-Kabupaten-Jember-1911954692385233/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="https://www.instagram.com/kominfojember/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- background-image: url('<?= base_url() ?>template_kominfo/assets/img/banner/header.png'); background-size: cover; -->
                <div class="header-mid d-none d-md-block">
                    <!-- <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-2">
                                <div class="logo">
                                    <a href="#"><img src="//base_url('assets/uploads/files/' . $header->logo_header_atas->image) ini php" alt="" width="100%"></a>
                                </div>
                            </div>

                            <div class="col-8 pt-4 header-text">
                                $header->logo_header_atas->content ini php
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                    </div> -->
                    <div class="header-mid-cover" style="background-image: url('<?= base_url('assets/uploads/files/'.$header->banner->image) ?>'); background-size: 100% 100%;">
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container-kedua">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                <a href="#"><img src="<?= base_url('assets/uploads/files/' . $header->logo_header_sticky->image) ?>" alt=""></a>
                                </div>

                                <div class="sticky-logo title-logo">
                                    <p>DISKOMINFO<br>
                                    KABUPATEN JEMBER</p>
                                </div>

                                <?php require_once 'template_navigation.php' ?>

                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="<?= base_url('blog/') ?>">
                                            <input name="search" type="text" placeholder="Cari Berita ..">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding fix">
           <div class="row d-flex justify-content-between container-kedua">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="<?= base_url() ?>template_kominfo/assets/img/logo/LOGO TEXT 2 BARIS outline.png" alt="" width="80%"></a>
                                </div>
                                <div class="footer-tittle">

                                    <div class="footer-pera">
                                        <p><strong>Alamat:</strong> Jl. Dewi Sartika No.54, Kepatihan, Kec. Kaliwates,
                                            Kabupaten Jember, Jawa Timur 68131<br>
                                            <strong>Email:</strong> diskominfo@jemberkab.go.id
                                            <br>
                                            <strong>No. Telp:</strong> (0331) 5102507
                                        </p>
                                        <p></p>
                                        <p></p>
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="https://twitter.com/kominfojember" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/Dinas-Komunikasi-Informatika-Kabupaten-Jember-1911954692385233/" target="_blank"><i class="fab fa-facebook" target="_blank"></i></a>
                                    <a href="https://www.instagram.com/kominfojember/" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mt-60">
                            <div class="footer-tittle">
                                <h4>Lokasi:</h4>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.305799930494!2d113.69954891384033!3d-8.171915594118198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6943ace876f09%3A0x3badfa144578a391!2sDinas%20Komunikasi%20Dan%20Informatika%20(Kominfo)%20Kabupaten%20Jember!5e0!3m2!1sid!2sid!4v1621121345922!5m2!1sid!2sid" width="330" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50 mt-60">
                            <div class="footer-tittle">
                                <h4>Pengunjung</h4>
                                <p>Hari ini: <strong>41</strong><br>
                                    Minggu ini: <strong>1006</strong><br>
                                    Bulan ini: <strong>4073</strong><br>
                                    Total Pengunjung: <strong>28621</strong></p>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-lg-12">
                            <div class="footer-copy-right">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> Dinas Komunikasi Dan Informatika Kabupaten Jember.
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/popper.min.js"></script>

    <!-- Jquery Mobile Menu -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/wow.min.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/animated.headline.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.magnific-popup.js"></script>

    <!-- Breaking New Pluging -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.ticker.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/site.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/contact.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.form.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/mail-script.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?= base_url() ?>template_kominfo/assets/js/plugins.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/main.js"></script>
    <script src="<?= base_url() ?>template_kominfo/assets/js/jquery.autoscroll.js" type="text/javascript" charset="utf-8"></script>
    <?php require_once 'visitor.php' ?>
</body>

</html>