
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


