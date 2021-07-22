<?php
    $arr=$data["dsbt"];
    $ar=$arr;
    function currency_format($number, $suffix = '') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EstateAgency Bootstrap Template - Index</title>
  <meta name="robots" content="noindex, nofollow">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<body>
<div>
        <?php 
            include_once"MVC/controllers/Header.php" ;
            $app = new Header();
            $app->index();
            
        ?>
    </div>
    <div class="intro intro-carousel swiper-container position-relative">

    <div class="swiper-wrapper">
        <!-- <image src="/Public/images/GThieu/Gthieu2.png" ></image> -->
        <?php
          $path="Public/images/AnhBaiTap/";
            $s[0]= '/Public/images/GThieu/Gthieu2.png';
            $s[1]='/Public/images/GThieu/VeChungToi1.png';
            $s[2]='/Public/images/GThieu/GThieu.png'; 
            $j=0;
            while($arr1=mysqli_fetch_array($arr)){
                $j++;
                if($j<4){
                    ?>
                    <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(<?=$path.$arr1[1]?>)">
                        <div class="overlay overlay-a"></div>
                        <div class="intro-content display-table">
                        <div class="table-cell">
                            <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">Doral, Florida
                                    <br> 78345
                                    </p>
                                    <h1 class="intro-title mb-4 ">
                                    <span class="color-b"><?=$arr1[2]?></span>
                                    <br> 
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                    <a href="ExerciseDetails?idExercise=<?=$arr1[0]?>"><span class="price-a">Giá | $ <?=currency_format($arr1[4])?> đ</span></a>
                                    </p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <?php
                }
                
            
            
            }
        ?>
      
      <div class="" >
        <div class="overlay overlay-a"></div>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End phần quảng cáo đầu tiên -->
  <!-- ======= Services Section ======= -->
  <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Dịch vụ của chúng tôi</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-cart"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Lifestyle</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                  convallis a pellentesque
                  nec, egestas non nisi.
                </p>
              </div>
              <div class="card-footer-c">
                <a href="#" class="link-c link-icon">Read more
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-calendar4-week"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Loans</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
                  aliquet elit, eget tincidunt
                  nibh pulvinar a.
                </p>
              </div>
              <div class="card-footer-c">
                <a href="#" class="link-c link-icon">Read more
                  <span class="bi bi-calendar4-week"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-card-checklist"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Sell</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                  convallis a pellentesque
                  nec, egestas non nisi.
                </p>
              </div>
              <div class="card-footer-c">
                <a href="#" class="link-c link-icon">Read more
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->
    <!-- Phần bài tập -->
   <!-- ======= Latest Properties Section ======= -->
   <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Các sản phẩm nổi bật</h2>
              </div>
              
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper-container">
          <div class="swiper-wrapper">
           <?php
                $i=0;
                while($item=mysqli_fetch_array($data["dstp"])){
                    $i++;
                ?>
                <div class="carousel-item-b swiper-slide">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="/Public/images/AnhSanPham/<?=$item[1]?>" alt="" style="width: 250px; height: 250px " class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="FoodDetail?idFood=<?=$item[0]?>"><?=$item[2]?>
                          <br />Bổ sung năng lượng</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">Giá | $ <?=currency_format($item[3])?> Đ</span>
                      </div>
                      <a href="FoodDetail?idFood=<?=$item[0]?>" class="link-a">Mua ngay<span aria-hidden="true">&raquo;</span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Area</h4>
                          <span>340m
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span>2</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Baths</h4>
                          <span>4</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Garages</h4>
                          <span>1</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <?php
                }
            ?>
            <div class="">
              
            </div><!-- End carousel item -->
          </div>
        </div>
        <div class="propery-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Latest Properties Section -->
    </section>
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Hướng dẫn viên</h2>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row">
          <?php
            $k=0;
            while($k<3){
                $k++;
                ?>
                    <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="/Public/images/AnhChuyenGia/chuyen_gia_phuc_1.png" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="FoodDetail?idFood=<?=$item[0]?>" class="link-two">Margaret Sotillo
                        <br> Escala</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                    Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> +54 356 945234
                    </p>
                    <p>
                      <strong>Email: </strong> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cbaaacaea5bfb88baeb3aaa6bba7aee5a8a4a6">[email&#160;protected]</a>
                    </p>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
                <?php
            }
            ?>
        </div>
      </div>
    </section><!-- End Agents Section -->
    <section class="section-testimonials section-t8 nav-arrow-a">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Testimonials</h2>
              </div>
            </div>
          </div>
        </div>

        <div id="testimonial-carousel" class="swiper-container">
          <div class="swiper-wrapper">
            <!-- End carousel item -->
            <?php
                $l=0;
                while($l<3){
                    $l++;
                ?>
                    <div class="carousel-item-a swiper-slide">
            <div class="testimonials-box">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-img">
                      <img src="/Public/images/AnhDaiDien/DaiDien3.jpg" style="width:60%; height:50% " alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                        debitis hic ber quibusdam
                        voluptatibus officia expedita corpori.
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="assets/img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">Albert & Erika</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <?php
                }
            ?>
            <!-- End carousel item -->

          </div> 
        <div class="testimonial-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Testimonials Section -->
    <div style="height: 115px;" class="swiper-slide carousel-item-a intro-item bg-image"></div>
    <div class="thanHome">
        ádasd
    </div> 
    <!-- Vendor JS Files -->
    <script data-cfasync="false" src="/Public/teamplate1/JS/email-decode.min.js"></script>
    <script src="/Public/MasterPage/JS/bootrap.bunlder.min.js"></script>
    <script src="/Public/MasterPage/JS/validate.js"></script>
    <script src="/Public/MasterPage/JS/swiper-bunlder.min.js"></script>

    <script src="/Public/MasterPage/JS/main.js"></script>
</body>
</html>