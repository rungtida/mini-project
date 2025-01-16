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
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
    <style>

body {
      background-image: url('Pic/2.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}
</style> 
    <title>รายงานการปันผลประจำปี</title>
    
</head>

<?php
include("connect.php");


$mid = $_REQUEST['update_id'];

@$sql_2 = "SELECT * FROM mamber WHERE id = '$mid'";
@$query_2 = mysqli_query($conn, $sql_2);
@$rs_2 = mysqli_fetch_array($query_2);

$sql_1 = "SELECT * FROM orderlist WHERE mid ='$_REQUEST[update_id]'";
@$query_1 = mysqli_query($conn, $sql_1);
@$rs_1 = mysqli_fetch_array($query_1);

?>

<a href="receive1.php"> <input type="button" value="หน้าหลัก" size='40'> </a>
<a href="admin_searchmamber.php"> <input type=button value='ค้นหาข้อมูลลูกค้า' size='40'></a>

<form action="admin_dividend.php?update_id=<?php echo $_REQUEST['update_id']; ?>" method="post">



    <center>
        <?php
        ob_start()
        ?>
        <fieldset>
            <legend><b>รายงานการปันผลประจำปี</b></legend>
            <br /><b>เลือกปี</b>
            <select name="year">
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
          </select>
          <button name="submit" type="submit">Go</button>
            <h4><u>ผู้ขาย <?php echo $rs_2['name']; ?> จะได้รับเงินปันผลดังนี้</u></h4>
            <?php
      if (isset($_POST['submit'])) {
        $yearselect = $_POST['year'];
        $yearsumbefore = $yearselect -1 ;
      }
?>

            <?php

error_reporting(0);
ini_set('display_errors', 0);

            $sql1 = "SELECT total FROM orderlist WHERE mid = '$mid' AND year(datesell) = '$yearsumbefore'";
            @$query1 = mysqli_query($conn, $sql1);
            while ($resultarray1 = mysqli_fetch_array($query1)) {
                @$sum1 += $resultarray1['total'];
            }

            $sql2 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='2' AND year(datesell)='$yearselect'";
            @$query2 = mysqli_query($conn, $sql2);
            while ($resultarray2 = mysqli_fetch_array($query2)) {
                @$sum2 += $resultarray2['total'];
            }

            $sql3 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='3' AND year(datesell)='$yearselect'";
            @$query3 = mysqli_query($conn, $sql3);
            while ($resultarray3 = mysqli_fetch_array($query3)) {
                @$sum3 += $resultarray3['total'];
            }

            $sql4 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='4' AND year(datesell)='$yearselect'";
            @$query4 = mysqli_query($conn, $sql4);
            while ($resultarray4 = mysqli_fetch_array($query4)) {
                @$sum4 += $resultarray4['total'];
            }

            $sql5 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='5' AND year(datesell)='$yearselect'";
            @$query5 = mysqli_query($conn, $sql5);
            while ($resultarray5 = mysqli_fetch_array($query5)) {
                @$sum5 += $resultarray5['total'];
            }

            $sql6 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='6' AND year(datesell)='$yearselect'";
            @$query6 = mysqli_query($conn, $sql6);
            while ($resultarray6 = mysqli_fetch_array($query6)) {
                @$sum6 += $resultarray6['total'];
            }

            $sql7 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='7' AND year(datesell)='$yearselect'";
            @$query7 = mysqli_query($conn, $sql7);
            while ($resultarray7 = mysqli_fetch_array($query7)) {
                @$sum7 += $resultarray7['total'];
            }

            $sql8 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='8' AND year(datesell)='$yearselect'";
            @$query8 = mysqli_query($conn, $sql8);
            while ($resultarray8 = mysqli_fetch_array($query8)) {
                @$sum8 += $resultarray8['total'];
            }

            $sql9 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='9' AND year(datesell)='$yearselect'";
            @$query9 = mysqli_query($conn, $sql9);
            while ($resultarray9 = mysqli_fetch_array($query9)) {
                @$sum9 += $resultarray9['total'];
            }

            $sql10 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='10' AND year(datesell)='$yearselect'";
            @$query10 = mysqli_query($conn, $sql10);
            while ($resultarray10 = mysqli_fetch_array($query10)) {
                @$sum10 += $resultarray10['total'];
            }

            $sql11 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='11' AND year(datesell)='$yearselect'";
            @$query11 = mysqli_query($conn, $sql11);
            while ($resultarray11 = mysqli_fetch_array($query11)) {
                @$sum11 += $resultarray11['total'];
            }

            $sql12 = "SELECT total FROM orderlist WHERE mid = '$mid' AND month(datesell)='12' AND year(datesell)='$yearselect'";
            @$query12 = mysqli_query($conn, $sql12);
            while ($resultarray12 = mysqli_fetch_array($query12)) {
                @$sum12 += $resultarray12['total'];
            }

            ?>

            <?php
            
            $dsum1 = $sum1 * (12/12) * (5/100);
            $dsum2 = $sum2 * (11/12) * (5/100);
            $dsum3 = $sum3 * (10/12) * (5/100);
            $dsum4 = $sum4 * (9/12) * (5/100);

            $dsum5 = $sum5 * (8/12) * (5/100);
            $dsum6 = $sum6 * (7/12) * (5/100);
            $dsum7 = $sum7 * (6/12) * (5/100);
            $dsum8 = $sum8 * (5/12) * (5/100);

            $dsum9 = $sum9 * (4/12) * (5/100);
            $dsum10 = $sum10 * (3/12) * (5/100);
            $dsum11 = $sum11 * (2/12) * (5/100);
            $dsum12 = $sum12 * (1/12) * (5/100);

            $tsum = $dsum1 + $dsum2 + $dsum3 + $dsum4 + $dsum5 + $dsum6 + $dsum7 + $dsum8 + $dsum9 + $dsum10 + $dsum11 + $dsum12;

            ?>

            <h4>ปันผล 1 = <?php echo number_format((float)$dsum1, 2, '.', ''); ?> บาท</h4>
            <h4>ปันผล 2 = <?php echo number_format((float)$dsum2, 2, '.', ''); ?> บาท</h4>
            <h4>ปันผล 3 = <?php echo number_format((float)$dsum3, 2, '.', ''); ?> บาท</h4>
            <h4>ปันผล 4 = <?php echo number_format((float)$dsum4, 2, '.', ''); ?> บาท</h4>

            <h4>ปันผล 5 = <?php echo number_format((float)$dsum5, 2, '.', ''); ?> บาท</h4>
            <h4>ปันผล 6 = <?php echo number_format((float)$dsum6, 2, '.', ''); ?> บาท</h4>
            <h4>ปันผล 7 = <?php echo number_format((float)$dsum7, 2, '.', ''); ?> บาท</h4>
            <h4>ปันผล 8 = <?php echo number_format((float)$dsum8, 2, '.', ''); ?> บาท</h4>

            <h4>ปันผล 9 = <?php echo number_format((float)$dsum9, 2, '.', ''); ?> บาท</h4>
            <h4>ปันผล 10 = <?php echo number_format((float)$dsum10, 2, '.', ''); ?> บาท</h4>
            <h4>ปันผล 11 = <?php echo number_format((float)$dsum11, 2, '.', ''); ?> บาท</h4>
            <h4>ปันผล 12 = <?php echo number_format((float)$dsum12, 2, '.', ''); ?> บาท</h4>

            <h4>รวมเงินปันผลทั้งสิ้น = <?php echo number_format((float)$tsum, 2, '.', ''); ?> บาท</h4>




            <?php
            $html = ob_get_contents();
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