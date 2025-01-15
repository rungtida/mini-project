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
        <title>leopet || Contact</title>
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
                                            <a href="user_gallery.php" class="nav-link">Contact</a>
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
                                <h1>contact</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--::breadcrumb part start::-->

        <!-- ================ contact section start ================= -->
        <section class="contact-section section_padding">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <center>
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="720" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=rmutk%20thailand&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/nordvpn-coupon-code/"></a></div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 350px;
                                    width: 720px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 350px;
                                    width: 720px;
                                }
                            </style>
                        </div>
                    </center>
                    <form action="user_contact_success.php" method="post" name="formUserData" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12"><br><br><br><br>
                                <h2 class="contact-title">Get in Touch</h2>
                            </div>
                            <div class="col-lg-8">
                                <form class="form-contact contact_form" action="user_contact_success.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name' required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control" name="subject" id="subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject' required>
                                                    <option value="กรุณาเลือก">กรุณาเลือก</option>
                                                    <option value="คำถามทั่วไป">คำถามทั่วไป</option>
                                                    <option value="เกี่ยวกับผลิตภัณฑ์">เกี่ยวกับผลิตภัณฑ์</option>
                                                    <option value="อื่นๆ">อื่นๆ</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder='Enter Message' required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address' required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" name="save" class="button button-contactForm">Send Message</button>
                                    </div>
                                </form>




                            </div>
                            <div class="col-lg-4">
                                <div class="media contact-info">
                                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                                    <div class="media-body">
                                        <h3>700 Suanplu, Thailand.</h3>
                                        <p>Bangkok, CA 10120</p>
                                    </div>
                                </div>
                                <div class="media contact-info">
                                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                    <div class="media-body">
                                        <h3>061 861 2253</h3>
                                        <p>Mon to Fri 9am to 6pm</p>
                                    </div>
                                </div>
                                <div class="media contact-info">
                                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                                    <div class="media-body">
                                        <h3>meaotingtong@gmail.com</h3>
                                        <p>Send us your query anytime!</p>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- ================ contact section end ================= -->


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