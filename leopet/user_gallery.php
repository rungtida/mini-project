<?php session_start(); ?>
<?php

if (!$_SESSION["username"]) {

    Header("Location: login.php");
} else { ?>

    <!doctype html>
    <html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>leopet || Gallery</title>
        <link rel="icon" href="img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- themify CSS -->
        <link rel="stylesheet" href="css/themify-icons.css">
        <!-- flaticon CSS -->
        <link rel="stylesheet" href="css/flaticon.css">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <h3 align="right">You are Member</h3>

        <?php echo "<h4 align = right>";
            echo "<strong>hi</strong>:";
            echo " ", $_SESSION["username"];
            echo "</h4>"; ?>


        <!--::header part start::-->
        <header class="header_area">
            <div class="sub_header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-4 col-md-4 col-xl-6">
                            <div id="logo">
                                <a href="index.html"><img src="img/Logo.png" alt="" title="" /></a>
                            </div>
                        </div>
                        <div class="col-8 col-md-8 col-xl-6 ">
                            <div class="sub_header_social_icon float-right">
                                <a href="#"><i class="flaticon-phone"></i>061-523-9055</a>
                                <a href="logout.php" class="btn_1 d-none d-md-inline-block">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_menu">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="ti-menu"></i>
                                </button>

                                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="nav-link active" href="user_index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="user_product.php" class="nav-link">Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="shopcart/index.php" class="nav-link">Shop</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="user_gallery.php" class="nav-link">Gallery</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="user_contact.php" class="nav-link">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header part end-->

    <!--::breadcrumb part start::-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h1>Gallery</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::breadcrumb part start::-->

    <!-- gallery part css here -->
    <section class="gallery_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="gallery_tittle">
                        <p>ภาพจากสุนัขที่ใช้ Leo Pet ของเรา ขนเงางาม สวย และมีสุขภาพที่แข็งแรง</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <a href="img/gallery-01.png" class="single_gallery_part">
                        <img src="img/gallery-01.png" alt="">
                        <i class="ti-plus"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/gallery-02.png" class="single_gallery_part">
                        <img src="img/gallery-02.png" alt="">
                        <i class="ti-plus"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/gallery-03.png" class="single_gallery_part">
                        <img src="img/gallery-03.png" alt="">
                        <i class="ti-plus"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/gallery-04.png" class="single_gallery_part">
                        <img src="img/gallery-04.png" alt="">
                        <i class="ti-plus"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/gallery-05.png" class="single_gallery_part">
                        <img src="img/gallery-05.png" alt="">
                        <i class="ti-plus"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/gallery-06.png" class="single_gallery_part">
                        <img src="img/gallery-06.png" alt="">
                        <i class="ti-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery part css end -->

<!-- footer part start-->
<footer class="footer_area padding_top">

<div class="row justify-content-between section_padding">
    <div class="col-xl-2 col-sm-6 col-md-3 mb-4 mb-xl-0 single-footer-widget">
        <h4>Menu</h4>
        <ul>
            <li><a href="#">home</a></li>
            <li><a href="#">about</a></li>
            <li><a href="#">shop</a></li>
            <li><a href="#">contact</a></li>
        </ul>
    </div>
    <div class="col-xl-2 col-sm-6 col-md-3 mb-4 mb-xl-0 single-footer-widget">
        <h4>contact</h4>
        <ul>
            <li><a href="#">061 861 2253</a></li>
            <li><a href="#">meaotingtong@gmail.com</a></li>
        </ul>
    </div>
    <div class="col-xl-2 col-sm-6 col-md-3 mb-4 mb-xl-0 single-footer-widget">
        <h4>Address</h4>
        <ul>
            <li><a href="#">700, Suan Plu,
                    Bangkok, Thailand</a></li>
        </ul>
    </div>
    <div class="col-xl-2 col-sm-6 col-md-3 mb-4 mb-xl-0 single-footer-widget">
        <h4>Opening Hour</h4>
        <ul>
            <li><a href="#">Mon-Fri (9.00-6.00)</a></li>
            <li><a href="#">Sat-Sun (Closed)</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="copyright_text">
            <img src="img/footer_logo.png" alt="#">
            <p class="footer-text">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</div>
</div>
</footer>
<!-- footer part end-->

<!-- jquery plugins here-->
<!-- jquery -->
<script src="js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- counterup js -->
<script src="js/jquery.counterup.min.js"></script>
<!-- waypoints js -->
<script src="js/waypoints.min.js"></script>
<!-- easing js -->
<script src="js/jquery.magnific-popup.js"></script>
<!-- particles js -->
<script src="js/owl.carousel.min.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
</body>

</html>
<?php } ?>