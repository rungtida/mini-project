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

    <title>Seacrh Member</title>

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
                
                <li class="nav-item dropdown">
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
              <h4>SEARCH</h4>
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
              <h2>Search member</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form  action="admin_searchmember.php" method="post">
                
                
                

              <div class="row">
                <div class="col-8">
                  <input name = "txtKeyword"type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                </div>

                <div class="col-4">
                  <button name = "search" class="filled-button" type="submit">Go</button>
                </div>
              </div>
            
            <div class="col-sm-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รหัสประจำตัว</th>
                                                    <th>USERNAME</th>
                                                    <th>PASSWORD</th>
                                                    <th>EMAIL</th>
                                                    <th>tel</th>
                                                    <th>status</th>
                                                    <th>ชื่อ</th>
                                                    <th>นามสกุล</th>
                                                    
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                    <?php
                        include("../connect.php");
                        if (isset($_POST['search'])) {
                            $txtKeyword = $_POST['txtKeyword'];
                            if($txtKeyword != "") {
                              //error_reporting(E_ALL ^ E_NOTICE);
                                                       $query = "SELECT * FROM member WHERE (id LIKE '%".$_POST["txtKeyword"]."%' or username LIKE '%".$_POST["txtKeyword"]."%' 
                                                                                          or email LIKE '%".$_POST["txtKeyword"]."%'
                                                                                          or tel LIKE '%".$_POST["txtKeyword"]."%' or status LIKE '%".$_POST["txtKeyword"]."%'
                                                                                          or name LIKE '%".$_POST["txtKeyword"]."%'or surname LIKE '%".$_POST["txtKeyword"]."%')";
                                                         $result = mysqli_query($conn, $query);
                                                         @$i++; while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['username']; ?></td>
                                                        <td><?php echo $row['password']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['tel']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['surname']; ?></td>
                                                        
                                                        <td><a href="admin_editmember.php?update_id=<?php echo $row["id"];?>">แก้ไข</a></td>
                                                        <td><a href="admin_deletemember.php?delete_id=<?php echo $row["id"];?>">ลบ</a></td>
                                                    </tr>
                                                <?php $i++;
                                                    }
                            }else{
                                                    $query = "SELECT * FROM member";
                                                    $result = mysqli_query($conn, $query);
                                                    @$i=1; while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['username']; ?></td>
                                                        <td><?php echo $row['password']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['tel']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['surname']; ?></td>
                                                        
                                                        <td><a href="admin_editmember.php?update_id=<?php echo $row["id"];?>">แก้ไข</a></td>
                                                        <td><a href="admin_deletemember.php?delete_id=<?php echo $row["id"];?>">ลบ</a></td>
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