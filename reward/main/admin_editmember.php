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

    <title>Edit Member</title>

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
    background-color: #0a0007;
}
</style>

</head>


<body class = "frame" onload="showscroll()">
  <h3 align="right">You are Admin</h3>
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
          <a class="navbar-brand" href="admin_index.php"><h2>Reward <em>Point</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="admin_index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

            

                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Code</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="admin_searchcode.php">Search</a>
                      <a class="dropdown-item" href="admin_insertcode.php">Insert</a>
                      
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Promotion</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="admin_searchpoint.php">Search</a>
                      <a class="dropdown-item" href="admin_insertpoint.php">Insert</a>
                      
                    </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                  
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="admin_searchshop.php">Search</a>
                    <a class="dropdown-item" href="admin_insertshop.php">Insert</a>
                    
                  </div>
              </li>
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Member</a>
                
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="admin_searchmember.php">Search</a>
                  <a class="dropdown-item" href="admin_insertmember.php">Insert</a>
                  
                </div>
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
              <h4>EDIT</h4>
              <h2>MEMBER</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Edit member</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
            <form  action="admin_editmember.php" method="post">
                <div class="row">
                  <div class="col-sm-12">
                    <fieldset>
                    <?php include("../connect.php");
                    $sql_1 = "SELECT * FROM member WHERE id ='$_REQUEST[update_id]'";
                    @$query = mysqli_query($conn, $sql_1);
                    @$rs = mysqli_fetch_array($query);
                    ?>
                      ID<input name="id" type="text" class="form-control"  value="<?php echo $_REQUEST['update_id']; ?>" readonly>
                    </fieldset>
                  </div>

                  <div class="col-sm-12">
                    <fieldset>
                    
                      USERNAME<input name="username" type="text" class="form-control"  value="<?php echo $rs['username']; ?>" required>
                    </fieldset>
                  </div>

                  

                  <div class="col-sm-12">
                    <fieldset>
                      PASSWORD<input name="password" type="text" class="form-control"   value="<?php echo $rs['password']; ?>" required="">
                    </fieldset>
                  </div>
                  <div class="col-sm-6">
                    <fieldset>
                    
                      EMAIL<input  name="email" type="text" class="form-control"  value="<?php echo $rs['email']; ?>" required>
                    </fieldset>
                  </div>
                  <div class="col-sm-6">
                    <fieldset>
                      TEL<input name="tel" type="text" class="form-control"  value="<?php echo $rs['tel']; ?>" required>
                    </fieldset>
                  </div>
                  <div class="col-sm-6">
                    <fieldset>
                      NAME<input name="name" type="text" class="form-control"  value="<?php echo $rs['name']; ?>" required="">
                    </fieldset>
                  </div>
                  <div class="col-sm-6">
                    <fieldset>
                      SURNAME<input name="surname" type="text" class="form-control"  value="<?php echo $rs['surname']; ?>" required="">
                    </fieldset>
                  </div>

                  <div class="col-sm-12">
                  <fieldset>
                      STATUS<select name = "status" class="form-control">
                       <option value="user">user</option>
                       <option value="admin">admin</option>
                       
                      </select>
                    
                    </fieldset>
                  </div>
                  
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" name = "update" class="filled-button">UPDATE</button>
                    </fieldset>
                  </div>

                  
                  <?php


                if (isset($_POST['update'])) {

                  include("../connect.php");
                  //ประกาศตัวแปร และนำค่ามาใส่ในตัวแปร
                  $id = $_POST['id'];
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $email = $_POST['email'];
                  $tel = $_POST['tel'];
                  $status = $_POST['status'];
                  $name =  $_POST['name'];
                  $surname = $_POST['surname'];
                  
                  @$sql1 = "UPDATE member
                  SET username ='$username',password='$password',email='$email',tel='$tel',status = '$status',name = '$name',surname = '$surname' 
                  WHERE id='$id'";

                  echo "<center><br>";
                  echo "<font color='white'>";
                  if (mysqli_query($conn, $sql1)) {

                    echo "<script>alert('บันทึกข้อมูลเรียบร้อย');window.location='admin_searchmember.php';</script>";
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
          </div>
          <div class="col-md-4">
            <!--<img src="" class="img-fluid" alt="">

            <h5 class="text-center" style="margin-top: 15px;"></h5>-->
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
<?php } ?>