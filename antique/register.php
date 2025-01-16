<?php include("connect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
        <style> body{font-family: 'Sarabun', sans-serif;}</style>
    
</head><br>
<a href="receive1.php"><input type="button" value="หน้าหลัก" size='40' ></a>
<center>
<body>
<style>

	body {
  		background-image: url('Pic/1.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style> 
<div class="container">
  <h2>สมัครสมาชิก </h2>
  <p>กรุณากรอกข้อมูลให้ครบ</p>
  <table class="table">

    <form action="register.php" method="post">

    <fieldset><legend><b>ข้อมูลส่วนตัว</b></legend>
<br/>
                <div>
                <label>รหัสลูกค้า :</label>

              <?php include("connect.php");

                  @$sql2 = "SELECT MAX(id) AS id FROM mamber";
                  @$query = mysqli_query($conn,$sql2);
                  @$rs = mysqli_fetch_array($query);

              if($rs['id'] !=""){
                    $mem_old=$rs['id'];
                    $tmp1=substr($mem_old,0,1);//จะได้เฉพาะตัวแรกที่เป็นตัวอักษร 
                    $tmp2=substr($mem_old,1);//ตัวเลขที่เหลือ 
                    $tmp3=$tmp2+1;//จริงๆ เอาไปรวมกับตัว $tmp2 เลยก็ได้ค่ะ แต่ว่ากลัวงง ก็เลยแยกไว้ให้
              if($tmp3<=9){$id='M00' .$tmp3;}
                      else if($tmp3>9&&$tmp3<=99){$id='M0' .$tmp3;}
                      else if($tmp3>99&&$tmp3<=999){$id='M' . $tmp3;}
                      else{$id=$tmp3;}
              }
              else{$id = "M001";}
                    ?>

                  <input type="text" name ="mid" value="<?php echo $id ?>" readonly size='40'><br><br>
                </div> 

               <div>
                <label>ชื่อสมาชิก :</label>
                  <input type="text" name ="name" id = "name" size='40'><br><br>
                </div>
                <div>
                <label>เบอร์มือถือ :</label>
                  <input type="text" name ="number" id = "number" size='40'><br><br>
                </div>
                <div>
                <input type="submit" name="register" value="สมัคร">

                <a href="javascript:location.href=location.href">
                <input type="button" name="refresh" value="รีเฟรช"></a>
                </div><br>
                </form>
</body>
</center>
</html>


<?php
    if (isset($_POST['register'])) {
      include("connect.php");
    $name = $_POST['name'];
    $number = $_POST['number'];

        @$sql1 = "INSERT INTO mamber(id, name, number) VALUES('$id','$name','$number')";
                echo "<center><br>";
                echo "<font color='white'>";
                if (mysqli_query($conn, $sql1)) {
                    echo "<script>";
                    echo "alert(\" สมัครสมาชิกเรียบร้อยแล้ว\");"; 
                    echo "window.location = 'receive1.php'";
                    echo "</script>";
                } else {
                    echo "ผิดพลาด: " . $sql1 . "<br>" . mysqli_error($conn);
                }
                echo "</font></center><br>";
                mysqli_query($conn, $sql1);
                mysqli_close($conn);
    }
                 
    ?>