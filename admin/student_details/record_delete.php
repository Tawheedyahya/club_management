<?php
session_start();
if(isset($_SESSION['a_id']) && isset($_GET['s_id'])){
$s_id=(int)$_GET['s_id'];
$a_id = $_SESSION['a_id'];
$conn=new mysqli('localhost',"root","","club_man");
$sql="DELETE FROM attend WHERE a_id=$a_id and s_id=$s_id" ;
if(mysqli_query($conn,$sql)){
$sql2="DELETE FROM student WHERE a_id=$a_id and s_id=$s_id";
mysqli_query($conn,$sql2);
header("location:details.php");
exit();}}
else{
    header("location:../login/1_login.html");
    exit();
}
?>