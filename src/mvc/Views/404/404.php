<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>Eiser ecommerce</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/css/bootstrap.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/vendors/linericon/style.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/css/themify-icons.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/css/flaticon.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/vendors/lightbox/simpleLightbox.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/vendors/nice-select/css/nice-select.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/vendors/animate-css/animate.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/vendors/jquery-ui/jquery-ui.css" />
  <!-- main css -->
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/css/style.css" />
  <link rel="stylesheet" href="<?= WEB_ROOT ?>public/lib/css/responsive.css" />
  <style>
    .e404 {
      width: 100%;
      height: 50vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 20px;
      border-top: 1px solid gray;
    }

    .e404 h2 {
      font-size: 100px;
      font-weight: 1000;
    }

    .e404 a {
      font-size: 25px;
      background-color: green;
      color: white;
      padding: 10px 40px;
      border-radius: 5px;
    }

    .err {
      font-size: 20px;
      color: red;
      text-align: center;
    }
  </style>
</head>

<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="top_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Phone: +01 256 25 235</p>
              <p>email: info@eiser.com</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="cart.html">
                    gift card
                  </a>
                </li>
                <li>
                  <a href="tracking.html">
                    track order
                  </a>
                </li>
                <li>
                  <a href="contact.html">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.html">
            <img src="img/logo.png" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= WEB_ROOT ?>home">Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= WEB_ROOT ?>shop" class="nav-link">Shop</a>


                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="<?= WEB_ROOT ?>blog" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>

                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="tracking.html">Tracking</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="elements.html">Elements</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-user" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!--================Header Menu Area =================-->



  <div class="e404">

    <?php
    if (isset($_SESSION['error'])) {
    ?>
      <p class="err"><?= $_SESSION['error'] ?></p>
    <?php
      unset($_SESSION['error']);
    } else {
    ?>
      <h2>404</h2>
      <a href="<?= WEB_ROOT ?>">Go Home</a>
    <?php
    }
    ?>

  </div>







  <!--================ start footer Area  =================-->
  <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Top Products</h4>
          <ul>
            <li><a href="#">Managed Website</a></li>
            <li><a href="#">Manage Reputation</a></li>
            <li><a href="#">Power Tools</a></li>
            <li><a href="#">Marketing Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Features</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Experts</a></li>
            <li><a href="#">Agencies</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
              <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required="" type="email">
              <button class="click-btn btn btn-default">Subscribe</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Đoàn Duy Vấn</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        <div class="col-lg-4 col-md-12 footer-social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-behance"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?= WEB_ROOT ?>public/lib/js/jquery-3.2.1.min.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/js/popper.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/js/bootstrap.min.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/js/stellar.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/vendors/isotope/isotope-min.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/js/jquery.ajaxchimp.min.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/vendors/counter-up/jquery.counterup.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/js/mail-script.js"></script>
  <script src="<?= WEB_ROOT ?>public/lib/js/theme.js"></script>
</body>

</html>