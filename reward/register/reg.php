<?php include("../connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form action ="reg.php" method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input name = "name" class="input--style-5" type="text"Required>
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input name = "surname" class="input--style-5" type="text"Required>
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input name = "username"class="input--style-5" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input name = "password"class="input--style-5" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email"required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="tel"required>
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <button name = "save"class="btn btn--radius-2 btn--red" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['save'])) {
        //ประกาศตัวแปร และนำค่ามาใส่ในตัวแปร
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
        $sur = $_POST['surname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $status = "user";
		
		

        @$sql2 = "SELECT MAX(id) AS id FROM member";
    @$query = mysqli_query($conn,$sql2);
    @$rs = mysqli_fetch_array($query);
    if($rs['id'] !=""){
        $sub = substr($rs['id'],3)+1;      
        $id = sprintf('M%03.0f', $sub);
    }else{
        $id = "M001";
	}

    
        
        @$sql1 = "INSERT INTO member(id, username, password, email, tel, status, name, surname) 
        VALUES('$id','$username','$pass','$email','$tel','$status','$name','$sur')";
                // echo $sql1."<br>";
                echo "<center><br>";
                echo "<font color='white'>";
                if (mysqli_query($conn, $sql1)) {
                    echo "<script>";
                    echo "alert(\" complete\");"; 
                    echo "window.location = '../login/login.php'";
                    echo "</script>";
                } else {
                    echo "ผิดพลาด: " . $sql1 . "<br>" . mysqli_error($conn);
                }
                echo "</font></center><br>";
                mysqli_query($conn, $sql1);
                mysqli_close($conn);

    }

    ?>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->