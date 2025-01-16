<?php
    //เชื่อมฐานข้อมูล
    include("../connect.php");
    if(isset($_GET['delete_code'])){ //เมื่อรับค่า delete_id มา
        $delete_code = $_GET['delete_code'];
        $sql = "DELETE FROM point WHERE code='".$delete_code."'";
        $result = mysqli_query($conn,$sql); //run คำสั่ง sql
        if (mysqli_query($conn, $sql)) {

            echo "<script>alert('ลบข้อมูลเรียบร้อย');window.location='admin_searchcode.php';</script>";
          } else {
            echo "ผิดพลาด: " . $sql . "<br>" . mysqli_error($conn);
          }
          echo "</font></center><br>";
          mysqli_query($conn, $sql);
          mysqli_close($conn);
        }