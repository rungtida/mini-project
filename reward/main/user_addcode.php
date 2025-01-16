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
                <li class="nav-item ">
                    <a class="nav-link" href="user_index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

            

                <li class="nav-item dropdown active">
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
    
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
    
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          <div class="contact-form">
            <div class="text-content ">
              <h4>ADD CODE</h4>
              
              <form  action="user_addcode.php" method="post">
                    
                    
                    
                    
                    <fieldset>
                   
                      <input name="code" type="text" class="form-control"  value='' required>

                      
                      <input name="memid" type="hidden" class="form-control"  value='<?php echo $_SESSION["id"];?>'>

                      <?php
                    
                    ?>
                      
                    
                     
                      <button type="submit" name = "add" class="filled-button">ADD</button>
                    </fieldset>
                  
                    <?php


if (isset($_POST['add'])) {
  
  include("../connect.php");

  
  @$sql2 = "SELECT MAX(hid) AS hid FROM history";
    @$query1 = mysqli_query($conn,$sql2);
    @$rs = mysqli_fetch_array($query1);
    if($rs['hid'] !=""){
        $sub = substr($rs['hid'],3)+1;      
        $hid = sprintf('H%03.0f', $sub);
    }else{
        $hid = "H001";
	}

  $month = date('m');
  $day = date('d');
  $year = date('Y');
  $today = $year . '-' . $month . '-' . $day;

      $txtKeyword = $_POST['code'];
      $query = "SELECT * FROM point WHERE code = '".$_POST["code"]."'";
      $result = mysqli_query($conn, $query);
      $objResult = mysqli_fetch_array($result);     
      
if(!$objResult)
{
  echo "<script>";
  echo "alert(\" codeไม่ตรง\");"; 
  echo "</script>";
    
}else{
      $txtKeyword = $_POST['code'];
      $query1 = "SELECT * FROM point WHERE code = '".$_POST["code"]."' AND exp > '$today'" ;
      $result1 = mysqli_query($conn, $query1);
      $objResult1 = mysqli_fetch_array($result1);
        
            if(!$objResult1){
                echo "<script>";
                echo "alert(\" codeหมดอายุ\");"; 
                echo "</script>";

            }else{
                $code = $objResult1["code"];
                $pointin = $objResult1["point"];
                $codestatus = $objResult1["codestatus"];
        
                if($objResult1["codestatus"]=="used"){
                    echo "<script>";
                    echo "alert(\" codeใช้ไปแล้ว\");"; 
                    echo "</script>";

                }else{
                    $pointout = "0";
                    $pname = "-";
                    $memid = $_POST['memid'];
             
                    @$sql1 = "INSERT INTO history(hid,id,code,pointin,pname,pointout) 
                    VALUES('$hid','$memid','$code','$pointin','$pname','$pointout')";
            
                    @$sql2 = "UPDATE point
                    SET codestatus = 'used' 
                    WHERE code='$code'";

                    echo "<center><br>";
                    echo "<font color='white'>";
                        
                    if (mysqli_query($conn, $sql1) and mysqli_query($conn, $sql2)) {
                
                echo "<script>";
                echo "alert(\" แลกโค้ดสำเร็จ $pointin Point\");window.location='user_addcode.php';</script>"; 
                echo "</script>";

                    } else {
                echo "ผิดพลาด: " . $sql1 . "<br>" . mysqli_error($conn);
              }
              echo "</font></center><br>";
              mysqli_query($conn, $sql1);
              mysqli_close($conn);


          }

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