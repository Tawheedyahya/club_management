<?php
session_start();
if( $_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['a_id'])){
    $a_id=$_SESSION['a_id'];
    $file_name=$_FILES['ament']['name'];
    $file_location=$_FILES['ament']['tmp_name'];
    $ament_des=isset($_POST['ament_des'])?$_POST['ament_des']:"";
    if(!is_dir("img")){
        mkdir("img",0777,true);
    }
    if(is_dir("img")){
        if(move_uploaded_file($file_location,"img/".$file_name)){
           $conn=new mysqli("localhost","root","","club_man");
           $sql="INSERT into ament(a_id,ament_img,ament_des)values('$a_id','$file_name','$ament_des')";
           $conn->query($sql);
        }
        else{
            $conn=new mysqli("localhost","root","","club_man");
            $sql="INSERT into ament(a_id,ament_des)values('$a_id','$ament_des')";
            $conn->query($sql);
        }
    }
    header("location:../work/admin.php");
    exit();
}
?>