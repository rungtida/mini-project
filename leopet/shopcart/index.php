<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require 'connect.php';
$strSQL = "SELECT * FROM products";
$query = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($query);

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$meQty = 0;
if(is_array($_SESSION['qty']) && count($_SESSION['qty'])>0 ){
    foreach($_SESSION['qty'] as $meItem){
        $meQty += intval($meItem);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leopet shopping cart</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/nava.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <div class="container">

        <!-- Static navbar -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../user_index.php">Leopet Shop</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">หน้าแรกสินค้า</a></li>
                        <li><a href="cart.php">ตะกร้าสินค้าของฉัน <span class="badge"><?php echo $meQty; ?></span></a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </div>

        <!-- Main component for a primary marketing message or call to action -->

        <h3>หน้าแรกของสินค้า</h3>
        <?php
        if ($action == 'exists') {
            echo "<div class=\"alert alert-warning\">เพิ่มจำนวนสินค้าแล้ว</div>";
        }
        if ($action == 'add') {
            echo "<div class=\"alert alert-success\">เพิ่มสินค้าลงในตะกร้าเรียบร้อยแล้ว</div>";
        }
        if ($action == 'order') {
            echo "<div class=\"alert alert-success\">สั่งซื้อสินค้าเรียบร้อยแล้ว</div>";
        }
        if ($action == 'orderfail') {
            echo "<div class=\"alert alert-warning\">สั่งซื้อสินค้าไม่สำเร็จ มีข้อผิดพลาดเกิดขึ้นกรุณาลองใหม่อีกครั้ง</div>";
        }
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>รายละเอียด</th>
                    <th>ราคา</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>


                <?php $sql1 = "SELECT * FROM products ORDER BY id ASC"; //คำสั่ง sql ที่เรียกมาเพื่อใช้ใน option ข้างล่าง

                $query_unit = mysqli_query($conn, $sql1); //คำสั่งเรียกใช้ sql ต้องใส่ 2 parameter ("$conn = DBที่เรียกมาเชื่อมต่อ" , "$sql1 = คำสั่งที่เรียกใช้บรรทัดที่ 144")
                while ($result = mysqli_fetch_array($query_unit)) { //คำสั่งวนเพื่อเรียกค่า
                    ?>
                    <tr>
                        <td align="center"><img src="..\<?php echo $result['product_img_name']; ?>" style=width:200px;></td>
                        <td><?php echo $result['product_code']; ?></td>
                        <td><?php echo $result['product_name']; ?></td>
                        <td><?php echo $result['product_desc']; ?></td>
                        <td><?php echo number_format($result['product_price'], 2); ?></td>
                        <td>
                            <a class="btn btn-primary btn-lg" href="updatecart.php?itemId=<?php echo $result['id']; ?>" role="button">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                หยิบใส่ตะกร้า</a>
                        </td>
                    </tr>
                <?php } ?>


                
            </tbody>
        </table>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>