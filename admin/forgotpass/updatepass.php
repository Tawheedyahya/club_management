<?php
session_start();
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    $pass=htmlspecialchars($_POST['n_pass']);
    $a_id=$_SESSION['a_id'];
    $conn=new mysqli("localhost","root","","club_man");
    $sql="UPDATE admin set a_pass=$pass where a_id=$a_id";
    $result=mysqli_query($conn,$sql);
    $conn->close();
    if($result){
        echo "password changed";
    }

    else{
        echo "password not changes error!";
    }
}
else{
    header("location:../login/1_login.html");
    eixt();
}
?>