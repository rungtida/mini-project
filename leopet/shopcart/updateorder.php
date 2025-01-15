<?php
session_start();
$formid = isset($_SESSION['formid']) ? $_SESSION['formid'] : "";
if ($formid != $_POST['formid']) {
	echo "E00001!! SESSION ERROR RETRY AGAINT.";
} else {
	unset($_SESSION['formid']);
	if ($_POST) {
		require 'connect.php';
		$order_fullname = mysqli_real_escape_string($conn,$_POST['order_fullname']);
		$order_address = mysqli_real_escape_string($conn,$_POST['order_address']);
		$order_phone = mysqli_real_escape_string($conn,$_POST['order_phone']);
$meSql = "INSERT INTO orders (order_date, order_fullname, order_address, order_phone) VALUES (NOW(),'{$order_fullname}','{$order_address}','{$order_phone}') ";
$meQeury = mysqli_query($conn,$meSql);
if ($meQeury) {
$order_id = mysqli_insert_id($conn);
for ($i = 0; $i < count($_POST['qty']); $i++) {
$order_detail_quantity = mysqli_real_escape_string($conn,$_POST['qty'][$i]);
$order_detail_price = mysqli_real_escape_string($conn,$_POST['product_price'][$i]);
$product_id = mysqli_real_escape_string($conn,$_POST['product_id'][$i]);
$lineSql = "INSERT INTO order_details (order_detail_quantity, order_detail_price, product_id, order_id) ";
$lineSql .= "VALUES (";
$lineSql .= "'{$order_detail_quantity}',";
$lineSql .= "'{$order_detail_price}',";
$lineSql .= "'{$product_id}',";
$lineSql .= "'{$order_id}'";
$lineSql .= ") ";
mysqli_query($conn,$lineSql);
}

unset($_SESSION['cart']);
unset($_SESSION['qty']);
header('location:index.php?a=order');
}else{

header('location:index.php?a=orderfail');
}
}
}
?>