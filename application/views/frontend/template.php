<?php
$ci = &get_instance();

//############## get headers value as object #####################
$header = array();
$db = $ci->db->get('header');
foreach ($db->result_array() as $row) {
    $header[$row['header_name']] = $row;
}
$header = json_decode(json_encode($header));
// print_r2($header);
//############## get headers value as object #####################

//############## berita sisi kanan ####################

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= NAMA_APLIKASI ?> </title>
    <meta name="description" content="">
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
    <link rel="stylesheet" href="<?= base_url() ?>template_kominfo/assets/css/custom.css">

</head>

<body>

    <!-- Preloader Start -->

    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">
                <div class="header-top black-bg d-none d-md-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><img src="<?= base_url() ?>template_kominfo/assets/img/logo/header-black-logo.png" alt="">PEMERINTAH KABUPATEN JEMBER - DINAS KOMUNIKASI DAN INFORMATIKA </li>
                                        <!-- <li><img src="assets/img/icon/header_icon1.png" alt=""></li> -->
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-mid d-none d-md-block" style="background-image: url('<?= base_url() ?>template_kominfo/assets/img/banner/header.png'); height: 130px;">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-2">
                                <div class="logo">
                                    <a href="#"><img src="<?= base_url('assets/uploads/files/' . $header->logo_header_atas->image) ?>" alt="" width="100%"></a>
                                </div>
                            </div>

                            <div class="col-8 pt-4 header-text">
                                <?= $header->logo_header_atas->content ?>
                            </div>
                            <div class="col-2">

                            </div>

                        </div>
                    </div>

                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                        <a href="#"><img src="<?= base_url('assets/uploads/files/' . $header->logo_header_sticky->image) ?>" alt=""></a>
                                </div>

                                <div class="sticky-logo title-logo" >
                                Dinas Komunikasi dan Informatika<br>
                                Kabupaten Jember
                                </div>

                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.html">Beranda</a></li>
                                            <li><a href="<?=base_url('blog')?>">Berita</a>
                                                <!-- <ul class="submenu">
                                                    <li class=""><a href="#">Berita Kominfo</a></li>
                                                    <li class=""><a href="#">Berita Pemerintahan</a></li>
                                                    <li class=""><a href="#">Siaran Pers</a></li>
                                                    <li class=""><a href="#">Sorotan Media</a></li>
                                                    <li class=""><a href="#">Artikel</a></li>
                                                    <li class=""><a href="#">Jember Pandalungan</a></li>
                                                </ul> -->
                                            </li>

                                            <li><a href="#">Profil</a>
                                                <ul class="submenu">
                                                    <li><a href="struktur-organisasi.html">Struktur Organisasi</a></li>
                                                    <li><a href="sejarah-dinas.html">Sejarah Dinas</a></li>
                                                    <li><a href="visi.html">Visi & Misi</a></li>
                                                    <li><a href="single-blog.html">Tupoksi</a>
                                                        <ul class="submenu2">
                                                            <li><a href="single-blog.html">Diskominfo</a></li>
                                                            <li><a href="elements.html">Kepala Dinas</a></li>
                                                            <li><a href="blog.html">Sekretariat</a></li>
                                                            <li><a href="blog.html">Bidang Komunikasi & Pos</a></li>
                                                            <li><a href="blog.html">Bidang Teknologi Informatika</a>
                                                            </li>
                                                            <li><a href="blog.html">Bidang Statistik</a></li>
                                                            <li><a href="blog.html">Bidang Informasi & Publikasi</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="single-blog.html">Personil Diskominfo</a></li>
                                                    <li><a href="single-blog.html">Penghargaan</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Informasi Publik</a>
                                                <ul class="submenu">
                                                    <li><a href="single-blog.html">Profil PPID Kominfo</a></li>
                                                    <li><a href="elements.html">Informasi Berkala</a></li>
                                                    <li><a href="blog.html">Informasi Setiap Saat</a></li>
                                                    <li><a href="single-blog.html">Informasi Serta Merta</a></li>
                                                    <li><a href="single-blog.html">Permohonan Informasi</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Regulasi</a>
                                                <ul class="submenu">
                                                    <li><a href="single-blog.html">Undang-undang</a></li>
                                                    <li><a href="elements.html">Perpres</a></li>
                                                    <li><a href="blog.html">Permen</a></li>
                                                    <li><a href="single-blog.html">Pergub</a></li>
                                                    <li><a href="single-blog.html">Perbup</a></li>
                                                    <li><a href="single-blog.html">SE Presiden</a></li>
                                                    <li><a href="single-blog.html">SE Gubernur</a></li>
                                                    <li><a href="single-blog.html">SE Bupati</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="about.html">Pengumuman</a></li>
                                            <li><a href="latest_news.html">Layanan</a></li>
                                            <li><a href="#">Dokumen Media</a>
                                                <ul class="submenu">
                                                    <li><a href="single-blog.html">Album Galeri</a></li>
                                                    <li><a href="elements.html">Album Video</a></li>
                                                    <li><a href="blog.html">Album Majalah/Publikasi</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="#">
                                            <input type="text" placeholder="Cari berita ..">
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
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="<?= base_url() ?>template_kominfo/assets/img/logo/putih.png" alt="" width="80%"></a>
                                </div>
                                <div class="footer-tittle">

                                    <div class="footer-pera">
                                        <p><strong>Alamat:</strong> Jl. Dewi Sartika No.54, Kepatihan, Kec. Kaliwates,
                                            Kabupaten Jember, Jawa Timur 68131<br>
                                            <strong>Email:</strong> diskominfo@jemberkab.go.id
                                            <br>
                                            <strong>No. Telp:</strong> 0331-123xxx
                                        </p>
                                        <p></p>
                                        <p></p>
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
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
                                    </script> Dinas Kominfo Kabupaten
                                    Jember | This template is made with <i class="ti-heart" aria-hidden="true"></i> by
                                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="footer-menu f-right">
                                <ul>                             
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div> -->
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
    <script src="<?= base_url() ?>template_kominfo/assets/js/vendor/jquery-1.12.4.min.js"></script>
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
</body>

</html>