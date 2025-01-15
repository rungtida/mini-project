<?php include("conn/connectdb.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Success</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" href="img/favicon.png">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v15/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v15/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v15/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v15/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v15/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v15/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v15/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v15/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v15/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v15/css/main.css">
	<!--===============================================================================================-->

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

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(Login_v15/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Thank you for your sign up.
					</span>
				</div>

        <?php
    if (isset($_POST['save'])) {
        //ประกาศตัวแปร และนำค่ามาใส่ในตัวแปร
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];
        $sur = $_POST['surname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $status = "user";
		
		

        @$sql2 = "SELECT MAX(memid) AS memid FROM member";
    @$query = mysqli_query($conn,$sql2);
    @$rs = mysqli_fetch_array($query);
    if($rs['memid'] !=""){
        $sub = substr($rs['memid'],3)+1;      
        $memid = sprintf('M%03.0f', $sub);
    }else{
        $memid = "M001";
	}

    
        
        @$sql1 = "INSERT INTO member(memid, username, pass, name, surname, email, tel, memstatus) 
        VALUES('$memid','$username','$pass','$name','$sur','$email','$tel','$status')";
                // echo $sql1."<br>";
                echo "<center><br>";
                echo "<font color='white'>";
                if (mysqli_query($conn, $sql1)) {
                    echo "บันทึกลงฐานข้อมูลเรียบร้อยแล้ว";
                } else {
                    echo "ผิดพลาด: " . $sql1 . "<br>" . mysqli_error($conn);
                }
                echo "</font></center><br>";
                mysqli_query($conn, $sql1);
                mysqli_close($conn);

    }

    ?>

				<br>

				<center>
					<a href="login.php">
						<div class="btn_1">Log In</div>
					</a>
				</center>
				<br><br>
			</div>
		</div>

	</div>

	<!--===============================================================================================-->
	<script src="Login_v15/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v15/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v15/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v15/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v15/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v15/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login_v15/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v15/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="Login_v15/js/main.js"></script>

</body>

</html>