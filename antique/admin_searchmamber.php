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
<a href="receive1.php"> <input type="button" value="หน้าหลัก" size='40' > </a>
<a href="orderlist.php"> <input type="button" value="ตารางประจำเดือน" size='40' > </a>
<a href="admin_editmem.php"> <input type="button" value="ยืนยันการแก้ไขจากผู้ใช้" size='40' > </a>
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
  <h2>ค้นหาข้อมูลลูกค้า</h2>
  <p>ยินดีต้อนรับ กรุณากรอกข้อมูลให้ครบ</p>
  <form action="admin_searchmamber.php" method="post">
  <b>ค้นหา</b>
  <input name = "txtKeyword"type="text" placeholder="Search" >
  <button name = "submit" type="submit">Go</button>
  <table border>
<thead >
    <tr>
    
                    <th>ลำดับ</th>
                    <th>รหัสประจำตัว</th>
                    <th>ชื่อ</th>
                    <th >เบอร์มือถือ</th>
                    <th  colspan="4">รายการการทำงาน</th>
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
            
            <td><a href="admin_orderlist.php?update_id=<?php echo $row["id"];?>">ประวัติรายวัน</a></td>
            <td><a href="admin_dividend.php?update_id=<?php echo $row["id"];?>">รายงานการปันผลประจำปี</a>|</td>
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
                
                <td><a href="admin_orderlist.php?update_id=<?php echo $row["id"];?>">ประวัติรายวัน</a>|</td>
                <td><a href="admin_dividend.php?update_id=<?php echo $row["id"];?>">รายงานการปันผลประจำปี</a>|</td>
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