
<?php

require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
    <style> body{font-family: 'Sarabun', sans-serif;} 
</style><title>สรุปรายการ</title>
</head>
<center>
<?php 
ob_start()
?>
<fieldset><legend><b>รายการขาย</b></legend>
<br/>
<?php
include("connect.php");
  $sql_1 = "SELECT * FROM orderlist WHERE rid ='$_REQUEST[update_id]'";
                     @$query = mysqli_query($conn, $sql_1);
                     @$rs = mysqli_fetch_array($query);
  $orderrid = $rs['mid'];
                     @$sql2 = "SELECT * FROM mamber WHERE id = '$orderrid'";
                     @$query2 = mysqli_query($conn,$sql2);
                     @$rs2 = mysqli_fetch_array($query2);
?>
    <h4>ผู้ขาย :<?php echo $rs2['name'];?></h4>
    <h4>รหัสรายการขาย :<?php echo $_REQUEST['update_id'];?>&nbsp; &nbsp; &nbsp; &nbsp;รหัสลูกค้า :<?php echo $rs['mid'];?></h4>
    <h4>รายละเอียด :<?php echo $rs['detail'];?></h4> 
    <h4>ราคารวม :<?php echo $rs['total'];?> บาท</h4>
    <h4>วันที่ขาย :<?php echo $rs['datesell'];?></h4>
<?php 
    $html=ob_get_contents();
    $mpdf->WriteHTML($html);
    $mpdf->Output("sale.pdf");

    echo " เวลาที่ขาย \n";
    $date2 = new DateTime();
    $date2->setTimezone(new DateTimeZone('Asia/Bangkok'));
    echo $date2->format(DateTime::RFC1123) . "\n"; 

    ob_end_flush();
    ?>
    <a href="sale.pdf" class="btn btn-primary">Download (pdf)</a> <br><br>
</body>



<?php
    
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
    $ta1 = "ขวดเบียร์ช้าง $a1 กล่อง";
  }else {$suma1 = 0;}
  
  if($a2 != null && $a2 != 0){
    $suma2 = $a2 * 9.50;
    $ta2 = "ขวดเบียร์ลีโอ $a2 กล่อง";
  }else {$suma2 = 0;}
  
  if($a3 != null && $a3 != 0){
    $suma3 = $a3 * 5.00;
    $ta3 = "ขวดน้ำขาวขุ่น $a3 กก.";
  }else {$suma3 = 0;}
  
  if($a4 != null && $a4 != 0){
    $suma4 = $a4 * 3.00;
    $ta4 = "ขวดน้ำใส $a4 กก.";
  }else {$suma4 = 0;}
  
  if($a5 != null && $a5 != 0){
    $suma5 = $a5 * 24.00;
    $ta5 = "อลูมิเนียมกระป๋องโค้ก $a5 กก.";
  }else {$suma5 = 0;}
  
  if($a6 != null && $a6 != 0){
    $suma6 = $a6 * 1.50;
    $ta6 = "กระดาษหนังสือพิมพ์ $a6 กก.";
  }else {$suma6 = 0;}
  
  if($a7 != null && $a7 != 0){
    $suma7 = $a7 * 1.10;
    $ta7 = "กระดาษหนังสือเล่มรวม $a7 กก.";
  }else {$suma7 = 0;}
  
  if($a8 != null && $a8 != 0){
    $suma8 = $a8 * 0.90;
    $ta8 = "กระดาษสี/กระดาษกล่อง รองเท้า/กล่องผลไม้ $a8 กก.";
  }else {$suma8 = 0;}
  
  $sum = $suma1+$suma2+$suma3+$suma4+$suma5+$suma6+$suma7+$suma8;
  echo "<h4>ราคารวม $sum บาท</h4>";
?>


<?php
include("connect.php");
    $detail = 5; 
    $date = date("d/m/y");
    $detail = trim("$ta1 $ta2 $ta3 $ta4 $ta5 $ta6 $ta7 $ta8"," ");
  
    @$sql2 = "SELECT MAX(rid) AS rid FROM orderlist";
    @$query = mysqli_query($conn,$sql2);
    @$rs = mysqli_fetch_array($query);
    if($rs['rid'] !=""){
        $sub = substr($rs['rid'],3)+1;      
        $rid = sprintf('R%03.0f', $sub);
    }else{
        $rid = "R001";
  }
      
             @$sql1 = "INSERT INTO orderlist(rid,mid,detail,total,datesell) 
             VALUES('$rid','$id','$detail','$sum','$date')";

                echo "<center><br>";
                echo "<font color='white'>";
                
                if (mysqli_query($conn, $sql1)) {
                    echo "<script>";
                    echo "alert(\" บันทึกร้อยแล้ว\");"; 
                    echo "window.location = 'orderlist.php'";
                    echo "</script>";
                } else {
                    echo "ผิดพลาด: " . $sql1 . "<br>" . mysqli_error($conn);
                }
                echo "</font></center><br>";
                mysqli_query($conn, $sql1);
                mysqli_close($conn);
 
 ?>

