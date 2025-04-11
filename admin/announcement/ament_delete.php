<?php
if(isset($_GET['ament_id'])){
    $ament_id=$_GET['ament_id'];
    $conn=new mysqli("localhost","root","","club_man");
    $sql="DELETE from ament where ament_id=$ament_id";
    $conn->query($sql);
    $conn->close();
    header("location:ament_view.php");
    exit();
}
?>