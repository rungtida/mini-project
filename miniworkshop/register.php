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
<center>

<body>
<div class="container">
  <h2>สมัครสมาชิก </h2>
  <p>ยินดีต้อนรับ กรุณากรอกข้อมูลให้ครบ</p>
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
                       $sub = substr($rs['id'],3)+1;      
                       $id = sprintf('M%03.0f', $sub);
                   }else{
                       $id = "M001";
                 }
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
                <a href="javascript:location.href=location.href"><input type="button" name="refresh" value="รีเฟรช"></a>
                </div><br>
                </form>
                <a href="receive.php"> <input type="submit" value="ค้นหาสมาชิกทั้งหมด" size='40' >  </a>
                <a href="orderlist.php"> <input type="submit" value="รายการซื้อขายทั้งหมด" size='40' >  </a>
</body>
</center>
</html>


<?php
    if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
        @$sql1 = "INSERT INTO mamber(id, name, number) VALUES('$id','$name','$number')";
                echo "<center><br>";
                echo "<font color='white'>";
                if (mysqli_query($conn, $sql1)) {
                    echo "<script>";
                    echo "alert(\" สมัครสมาชิกเรียบร้อยแล้ว\");"; 
                    echo "window.location = 'receive.php'";
                    echo "</script>";
                } else {
                    echo "ผิดพลาด: " . $sql1 . "<br>" . mysqli_error($conn);
                }
                echo "</font></center><br>";
                mysqli_query($conn, $sql1);
                mysqli_close($conn);
    }
                 
    ?>