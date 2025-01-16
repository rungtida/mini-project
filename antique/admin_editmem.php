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
<a href="admin_searchmamber.php"> <input type="button" value="ค้นหาข้อมูลลูกค้า" size='40' > </a>
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
  <h2>ยืนยันการแก้ไขจากผู้ใช้</h2>

  <form action="admin_editmem.php" method="post">

  <b>ค้นหา</b>

  <input name = "txtKeyword"type="text" placeholder="Search" >
  <button name = "submit" type="submit">Go</button>
 <br><br>
  <table border="1">
<thead>
    <tr>
    
                    <th>ลำดับ</th>
                    <th>รหัสประจำตัว</th>
                    <th>ชื่อ</th>
                    <th>เบอร์มือถือ</th>
                    <th>สถานะ</th>
       </tr>
       
    </thead>
   <tbody>
    <?php
   include("connect.php");
      if (isset($_POST['submit'])) {
          $txtKeyword = $_POST['txtKeyword'];
        if($txtKeyword != "") {

            error_reporting(0);
            ini_set('display_errors', 0);

        $query = "SELECT * FROM editmem WHERE (eid LIKE '%".$_POST["txtKeyword"]."%' or name LIKE '%".$_POST["txtKeyword"]."%' 
                or number LIKE '%".$_POST["txtKeyword"]."%') AND status = 'wait'";
        $result = mysqli_query($conn, $query);
        @$i++; while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['eid']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a href="summitedit.php?update_id=<?php echo $row["eid"];?>">ยืนยันการเปลี่ยนแปลง</a></td>
            
        </tr>
        
        
    <?php $i++;
                }
                    }else{
                        $query = "SELECT * FROM editmem WHERE status = 'wait'";
                        $result = mysqli_query($conn, $query);
                        @$i=1; while ($row = mysqli_fetch_array($result)) {
    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['eid']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['number']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><a href="summitedit.php?update_id=<?php echo $row["eid"];?>">ยืนยันการเปลี่ยนแปลง</a></td>
                
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