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
    <link rel="stylesheet" href="assets/css/style1.css">
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

<?php
include("../connect.php");
$memid = $_SESSION["id"];

$query = "SELECT SUM(pointout) AS pointout_sum FROM history WHERE id = '$memid'";  
        @$run = mysqli_query($conn, $query);
        @$row = mysqli_fetch_array($run); 
        $pointout = $row['pointout_sum'];  
          
$result2 = mysqli_query($conn, "SELECT SUM(pointin) AS pointin_sum FROM history WHERE id = '$memid'"); 
$row2 = mysqli_fetch_assoc($result2); 
$pointin = $row2['pointin_sum'];

$total = $pointin - $pointout;

echo "<h3 align = right>";
echo "Your Point : ", $total.' P';
echo "</h3>";
?>
  


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
                <li class="nav-item active">
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
                <li class="nav-item ">
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
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">

        <div class="banner-item-01">
          <div class="text-content">
            <h2>Promotion</h2>
            <h4>of the month</h4>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
          <h4>Welcome Summer</h4>
            <h2>Discount 70%</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
          <h4>...</h4>
            <h2>Discount 50%</h2>
          </div>
        </div>
        <div class="banner-item-04">
          <div class="text-content">
            <h4>...</h4>
            <h2>Discount 70%</h2>
          </div>
        </div>
      
      </div>
    </div>
    
    <!-- Banner Ends Here -->

    

          

    
    <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>SHOP</h2>
              

              
            </div>
          </div>
          <?php  include("../connect.php");
    $sql = "SELECT * FROM shop ;";
    $run = $conn->query($sql);
    
    if($run->num_rows > 0){
        while($row = $run->fetch_assoc()){
            
    ?>
        <div class="col-lg-4 col-md-6">
                <div class="service-item">
                  <a href="<?php echo $row['shoplink']; ?>" class="services-item-image"><img src="<?php echo $row['shoppic']; ?>" class="img-fluid" alt=""></a>

                  <div class="down-content">
                    <h4><a href="<?php echo $row['shoplink']; ?>"><?php echo $row['shopname']; ?></a></h4>
                    
                    
                  </div>
                </div>
              </div>
            
<?php
      }
    }

    


?>
          

          
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Review</h2>

              
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                 <img src="assets/images/team_05.jpg" class="img-fluid" alt="">
                </div>
                <div class="down-content">
                  <h4>So Eun</h4>
                  <p class="n-m"><em>"🍵TSUJIRI 녹차,이 가게는 맛있습니다."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                <img src="assets/images/team_jimin.jpg" class="img-fluid" alt="">
                </div>
                <div class="down-content">
                  <h4>Park Jimin</h4>
                  <p class="n-m"><em>"🍩 SO DOUGH 도넛은 매우 부드럽습니다 침침처럼."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                <img src="assets/images/team_iu.jpg" class="img-fluid" alt="">
                </div>
                <div class="down-content">
                  <h4>Lee Jieun</h4>
                  <p class="n-m"><em>"🍵UHOLIC 소프트 크림, 매우 부드러움"</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                <img src="assets/images/team_suzy.jpg" class="img-fluid" alt="">
                </div>
                <div class="down-content">
                  <h4>Bae suzy</h4>
                  <p class="n-m"><em>"🍫SQUARE2 CHOCOLATE "나마 초콜릿"은 매우 멋지다."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                <img src="assets/images/team_jongsuk.jpg" class="img-fluid" alt="">
                </div>
                <div class="down-content">
                  <h4>Lee Jongsuk</h4>
                  <p class="n-m"><em>"🍦HOKKAIDO SOFTKREAM은 맛있습니다."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                <img src="assets/images/team_sejeong.jpg" class="img-fluid" alt="">
                </div>
                <div class="down-content">
                  <h4>Kim Sejeong</h4>
                  <p class="n-m"><em>"🍭 벨라 실크는 매우 달콤합니다."</em></p>
                </div>
              </div>
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
              <p>Copyright © 2020 REWARDPOINT</p>
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