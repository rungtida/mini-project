<?php
    include("connect.php");
    if(isset($_GET['delete_id'])){ 
        $delete_id = $_GET['delete_id'];
        $sql = "DELETE FROM mamber WHERE id='".$delete_id."'";
        $result = mysqli_query($conn,$sql);

        
        $sql2 = "DELETE FROM orderlist WHERE mid='".$delete_id."'";
        $result2 = mysqli_query($conn,$sql2);

        if (mysqli_query($conn, $sql)) {

            echo "<script>alert('ลบข้อมูลเรียบร้อย');window.location='admin_searchmamber.php';</script>";
          } else {
            echo "ผิดพลาด: " . $sql . "<br>" . mysqli_error($conn);
          }
          echo "</font></center><br>";
          mysqli_query($conn, $sql);
          mysqli_close($conn);
        }
?>