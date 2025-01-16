<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสิ้นค้ารับซื้อ</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
 <style> body{font-family: 'Sarabun', sans-serif;} </style>
</head>
<center>
<body>
<div class="container">
  <h2>รับซื้อของเก่า </h2>
  <table class="table">
    <thead>
<form name= product.php action="orderlist.php" method="post">
<table style="width:47%">
  <tr>
    <th>สินค้า</th>
    <th>ราคาสินค้า</th>
    <th>จำนวน</th>
  </tr>

  <tr>
    <td>ขวดเบียร์ช้าง</td>
    <td>12.50 บาท/กล่อง</td>
    <td> <input type="text" name="a1"></td>
  </tr>

  <tr>
    <td>ขวดเบียร์ลีโอ</td>
    <td>9.50 บาท/กล่อง</td>
    <td> <input type="text"  name = "a2" ></td>
  </tr>

  <tr>
    <td>ขวดน้ำขาวขุ่น</td>
    <td>5.00บาท/กิโลกรัม</td>
    <td> <input type="text"  name = "a3"></td>
  </tr>

  <tr>
    <td>ขวดน้ำใส</td>
    <td>3.00บาท/กิโลกรัม</td>
    <td> <input type="text" name = "a4"></td>
  </tr>

  <tr>
    <td>อลูมิเนียมกระป๋องโค้ก</td>
    <td>24.00บาท/กิโลกรัม</td>
    <td> <input type="text"  name = "a5"></td>
  </tr>

  <tr>
    <td>กระดาษหนังสือพิมพ์</td>
    <td>1.50บาท/กิโลกรัม</td>
    <td> <input type="text" name = "a6" ></td>
  </tr>

  <tr>
    <td>กระดาษหนังสือเล่มรวม</td>
    <td>1.10บาท/กิโลกรัม</td>
    <td> <input type="text" name = "a7" ></td>
  </tr>

  <tr>
    <td>กระดาษสี/กระดาษกล่อง รองเท้า/กล่องผลไม้</td>
    <td>0.90บาท/กิโลกรัม</td>
    <td><input type="text" name = "a8"></td>
  </tr>

<?php include("connect.php");
 $sql_1 = "SELECT * FROM mamber WHERE id ='$_REQUEST[update_id]'";
                    @$query = mysqli_query($conn, $sql_1);
                    @$rs = mysqli_fetch_array($query);

                    
                    ?>

<input type="hidden" value="<?php echo $_REQUEST['update_id'];?>" name = "id" >
<input type="hidden" value="<?php echo $rs['name'];?>" name = "name" >

</table>
 <td><input type="submit" id="submit" name = "save"value="คิดราคา"/></a></td>

 <a href="receive.php"><input type="button" name="back" value="ถอยกลับ"> </a>
</tbody>
</table>
</div>
</form>
</body>
</html>
</body>
</center>
</html>
