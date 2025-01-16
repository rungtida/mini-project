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
<center>
<body>
<div class="container">
  <h2>รับซื้อของเก่า </h2>
  <p>ยินดีต้อนรับ กรุณากรอกข้อมูลให้ครบ</p>
  <form action="receive.php" method="post">
  <b>ค้นหา</b>
  <input name = "txtKeyword"type="text" placeholder="Search" >
  <button name = "submit" type="submit">Go</button>
  <table class="table table-striped table-bordered">
<thead>
    <tr>
                    <th>ลำดับ</th>
                    <th>รหัสประจำตัว</th>
                    <th>ชื่อ</th>
                    <th>เบอร์มือถือ</th>
       </tr>
    </thead>
   <tbody>
    <?php
   include("connect.php");
      if (isset($_POST['submit'])) {
          $txtKeyword = $_POST['txtKeyword'];
        if($txtKeyword != "") {
  //error_reporting(E_ALL ^ E_NOTICE);
        $query = "SELECT * FROM mamber WHERE (id LIKE '%".$_POST["txtKeyword"]."%' or name LIKE '%".$_POST["txtKeyword"]."%' 
                or number LIKE '%".$_POST["txtKeyword"]."%')";
        $result = mysqli_query($conn, $query);
        @$i++; while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><a href="product.php?update_id=<?php echo $row["id"];?>">สั่งซื้อ</a></td>
            <td><a href="orderlist.php?update_id=<?php echo $row["id"];?>">ประวัติรายวัน</a></td>
            <td><a href="update_m.php?update_id=<?php echo $row["id"];?>">แก้ไขข้อมูล</a></td>
            <td><a href="delete.php?delete_id=<?php echo $row["id"];?>">ลบข้อมูล</a></td>
            
        </tr>
    <?php $i++;
                }
                    }else{
                        $query = "SELECT * FROM mamber";
                        $result = mysqli_query($conn, $query);
                        @$i=1; while ($row = mysqli_fetch_array($result)) {
    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['number']; ?></td>
                <td><a href="product.php?update_id=<?php echo $row["id"];?>">สั่งซื้อ</a> | </td>
                <td><a href="orderlist.php?update_id=<?php echo $row["id"];?>">ประวัติรายวัน</a>|</td>
                <td><a href="update_m.php?update_id=<?php echo $row["id"];?>">แก้ไขข้อมูล</a>|</td> 
                <td><a href="delete.php?delete_id=<?php echo $row["id"];?>">ลบข้อมูล</a></td>
                
            </tr>
    <?php $i++;
                            }
                        }
                    }
    ?>
</tbody>
</table>
</form>
</head>
</html>