<?php
require_once("connect.php"); //// ติดต่อฐานข้อมูล

$user = $_POST['txtKeyword'];

$sql = "SELECT * FROM mamber WHERE name = '$user' or number = '$user' ";
$query = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($query);

if ($rowcount > 0) {
    echo "<script>alert('รหัสผ่านถูกต้องสามารถเข้าใช้งานระบบได้ค่ะ :D'); self.opener.location='receive2.php';window.close();</script>";
} else {
    echo "<script>alert(' password  ไม่ถูกต้องตรวจสอบอีกครั้ง'); window.location = 'receive1.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รับซือ</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
        <style> body{font-family: 'Sarabun', sans-serif;}</style>
</head>
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
  <h2>โปรแกรมรับซื้อขยะ</h2>
  <p>หน้าของฉัน</p>

  <form action="receive2.php" method="post">
 
  <p><p><p></p></p></p>
  <table border>
<thead>
    <tr>
                    <th>ลำดับ</th>
                    <th>รหัสประจำตัว</th>
                    <th>ชื่อ</th>
                    <th>เบอร์มือถือ</th>
                    <th  colspan="4">รายการการทำงาน</th>
    </tr>
</thead>
<tbody>

    <?php
        include("connect.php");
        if (isset($_POST['submit'])) {

          $txtKeyword = $_POST['txtKeyword'];     
        ?>
           
        <?php 
    
                
        
        if($txtKeyword != "admin") {
 
        $query = "SELECT * FROM mamber WHERE (name LIKE '%".$_POST["txtKeyword"]."%' or number LIKE '%".$_POST["txtKeyword"]."%')";
        $result = mysqli_query($conn, $query);
        @$i++; while ($row = mysqli_fetch_array($result)) {
        ?>

   
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><a href="product.php?update_id=<?php echo $row["id"];?>">ขายขยะ</a></td>
            <td><a href="user_orderlist.php?update_id=<?php echo $row["id"];?>">ประวัติการขายขยะ</a></td>
            <td><a href="user_dividend.php?update_id=<?php echo $row["id"];?>">รายงานการปันผลประจำปี</a></td>
            <td><a href="update_m.php?update_id=<?php echo $row["id"];?>">แก้ไขข้อมูล</a></td>
            
        </tr>
    <?php $i++;
                }
                    }else{
                        echo "<script>";
                        echo "window.location = 'admin_searchmamber.php'";
                        echo "</script>";
                        }

                     

                    }
    ?>
    
</tbody>
</table>
</form>
</head>
</html>