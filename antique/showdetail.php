
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
    <style> body{font-family: 'Sarabun', sans-serif;} 
</style><title>สรุปรายการ</title>
</head>
<a href="receive1.php"> <input type="button" value="หน้าหลัก" size='40' > </a>
<a href="receive2.php"> <input type="submit" value="ค้นหาสมาชิกทั้งหมด" size='40' >  </a>
<a href="orderlist.php"> <input type="submit" value="รายการซื้อขายทั้งหมด" size='40' >  </a>
<center>
<?php 
ob_start()
?>
<fieldset><legend><b>รายการขาย</b></legend>
<br/>
<?php
include("connect.php");
$sql = "SELECT * FROM orderlist";
if (isset($_GET['update_id'])) {
   $id = $_GET['update_id']; 
   $sql .= " WHERE mid='".$id."'";
}
$sql .= " order by rid desc";
$run = $conn->query($sql);
$row = $run->fetch_assoc();

$rowdetail = $row['detail'];
$rowdetail = str_replace(" ", "<br>", $rowdetail);

  $orderrid = $row['rid'];
  $memid = $row['mid'];
 // echo $orderrid;
                     @$sql2 = "SELECT * FROM mamber WHERE id = '$memid'";
                     @$query2 = mysqli_query($conn,$sql2);
                     @$rs2 = mysqli_fetch_array($query2);
?>
    <h4>ผู้ขาย :<?php echo $rs2['name'];?></h4>
    <h4>รหัสรายการขาย :<?php echo $orderrid;?>&nbsp; &nbsp; &nbsp; &nbsp; รหัสลูกค้า :<?php echo $row['mid'];?></h4>
    <h4>รายละเอียด :<?php echo $rowdetail;?></h4> 
    <h4>ราคารวม :<?php echo $row['total'];?> บาท</h4>
    <h4>วันที่ขาย :<?php echo $row['datesell'];?></h4>
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


