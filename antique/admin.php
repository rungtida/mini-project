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
<center>
<body>
<style>

	body {
  		background-image: url('Pic/1.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style> 
<form action="admin.php" method="post">
<div class="container">
  <h2>โปรแกรมรับซื้อขยะ</h2>
  <p>ตารางแสดงรายการออร์เดอร์ประจำเดือน
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
    <button name = "submit" type="submit">Go</button>
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

<?php
$query = "SELECT * FROM orderlist";
$result = mysqli_query($conn, $query);
@$i=1; while ($row = mysqli_fetch_array($result)) {
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
?>

<?php
      if (isset($_POST['submit'])) {

        $monthselect = $_POST['month'];

if($monthselect != "all") {     
     
$sql = "SELECT * FROM orderlist WHERE month(datesell)='$monthselect'";
$run = $conn->query($sql);
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

      $i++; }
    }else{
        $query = "SELECT * FROM orderlist";
        $result = mysqli_query($conn, $query);
        @$i=1; while ($row = mysqli_fetch_array($result)) {
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
    }
?>
</tbody> 
</table>
</div> 
</body>
</html>
