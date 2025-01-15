<?php
if(isset($_POST['login'])){
  include("conn/connectdb.php");
  session_start();
@$user = $_POST['username'];
@$pass = $_POST['pass'];
// echo $txtuser;
// echo $txtpass;
$strSQL = "SELECT * FROM member 
WHERE username='$user' 		
and pass='$pass' ";
$query = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($query);
if(!$objResult)
{
  echo "<script>";
  echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
  echo "window.history.back()";
echo "</script>";
}
  else
{
$_SESSION["username"] = $objResult["username"];
$_SESSION["memstatus"] = $objResult["memstatus"];

// session_write_close();
if($_SESSION["memstatus"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

  Header("Location: admin_index.php");

}

if ($_SESSION["memstatus"]=="user"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

  Header("Location: user_index.php");

    }
  }
}else{Header("Location: login.php"); //user & password incorrect back to login again
}



?>