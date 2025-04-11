<?php
session_start();
if(isset($_SESSION['a_id'])){
    $sr_id=(int)$_GET['sr_id'];
    // echo $sr_id;
    $conn=new mysqli("localhost","root","","club_man");
    $sql="DELETE from form where sr_id='$sr_id'";
    if(mysqli_query($conn,$sql)){
        header("location:request.php");
    }
    
}
?>