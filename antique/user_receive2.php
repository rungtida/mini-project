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
  		background-image: url('Pic/2.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style> 
<div class="container">
  <h2>โปรแกรมรับซื้อขยะ</h2>
  <p>หน้าของฉัน</p>

  <form action="user_receive2.php" method="post">
 
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
   

          $memid = $_GET['update_id'];
         
        $query = "SELECT * FROM mamber WHERE id = '$memid'";
        $result = mysqli_query($conn, $query);
        @$i++; while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><a href="product.php?update_id=<?php echo $row["id"];?>">ขายขยะ</a></td>
            <td><a href="user_orderlist.php?update_id=<?php echo $row["id"];?>">ประวัติรายวัน</a></td>
            <td><a href="user_dividend.php?update_id=<?php echo $row["id"];?>">รายงานการปันผลประจำปี</a></td>
            <td><a href="update_m.php?update_id=<?php echo $row["id"];?>">แก้ไขข้อมูล</a></td>
            
        </tr>
    <?php $i++;
                }
                   
                   
                    
    ?>
    
</tbody>
</table>
</form>
</head>
</html>