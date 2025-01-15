<?php

$host = "localhost"; //ชื่อ host
$username = "root"; //ชื่อ user ที่ใช้ในการ login
$password = ""; //ชื่อ password ที่ใช้ในการ login
$dbname = "leopet"; //ชื่อ database

$conn = mysqli_connect($host, $username, $password, $dbname) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้");
mysqli_query($conn, 'set names utf8'); //กำหนด charset ให้ฐานข้อมูล เพื่ออ่านภาษาไทยได้



    ?>

