<?php
 include("connect.php");

$edit_id = $_GET['update_id'];
$query = "SELECT * FROM editmem WHERE eid = '$edit_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$name = $row['name'];
$numuber = $row['number'];
$sql2 = "UPDATE mamber SET name = '$name', number = '$numuber' WHERE id = '$_GET[update_id]'";
mysqli_query($conn,$sql2);

$status = "complete";
$sql1 = "UPDATE editmem SET status = '".$status."' WHERE eid = '".$edit_id."'";
mysqli_query($conn,$sql1);


echo "<script> alert('บันทึกการเปลี่ยนแปลงข้อมูลสำเร็จ'); </script>";
echo "<script> window.location.assign('admin_searchmamber.php');</script>";
  
        
       
?>