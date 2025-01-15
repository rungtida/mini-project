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
        <title>leopet || Product</title>
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


      <form action="admin_addproduct.php" method="post" name="formUserData" enctype="multipart/form-data">
        <div class="row">
          <div class="col-12">
            <h2 class="contact-title">Add Pro</h2>
          </div>
          <div class="col-lg-8">
            <form class="form-contact contact_form" action="admin_addproduct.html" method="post" id="contactForm" novalidate="novalidate">
              <div class="row">
              <div class="col-12">
                      <div class="form-group">
                          <select class="form-control" name="name" id="name" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject' required>
                              <option value="กรุณาเลือก">กรุณาเลือก</option>
                              <option value="อาหารเม็ด">อาหารเม็ด</option>
                              <option value="อาหารเปียก">อาหารเปียก</option>
                              <option value="ขนมขบเคี้ยว">ขนมขบเคี้ยว</option>
                            </select>
                       
                      </div>
                    </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <input class="form-control" name="detail" id="detail" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter product detail'" placeholder='Enter product detail' required>

                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input class="form-control" name="fileUpload" id="fileUpload" type="file" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter product pic'" placeholder='Enter product pic' required>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <input class="form-control" name="price" id="price" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter product price'" placeholder='Enter product price' required>
                  </div>
                </div>

              </div>
              <div class="form-group mt-3">
                <button type="submit" name="save" class="button button-contactForm">Add</button>
              </div>
            </form>


            <?php


            if (isset($_POST['save'])) {
              
              include("conn/connectdb.php");
              //ประกาศตัวแปร และนำค่ามาใส่ในตัวแปร
              $name = $_POST['name'];
              $detail = $_POST['detail'];
              $price = $_POST['price'];

              @$sql2 = "SELECT MAX(product_code) AS product_code FROM products";
              @$query = mysqli_query($conn, $sql2);
              @$rs = mysqli_fetch_array($query);
              if ($rs['product_code'] != "") {
                $sub = substr($rs['product_code'], 3) + 1;
                $pid = sprintf('P%03.0f', $sub);
              } else {
                $pid = "P001";
              }

              @$sql3 = "SELECT MAX(id) AS id FROM products";
              @$query = mysqli_query($conn, $sql3);
              @$rs = mysqli_fetch_array($query);
              if ($rs['id'] != "") {
                $sub = substr($rs['id'], 3) + 1;
                $id = sprintf('0%03.0f', $sub);
              } else {
                $id = "0001";
              }

              $filepath = "images/". $_FILES["fileUpload"]["name"];
              // แสดงชื่อไฟล์ที่ upload มา
              if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $filepath))
              //ย้ายไฟล์จาก temp มาเก็บใน path ที่เรากำหนด คือ $filepath
              {
                echo "ภาพ : <img src=" . $filepath . " height=140 width=140>";
              } else {
                echo "เกิดข้อผิดพลาด!! ";
              }
              @$sql1 = "INSERT INTO products(id,product_code, product_name, product_desc, product_img_name, product_price) 
        VALUES('$id','$pid','$name','$detail','$filepath','$price')";
              // echo $sql1."<br>";
              echo "<center><br>";
              echo "<font color='white'>";
              if (mysqli_query($conn, $sql1)) {
                
                echo "<p>บันทึกลงฐานข้อมูลเรียบร้อยแล้ว</p>";
              } else {
                echo "ผิดพลาด: " . $sql1 . "<br>" . mysqli_error($conn);
              }
              echo "</font></center><br>";
              mysqli_query($conn, $sql1);
              mysqli_close($conn);
            }


            ?>
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