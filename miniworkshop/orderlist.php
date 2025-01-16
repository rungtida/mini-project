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
<center>
<body>
<form action="orderlist.php" method="post">
<div class="container">
  <h2>รับซื้อของเก่า</h2>
  <p>ตารางแสดงรายการออร์เดอร์</p>

  <table border>
<thead>
    <tr>
                    <th>ลำดับ</th>
                    <th>รหัสออเดอร์</th>
                    <th>รหัสลูกค้า</th>
                    <th>รายละเอียด</th>
                    <th>ราคารวม</th>
                    <th>วันที่ขาย</th>
                    <th>ใบสรุปการขาย</th>
    </tr>
    </form>
</thead>
<tbody>

<?php


$sql = "SELECT * FROM orderlist";
if (isset($_GET['update_id'])) {
   $id = $_GET['update_id']; 
   $sql .= " WHERE mid='".$id."'";
}
$sql .= " order by rid desc";
$run = $conn->query($sql);
if($run->num_rows > 0){
$i = 1;
while($row = $run->fetch_assoc()){


?>
<tr>

                <td><?php echo $i; ?></td>
                <td><?php echo $row['rid']; ?></td>
                <td><?php echo $row['mid']; ?></td>
                <td><?php echo $row['detail']; ?></td>
                <td><?php echo $row['total']; ?> บาท</td>
                <td><?php echo $row['datesell']; ?></td>
                <td><a href="summary.php?update_id=<?php echo $row["rid"];?>">สรุปการขาย</a></td>
   </tr>
<?php

      $i++; }
}
?>
</tbody> 
</table>
</div> 
</body>
</html>
