<?php session_start(); ?>
<?php

if (!$_SESSION["username"]) {

    Header("Location: ../login/login.php");
} else { ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Reward Point</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <script language="javascript">
    function showscroll() {
    document.body.style.overflow = 'scroll';
    }
</script>

<style>
.frame::-webkit-scrollbar {
    -webkit-appearance: none;
}

.frame::-webkit-scrollbar:vertical {
    width: 12px;
}

.frame::-webkit-scrollbar:horizontal {
    height: 12px;
}

.frame::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background-color: #f23030;
}
</style>

</head>


<body class = "frame" onload="showscroll()">
  <h3 align="right">Your Point : </h3>

<?php echo "<h4 align = right>";
    echo "<strong>hi</strong>:";
    echo " ", $_SESSION["username"];
    echo "</h4>"; ?>


    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="user_index.php"><h2>Reward <em>Point</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="user_index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

            

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Point</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="user_usecode.php">use code</a>

                      <a class="dropdown-item" href="user_addcode.php">add code</a>
                      
                      <a class="dropdown-item" href="user_historycode.php">history</a>
                      
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="user_shoptest.php">Shop
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 
                
              
            <li class="nav-item"><a class="nav-link" href="../login/login.php">Logout</a></li>
                
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              
              <h2>🦖GOZ BAKERY</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>DETAIL</h2>
              </div>
            </div>

            <div class="col-md-8">
                <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ต้นตำหรับบราวนี่มีไส้!! เด็ดมากอ่ะร้านนี้ เอางี้นะ ลองคิดภาพบราวนี่กรอบนอกหนึบในเนื้อฟัดจ์ๆดีๆ มาเจอกับไส้ เนียนๆเข้มข้นๆ เเล้วยิ่งเคี้ยว รสก็ยิ่งออกมาเรื่อยๆอ่ะ เป็นไงฟินยัง เเล้วนี่คือเราได้กินเเบบนั้นจริงๆ มันดีย์มากๆ เข้าใจง่ายมากๆ เเถมมีหลายรสด้วยนะ ทั้งสตรอว์เบอร์รี่เปรี้ยวหวานๆหอม ซิกเนเจอร์ช็อกโกเเลต นวลนัวๆเข้มข้น หรือจะมัทฉะหอมๆ เข้ากับช็อกโกเเลตอยู่เเล้ว เเถมตอนนี้ ออกรสเนยถั่วมาใหม่ด้วยนะ เทพมาก~~
<br></h5>

               
            </div>

            <div class="col-md-4">
              <div class="left-content">
              <div class="service-item">
              <a href="blog-details.html" class="services-item-image"><img src="assets/images/🦖GOZ BAKERY.jpg" class="img-fluid" alt=""></a></div>

                <br>
                
                
              </div>
            </div>
        </div>

        <br>
        
        
      </div>
    </div>

    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Leave a Comment</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Submit</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 REWARDPOINT</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
<?php } ?>