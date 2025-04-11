<?php
session_start();
if(isset($_SESSION['a_id'])){
    $a_id=$_SESSION['a_id'];
    $sr_id=(int)$_GET['sr_id'];
    $conn=new mysqli("localhost","root","","club_man");
    $sql="SELECT * from form where sr_id='$sr_id'";
    $res=mysqli_query($conn,$sql);
    if($res){
    $row=$res->fetch_assoc();
    echo "<pre>";
    // var_dump($row);
    $s_name=$row['s_name'];
    $s_regno=strtoupper(trim($row['s_regno']));
    // $s_regno='22BCS133';
    $dob=$row['dob'];
    $s_place=$row['s_place'];
    $s_dept=$row['s_dept'];
    $s_phoneno=$row['s_phoneno'];
    $sql2="SELECT s_regno from student";
    $result=mysqli_query($conn,$sql2);
    $row1=$result->fetch_all(MYSQLI_ASSOC);
    if(in_array($s_regno, array_column($row1,'s_regno'))){
         echo "<script>
         alert('already the regno is entered');
         window.location.assign('request.php')
         ;</script>";
         $conn->close();
         exit;

    }
    else{
        $sqli=$conn->prepare("INSERT into student(a_id, s_name, s_regno, dob, s_place,s_phoneno, s_dept)values(?, ?, ?, ?, ?, ?, ?)");
        $sqli->bind_param("issssss", $a_id, $s_name, $s_regno, $dob, $s_place, $s_phoneno, $s_dept );
        if($sqli->execute()){
            $sqlfd="DELETE from  form where sr_id='$sr_id'";
            mysqli_query($conn,$sqlfd);
        }
        $sqli->close();
        $conn->close();
        echo "<script>alert('ADDED succesfully')
        window.location.assign('request.php');</script>";
        exit;
    }
}
}
?>