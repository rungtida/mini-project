<?php
include('connect.php');
if($_GET["update_id"]==''){ 
echo "<script type='text/javascript'>"; 
echo "alert('ปรับปรุงข้อมูลเรียบร้อย !!');"; 
echo "window.location = 'receive.php'; "; 
echo "</script>"; 
}
// //รับค่าไอดีที่จะแก้ไข
// $update_id = mysqli_real_escape_string($con,$_GET['update_id']);
 
// //2. query ข้อมูลจากตาราง: 
// $sql = "SELECT * FROM member WHERE id ='$update_id' ";
// $result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result);
// extract($row);
// ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
            <style> body{font-family: 'Sarabun', sans-serif;}</style>
            <title>ฟอร์มแก้ไขข้อมูลสมาชิก</title>
        </head>
        <center>
        <body>
        <div class="container">
  <h2>ฟอร์มแก้ไขข้อมูลสมาชิก</h2>
  <p>กรุณากรอกข้อมูลของท่าน</p>
  <table class="table">
    <form action="update.php" method="post" name="update_m" id="update_m">
    <fieldset><legend><b>ข้อมูลส่วนตัว</b></legend>
<br/><div>
                <label>รหัสลูกค้า :</label>
                <?php include("connect.php");
                   @$sql2 = "SELECT MAX(id) AS id FROM mamber";
                   @$query = mysqli_query($conn,$sql2);
                   @$rs = mysqli_fetch_array($query);
                   if($rs['id'] !=""){
                       $sub = substr($rs['id'],3)+1;      
                       $id = sprintf('M%03.0f', $sub);
                   }else{
                       $id = "M001";
                 }
                    ?>
                  <input type="text" name ="mid" value="<?php echo $id ?>" readonly size='40'><br><br>
                </div> 
               <div>
                <label>ชื่อสมาชิก :</label>
                  <input type="text" name ="name" id = "name" size='40'><br><br>
                </div>
                <div>
                <label>เบอร์มือถือ :</label>
                  <input type="text" name ="number" id = "number" size='40'><br><br>
                </div>
                <br><input type="button" value=" ยกเลิก " onclick="window.location='receive.php' " /> <!-- ถ้าไม่แก้ไขให้กลับไปหน้าแสดงรายการ -->
                &nbsp;<input type="submit" name="Update" id="Update" value="Update" />
                </form>
</body>
</center>
            </table>
        </body>
        </html>
 