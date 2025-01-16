<?php include("connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการออร์เดอร์</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
        <style> body{font-family: 'Sarabun', sans-serif;}</style>

</head>
<a href="receive1.php"> <input type="button" value="หน้าหลัก" size='40' > </a>
<a href="admin_searchmamber.php"> <input type=button value='ตารางลูกค้า' size='40'></a>
<body>
<style>

	body {
  		background-image: url('Pic/1.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style> 
<form action="admin_orderlist.php?update_id=<?php echo $_GET['update_id'];?>" method="post">

<center>
<div class="container">
  <h2>โปรแกรมรับซื้อขยะ</h2>
  <p>ตารางแสดงรายการออร์เดอร์ ประจำเดือน
  <select name="month">
                    <option value="all">ทั้งหมด</option>
                    <option value="1">มกราคม</option>
                    <option value="2">กุมภาพันธ์</option>
                    <option value="3">มีนาคม</option>
                    <option value="4">เมษายน</option>
                    <option value="5">พฤษภาคม</option>
                    <option value="6">มิถุนายน</option>
                    <option value="7">กรกฎาคม</option>
                    <option value="8">สิงหาคม</option>
                    <option value="9">กันยายน</option>
                    <option value="10">ตุลาคม</option>
                    <option value="11">พฤศจิกายน</option>
                    <option value="12">ธันวาคม</option>
    </select>
    <button name = "submit" type="submit">Go</button></p>
  
  <table border>
<thead>
    <tr>
                    <th>ลำดับ</th>
                    <th>รหัสออเดอร์</th>
                    <th>รหัสลูกค้า</th>
                    <th>รายละเอียด</th>
                    <th>ราคารวม</th>
                    <th>วันที่ขาย</th>
                    <th>เวลาที่ขาย</th>
                    <th>ใบสรุปการขาย</th>
    </tr>
    </form>
</thead>
<tbody>

<input type="hidden" value="<?php echo $_GET['update_id'];?>" name = "memberid" >

<?php

if (isset($_POST['submit'])) {

  $monthselect = $_POST['month'];
  $memid = $_GET['update_id'];

if($monthselect != "all") {    
  $sql = "SELECT * FROM orderlist WHERE mid='".$memid."' AND month(datesell)='$monthselect'";
  $sql .= " order by rid desc";
  $run = $conn->query($sql);



//if($run->num_rows > 0){
$i = 1; while($row = $run->fetch_assoc()){
  $foo = $row['total'];  

?>

<tr>

                <td><?php echo $i; ?></td>
                <td><?php echo $row['rid']; ?></td>
                <td><?php echo $row['mid']; ?></td>
                <td><?php echo $row['detail']; ?></td>
                <td><?php echo number_format((float)$foo, 2, '.', '');?> บาท</td>
                <td><?php echo $row['datesell']; ?></td>
                <td><?php echo $row['datetimesell']; ?></td>
                <td><a href="summary.php?update_id=<?php echo $row["rid"];?>">สรุปการขาย</a></td>
   </tr>


   
<?php

      $i++; } ?>




<?php
    }else{
      $sql = "SELECT * FROM orderlist WHERE mid='".$memid."' AND year(datesell)=YEAR(CURRENT_TIMESTAMP)";
      $sql .= " order by rid desc";
      $run = $conn->query($sql);
      @$i=1; while ($row = mysqli_fetch_array($run)) {
        $foo = $row['total'];

?>
<tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row['rid']; ?></td>
              <td><?php echo $row['mid']; ?></td>
              <td><?php echo $row['detail']; ?></td>
              <td><?php echo number_format((float)$foo, 2, '.', '');?> บาท</td>
              <td><?php echo $row['datesell']; ?></td>
              <td><?php echo $row['datetimesell']; ?></td>
              <td><a href="summary.php?update_id=<?php echo $row["rid"];?>">สรุปการขาย</a></td>
</tr>
<?php $i++;
          }
      }
  
?>



</tbody> 
</table>





<?php 
$summonth = 0;
$monthsell = $monthselect;

$sql3 = "SELECT * FROM orderlist WHERE mid = '$memid' AND month(datesell)='$monthsell' AND year(datesell)=YEAR(CURRENT_TIMESTAMP)";
@$query3 = mysqli_query($conn, $sql3);
while($resultarray = mysqli_fetch_array($query3)){
$summonth += $resultarray['total'];

} ?>
    <h4>ยอดรวมประจำเดือน <?php echo $monthsell.' : '.number_format((float)$summonth, 2, '.', '');?> บาท</h4>


<?php 
$sumall = 0;
$yearsell = date("Y");
$sql4 = "SELECT total FROM orderlist WHERE mid = '$memid' AND year(datesell)=YEAR(CURRENT_TIMESTAMP)";
@$query4 = mysqli_query($conn, $sql4);
while($resultarray4 = mysqli_fetch_array($query4)){
  $sumall += $resultarray4['total'];
}

?>
    <h4>ยอดรวมทั้งหมด <?php echo number_format((float)$sumall, 2, '.', '');?> บาท</h4>

<?php } ?>

</div> 
</body>
</html>
