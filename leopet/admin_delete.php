<?php
    //เชื่อมฐานข้อมูล
    include("conn/connectdb.php");
    if(isset($_GET['delete_id'])){ //เมื่อรับค่า delete_id มา
        $delete_id = $_GET['delete_id'];
        $sql = "DELETE FROM member WHERE memid='".$delete_id."'";
        $result = mysqli_query($conn,$sql); //run คำสั่ง sql
        if (mysqli_query($conn, $sql)) {

            echo "<script>alert('ลบข้อมูลเรียบร้อย');window.location='admin_searchmem.php';</script>";
          } else {
            echo "ผิดพลาด: " . $sql . "<br>" . mysqli_error($conn);
          }
          echo "</font></center><br>";
          mysqli_query($conn, $sql);
          mysqli_close($conn);
        }