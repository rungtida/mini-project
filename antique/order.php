
<?php
error_reporting(0);
ini_set('display_errors', 0);    
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];
$a6 = $_POST['a6'];
$a7 = $_POST['a7'];
$a8 = $_POST['a8'];
$id = $_POST['mid'];
$name = $_POST['name'];


?>

    
<?php
    
if($a1 != null && $a1 != 0){
    $suma1 = $a1 * 12.5;
    $ta1 = "-ขวดเบียร์ช้าง $a1 กล่อง";
  }else {$suma1 = 0;}
  
  if($a2 != null && $a2 != 0){
    $suma2 = $a2 * 9.50;
    $ta2 = "-ขวดเบียร์ลีโอ $a2 กล่อง";
  }else {$suma2 = 0;}
  
  if($a3 != null && $a3 != 0){
    $suma3 = $a3 * 5.00;
    $ta3 = "-ขวดน้ำขาวขุ่น $a3 กก.";
  }else {$suma3 = 0;}
  
  if($a4 != null && $a4 != 0){
    $suma4 = $a4 * 3.00;
    $ta4 = "-ขวดน้ำใส $a4 กก.";
  }else {$suma4 = 0;}
  
  if($a5 != null && $a5 != 0){
    $suma5 = $a5 * 24.00;
    $ta5 = "-อลูมิเนียมกระป๋องโค้ก $a5 กก.";
  }else {$suma5 = 0;}
  
  if($a6 != null && $a6 != 0){
    $suma6 = $a6 * 1.50;
    $ta6 = "-กระดาษหนังสือพิมพ์ $a6 กก.";
  }else {$suma6 = 0;}
  
  if($a7 != null && $a7 != 0){
    $suma7 = $a7 * 1.10;
    $ta7 = "-กระดาษหนังสือเล่มรวม $a7 กก.";
  }else {$suma7 = 0;}
  
  if($a8 != null && $a8 != 0){
    $suma8 = $a8 * 0.90;
    $ta8 = "-กระดาษสี/กระดาษกล่องรองเท้า/กล่องผลไม้ $a8 กก.";
  }else {$suma8 = 0;}
  
  $sum = $suma1+$suma2+$suma3+$suma4+$suma5+$suma6+$suma7+$suma8;
  //echo "<h4>ราคารวม $sum บาท</h4>";
?>


<?php
include("connect.php");

date_default_timezone_set("Asia/Bangkok");
//echo date_default_timezone_get();

    $datesell = date("y/m/d");
    $datetime = date("H:i:s");
   
    $detail = trim("$ta1 $ta2 $ta3 $ta4 $ta5 $ta6 $ta7 $ta8"," ");

    @$sql2 = "SELECT MAX(rid) AS rid FROM orderlist";
    @$query = mysqli_query($conn,$sql2);
    @$rs = mysqli_fetch_array($query);

if($rs['rid'] !=""){

      $mem_old=$rs['rid'];
      $tmp1=substr($mem_old,0,1);//จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
      $tmp2=substr($mem_old,1);//ตัวเลขที่เหลือ
      $tmp3=$tmp2+1;//จริงๆ เอาไปรวมกับตัว $tmp2 เลยก็ได้ค่ะ แต่ว่ากลัวงง ก็เลยแยกไว้ให้

      if($tmp3<=9){$rid='R00' .$tmp3;}
        else if($tmp3>9&&$tmp3<=99){$rid='R0' .$tmp3;}
        else if($tmp3>99&&$tmp3<=999){$rid='R' . $tmp3;}
        else{$rid=$tmp3;}

}
else{$rid = "R001";}
      
             @$sql1 = "INSERT INTO orderlist(rid,mid,detail,total,datesell,datetimesell) 
             VALUES('$rid','$id','$detail','$sum','$datesell','$datetime')";

                echo "<center><br>";
                echo "<font color='white'>";
                
                if (mysqli_query($conn, $sql1)) {
                    echo "<script>";
                    echo "alert(\" บันทึกร้อยแล้ว\");"; 
                    echo "window.location = 'user_showdetail.php'";
                    echo "</script>";
                } else {
                    echo "ผิดพลาด: " . $sql1 . "<br>" . mysqli_error($conn);
                }
                echo "</font></center><br>";
                mysqli_query($conn, $sql1);
                mysqli_close($conn);
 
 ?>

