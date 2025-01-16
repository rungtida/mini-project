<?php include("../connect.php"); ?>
<?php session_start();?>
<?php
if(isset($_POST['login'])){
  
@$user = $_POST['username'];
@$pass = $_POST['password'];
// echo $txtuser;
// echo $txtpass;
$strSQL = "SELECT * FROM member 
WHERE username='$user' 		
and password ='$pass' ";
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
$_SESSION["id"] = $objResult["id"];
$_SESSION["status"] = $objResult["status"];

// session_write_close();
if($_SESSION["status"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

  Header("Location: ../main/admin_index.php");

}

if ($_SESSION["status"]=="user"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

  Header("Location: ../main/user_index.php");

    }
  }
}else{Header("Location: https://www.youtube.com/"); //user & password incorrect back to login again
}



?>