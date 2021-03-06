   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $berita_detail->image) ?>" alt="">
                  </div>

                  <div class="blog_details">
                     <h2>
                        <?= $berita_detail->title ?>
                     </h2>

                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i> <?= $berita_detail->fullname ?></a></li>
                        <li><a href="#"><i class="fa fa-calendar"></i> <?= waktu_ymd_to_dmy($berita_detail->date)  ?></a></li>
                     </ul>


                     <?= $berita_detail->content ?>


                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="fa fa-eye"></i></span>
                        <?= $berita_detail->realview ?>
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
                           <?php if (!is_null($berita_detail_prev)) { ?>

                              <div class="thumb">
                                 <a href="<?= base_url('blog/detail/' . $berita_detail_prev->slug) ?>">
                                    <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $berita_detail_prev->image) ?>" alt="">
                                 </a>
                              </div>
                              <div class="arrow">
                                 <a href="<?= base_url('blog/detail/' . $berita_detail_prev->slug) ?>">
                                    <span class="lnr text-white ti-arrow-left"></span>
                                 </a>
                              </div>
                              <div class="detials hover-show" style="max-width: 174px;">
                                 <p>Prev Post</p>
                                 <a href="<?= base_url('blog/detail/' . $berita_detail_prev->slug) ?>">
                                    <h6 class="long-title"><?= $berita_detail_prev->title ?></h6>
                                    <h6 class="short-title"><?= substr($berita_detail_prev->title, 0, 20) ?> ... </h6>
                                 </a>
                              </div>
                           <?php } ?>

                        </div>
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <?php if (!is_null($berita_detail_next)) { ?>

                              <div class="detials hover-show" style="max-width: 174px;">
                                 <p>Next Post</p>
                                 <a href="<?= base_url('blog/detail/' . $berita_detail_next->slug) ?>">
                                    <h6 class="long-title"><?= $berita_detail_next->title ?></h6>
                                    <h6 class="short-title"><?= substr($berita_detail_next->title, 0, 20) ?> ... </h6>
                                 </a>
                              </div>
                              <div class="arrow">
                                 <a href="<?= base_url('blog/detail/' . $berita_detail_next->slug) ?>">
                                    <span class="lnr text-white ti-arrow-right"></span>
                                 </a>
                              </div>
                              <div class="thumb">
                                 <a href="<?= base_url('blog/detail/' . $berita_detail_next->slug) ?>">
                                    <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $berita_detail_next->image) ?>" alt="">
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
   <script>
      $(document).ready(function() {
         $('.blog_details').find('p').css('font-family', '"Roboto", sans-serif');
         $('.blog_details').find('span').css('font-family', '"Roboto", sans-serif');
         $('.blog_details').find('ul').css('font-family', '"Roboto", sans-serif');
         $('.blog_details').find('li').css('font-family', '"Roboto", sans-serif');

         $('.blog_details').find('p').css('color', '#506172');
         $('.blog_details').find('span').css('color', '#506172');
         $('.blog_details').find('ul').css('color', '#506172');
         $('.blog_details').find('li').css('color', '#506172');

         $('.blog_details').find('table').addClass('table');
         $('.blog_details').find('table').addClass('table-bordered');
         $('.blog_details').find('table').removeAttr('border');

         $('.blog_details').find('img').each(function(index, value) {
            src = $(this).attr('src');
            $(this).wrap('<a href="' + src + '" data-fancybox="images" data-caption="foto - ' + (index + 1) + '"></a>');
         });

         $.get('<?= base_url('youtube') ?>', function(data, status) {
            $('#youtube-video').html(data);
         });

      });
   </script>