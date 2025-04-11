<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $a_id=$_SESSION['a_id'];
    $s_id=(int)$_POST['s_id'];
    $time=$_POST['att_time'];
    $p="present";
    $conn=new mysqli("localhost","root","","club_man") ;
    $sql="SELECT * from attend where att_time='$time' and s_id='$s_id' and a_id='$a_id'";
    $result=mysqli_query($conn,$sql);
    $row=$result->fetch_all(MYSQLI_ASSOC);
    foreach($row as $key=>$value){
        // var_dump($value['att_status']);
        if ($value['att_status'] == $p) {
            // Corrected UPDATE Query
            $sql1 = "UPDATE attend SET att_status='absent' WHERE a_id='$a_id' AND s_id='$s_id' AND att_time='$time'";
            mysqli_query($conn,$sql1);
        }
        else{
            $sql1 = "UPDATE attend SET att_status='present' WHERE a_id='$a_id' AND s_id='$s_id' AND att_time='$time'";
            mysqli_query($conn,$sql1);
        }
       
    }

}
?>