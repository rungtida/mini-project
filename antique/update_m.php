<?php
require_once('connect.php'); //เชื่อมต่อฐานข้อมูล
if(isset($_GET['update_id'])){
    $update_id=$_GET['update_id'];
             $sql= "SELECT * FROM mamber
             WHERE id ='".$update_id."'";
    // run คำสั่ง sqli
    $result = mysqli_query($conn,$sql);
    //แสดงผล
    while($array1 = mysqli_fetch_array($result)){
?>

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
        <style>

	body {
  		background-image: url('Pic/3.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style> 
        <div class="container">
  <h2>ฟอร์มแก้ไขข้อมูลสมาชิก</h2>
  <p>กรุณากรอกข้อมูลของท่าน</p>
  <table class="table">
    <form action="update_m.php" method="post" name="update_m" id="update_m">
    <fieldset><legend><b>ข้อมูลส่วนตัว</b></legend>
<br/><div>
                <label>รหัสลูกค้า :</label>
                  <input type="text" name ="eid" value="<?php echo $array1['id'] ?>" readonly size='40' readonly><br><br>
                </div> 
               <div>
                <label>ชื่อสมาชิก :</label>
                  <input type="text" name ="name"  size='40' value="<?php echo $array1['name'] ?>"><br><br>
                </div>
                <div>
                <label>เบอร์มือถือ :</label>
                  <input type="text" name ="number"  size='40' value="<?php echo $array1['number'] ?>"><br><br>
                </div>
                <br>
                <input type="submit" value=" บันทึก " name="update" id="update"/>&nbsp;&nbsp;
                <input type="button" value=" ยกเลิก " onclick="window.location='receive1.php' " /> <!-- ถ้าไม่แก้ไขให้กลับไปหน้าแสดงรายการ -->
                
                </form>
                <?php
    }
}
?>

<?php
  if(isset($_POST['update'])){

$eid = $_POST['eid'];
$name = $_POST['name'];
$number = $_POST['number'];
$status = "wait";

    @$sql = "INSERT INTO editmem(eid,name,number,status) 
    VALUES('$eid','$name','$number','$status')";


    mysqli_query($conn,$sql);
		 echo "<script> alert(' แก้ไขข้อมูลสำเร็จ รอแอดมินยืนยัน '); </script>";
		 echo "<script> window.location.assign('receive1.php');</script>";
         mysqli_close($conn);//ปิดการเชื่อมต่อฐานข้อมูล
        }
?>
</body>
</center>
            </table>
        </body>
        </html>