<?php
include('connect.php');
if(isset($_GET['update_id'])){
echo "<script type='text/javascript'>"; 
echo "alert('ปรับปรุงข้อมูลเรียบร้อย !!');"; 
echo "window.location = 'receive.php'; "; 
echo "</script>";
}

$query = "SELECT * FROM member"; 
$result = mysqli_query($con, $query); 

$sql = "UPDATE member 
            SET member = '".$_POST['member']."',
            number = '".$_POST['number']."',
            WHERE id = '".$_POST['id']."' ";
$result = mysqli_query($con, $sql);
 
mysqli_close($con);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'receive.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
        echo "window.location = 'update_m.php'; ";
	echo "</script>";
}
?>