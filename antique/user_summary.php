
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

<?php
include("connect.php");
  $sql_1 = "SELECT * FROM orderlist WHERE rid ='$_REQUEST[update_id]'";
                     @$query = mysqli_query($conn, $sql_1);
                     @$rs = mysqli_fetch_array($query);

  $orderrid = $rs['mid'];

                     @$sql2 = "SELECT * FROM mamber WHERE id = '$orderrid'";
                     @$query2 = mysqli_query($conn,$sql2);
                     @$rs2 = mysqli_fetch_array($query2);

                     $rowdetail = $rs['detail'];
                     $rowdetail = str_replace("-", "<br>", $rowdetail);

?>

<a href="receive1.php"> <input type="button" value="หน้าหลัก" size='40' > </a>
<a href="user_receive2.php?update_id=<?php echo $rs['mid'];?>"> <input type=button value='หน้าของฉัน' size='40'></a>

<form action="user_summary.php" method="post">



<center>
<?php 
ob_start()
?>
<fieldset><legend><b>รายการขาย</b></legend>
<br/>




    <h4>ผู้ขาย : <?php echo $rs2['name'];?></h4>

    <h4>รหัสรายการขาย : <?php echo $_REQUEST['update_id'];?>&nbsp; &nbsp; &nbsp; &nbsp;รหัสลูกค้า : <?php echo $rs['mid'];?></h4>

    <h4>รายละเอียด : <?php echo $rowdetail;?></h4> 

    <?php $foo = $rs['total'];?>
    <h4>ราคารวม : <?php echo number_format((float)$foo, 2, '.', '');?> บาท</h4>

<?php 
$memid = $rs['mid'];
$summonth = 0;
$monthsell = $rs['datesell'];
$month = substr($monthsell, 5,2);
$sql3 = "SELECT total FROM orderlist WHERE mid = '$memid' AND month(datesell)='$month' AND year(datesell)=YEAR(CURRENT_TIMESTAMP)";
@$query = mysqli_query($conn, $sql3);
while($resultarray = mysqli_fetch_array($query)){
  $summonth += $resultarray['total'];
}?>
    <h4>ยอดรวมประจำเดือน <?php echo $month.' : '.number_format((float)$summonth, 2, '.', '');?> บาท</h4>


<?php 
$sumall = 0;
$yearsell = date("Y");
$sql4 = "SELECT total FROM orderlist WHERE mid = '$memid' AND year(datesell)=YEAR(CURRENT_TIMESTAMP)";
@$query4 = mysqli_query($conn, $sql4);
while($resultarray4 = mysqli_fetch_array($query4)){
  $sumall += $resultarray4['total'];
}?>
    <h4>ยอดรวมทั้งหมด <?php echo $yearsell.' : '.number_format((float)$sumall, 2, '.', '');?> บาท</h4>

    <h4>วันที่ขาย : <?php echo $rs['datesell'];?></h4>

<?php 
    $html=ob_get_contents();
    $mpdf->WriteHTML($html);
    $mpdf->Output("sale.pdf");

    echo " เวลา \n";
    $date2 = new DateTime();
    $date2->setTimezone(new DateTimeZone('Asia/Bangkok'));
    echo $date2->format(DateTime::RFC1123) . "\n"; 

    ob_end_flush();
    ?>
    <a href="sale.pdf" class="btn btn-primary">Download (pdf)</a> <br><br>
</body>


