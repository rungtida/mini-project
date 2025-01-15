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
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>All</h4>
              <h2>SHOP</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              

              <?php  include("../connect.php");
    $sql = "SELECT * FROM shop LIMIT 6 OFFSET 6;";
    $run = $conn->query($sql);
    
    if($run->num_rows > 0 ){
        
        
        while($row = $run->fetch_assoc()){
            
    ?>
        <div class="col-md-6">
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
              

              <div class="col-md-12">
                <ul class="pages">
                <li><a href="user_shoptest.php"><i class="fa fa-angle-double-left"></i></a></li>
                  <li><a href="user_shoptest.php">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  
                  
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-form">
            <form  action="user_shoptest2.php" method="post">
              <div class="form-group">
                <h5>Shop Search</h5>
              </div>

              <div class="row">
                <div class="col-8">
                  <input name = "txtKeyword" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                </div>

                <div class="col-4">
                  <button name = 'search' class="filled-button" type="submit">Go</button>
                </div>
                <?php
                        include("../connect.php");
                        if (isset($_POST['search'])) {
                            $txtKeyword = $_POST['txtKeyword'];
                            if($txtKeyword != "") {
                              //error_reporting(E_ALL ^ E_NOTICE);
                                                       $query = "SELECT * FROM shop WHERE (shopname LIKE '%".$_POST["txtKeyword"]."%')";  
                                                                                        
                                                         $result = mysqli_query($conn, $query);
                                                         while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                    <div class="col-md-4">
                <div class="service-item">
                  <a href="<?php echo $row['shoplink']; ?>" class="services-item-image"><img src="<?php echo $row['shoppic']; ?>" class="img-fluid" alt=""></a>

                  
                    <p><a href="<?php echo $row['shoplink']; ?>"><?php echo $row['shopname']; ?></a></p>
                    
                    
                  
                </div>
              </div>
                                                <?php 
                                                    }
                            }else{
                                                    $query = "SELECT * FROM shop";
                                                    $result = mysqli_query($conn, $query);
                                                     while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                    <div class="col-md-4">
                <div class="service-item">
                  <a href="<?php echo $row['shoplink']; ?>" class="services-item-image"><img src="<?php echo $row['shoppic']; ?>" class="img-fluid" alt=""></a>

                  
                    <p><a href="<?php echo $row['shoplink']; ?>"><?php echo $row['shopname']; ?></a></p>
                    
                    
                  
                </div>
              </div>
                                                <?php 
                            }
                        }
                    }
                                                    ?>
                </form>
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