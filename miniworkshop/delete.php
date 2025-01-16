<?php
    include("connect.php");
    if(isset($_GET['delete_id'])){ 
        $delete_id = $_GET['delete_id'];
        $sql = "DELETE FROM mamber WHERE id='".$delete_id."'";
        $result = mysqli_query($conn,$sql);
        if (mysqli_query($conn, $sql)) {

            echo "<script>alert('ลบข้อมูลเรียบร้อย');window.location='receive.php';</script>";
          } else {
            echo "ผิดพลาด: " . $sql . "<br>" . mysqli_error($conn);
          }
          echo "</font></center><br>";
          mysqli_query($conn, $sql);
          mysqli_close($conn);
        }
?>