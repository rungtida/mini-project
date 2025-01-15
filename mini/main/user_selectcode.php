<?php
  
    include("../connect.php");
    session_start();
   
        $select_pid = $_REQUEST['select_pid'];
        

        $query = "SELECT * FROM usepoint WHERE pid = '$select_pid'";  
        @$run = mysqli_query($conn, $query);
        @$row = mysqli_fetch_array($run);                                                

        $code = "-";
        $pname = $row['pname'];
        $pointin = "0";
        $pointout = $row['ppoint'];
    
       



        @$sql2 = "SELECT MAX(hid) AS hid FROM history";
    @$query1 = mysqli_query($conn,$sql2);
    @$rs = mysqli_fetch_array($query1);
    if($rs['hid'] !=""){
        $sub = substr($rs['hid'],-3)+1;      
        $hid = sprintf('H%03d', $sub);
    }else{
        $hid = "H001";
	}

   

    $memid = $_SESSION["id"];

    $query = "SELECT SUM(pointout) AS pointout_sum FROM history WHERE id = '$memid'";  
            @$run = mysqli_query($conn, $query);
            @$row = mysqli_fetch_array($run); 
            $pointoutsum = $row['pointout_sum'];  
              
    $result2 = mysqli_query($conn, "SELECT SUM(pointin) AS pointin_sum FROM history WHERE id = '$memid'"); 
    $row2 = mysqli_fetch_assoc($result2); 
    $pointinsum = $row2['pointin_sum'];
    
    $total = $pointinsum - $pointoutsum;
    
    //echo "<h3 align = right>";
    //echo "Your Point : ", $total.' P';
    //echo "</h3>";

    

    if($total > $pointout){
        
        @$sql1 = "INSERT INTO history(hid,id,code,pointin,pname,pointout) 
    VALUES('$hid','$memid','$code','$pointin','$pname','$pointout')";

echo "<script>alert(\" แลกโค้ดสำเร็จ ใช้ $pointout Point\");window.location='user_usecode.php';</script>";
            echo "</font></center><br>";
            mysqli_query($conn, $sql1);
            mysqli_close($conn);
      

           
       
         
          
    }
    else{
        $a = $pointout - $total; 
        echo "<script>alert(\" แลกโค้ดไม่สำเร็จ คุณขาด $a Point\");window.location='user_usecode.php';</script>";
    }


    

?>