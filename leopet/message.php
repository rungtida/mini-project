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
        <title>leopet || Message</title>
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
        <h3 align="right">You are Admin</h3>

        <?php echo "<h4 align = right>";
            echo "<strong>hi</strong>:";
            echo " ", $_SESSION["username"];
            echo "</h4>"; ?>
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
                                            <a class="nav-link active" href="admin_index.php">Home</a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Member
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="admin_addmem.php">Add</a>
                                                <a class="dropdown-item" href="admin_searchmem.php">Search</a>
                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Products
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="admin_addproduct.php">Add</a>
                                                <a class="dropdown-item" href="admin_searchproduct.php">Search</a>
                                            </div>
                                        </li>

                                        <li class="nav-item active">
                                            <a class="nav-link active" href="message.php">Message</a>
                                        </li>


                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ================ contact section start ================= -->
        <section class="contact-section section_padding">
            <div class="container">


                <form action="message.php" method="post" name="formUserData" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="contact-title">Question From User</h2>
                        </div>
                        <div class="col-lg-8">
                            <form class="form-contact contact_form" action="message.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="txtKeyword" type="text" id="txtKeyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search..'" placeholder='Search..'>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <button type="submit" name="search" class="button button-contactForm">Search</button>
                                        </div> 
                                    </div>

                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รหัสคำถาม</th>
                                                    <th>ชือเต็ม</th>
                                                    <th>เรื่อง</th>
                                                    <th>อีเมล์</th>
                                                    <th>รายละเอียด</th>
                                                    <th>สถานะ</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                    <?php
                        include("conn/connectdb.php");
                        if (isset($_POST['search'])) {
                            $txtKeyword = $_POST['txtKeyword'];
                            if($txtKeyword != "") {
                                //error_reporting(E_ALL ^ E_NOTICE);
                                                       $query = "SELECT * FROM question WHERE (qid LIKE '%".$_POST["txtKeyword"]."%' or name LIKE '%".$_POST["txtKeyword"]."%' 
                                                                                          or subject LIKE '%".$_POST["txtKeyword"]."%' or email LIKE '%".$_POST["txtKeyword"]."%'
                                                                                          or detail LIKE '%".$_POST["txtKeyword"]."%' or status LIKE '%".$_POST["txtKeyword"]."%' )";
                                                         $result = mysqli_query($conn, $query);
                                                         $i++; while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['qid']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['subject']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['detail']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                    </tr>
                                                <?php $i++;
                                                    }
                            }else{
                                                    $query = "SELECT * FROM question";
                                                    $result = mysqli_query($conn, $query);
                                                    $i=1; while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['qid']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['subject']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['detail']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                    </tr>
                                                <?php $i++;
                            }
                        }
                    }
                                                    ?>

                                            </tbody>
                                        </table>


                                    </div>
                                   
                            </form>

                            

                        </div>

                </form>
            </div>

        </section>
        <!-- ================ contact section end ================= -->

        <!-- footer part start-->
        <footer class="footer_area padding_top">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <img src="img/footer_logo.png" alt="#">
                        <p class="footer-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made
                            with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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