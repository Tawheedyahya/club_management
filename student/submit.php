<?php
$reg=isset($_POST['s_regno'])?trim($_POST['s_regno']):'';
if($_SERVER['REQUEST_METHOD']=="POST" && $reg!=''){
    $a_id=$_POST['a_id'];
    $s_name=isset($_POST['s_name'])?$_POST['s_name']:'';
    $s_regno=isset($_POST['s_regno'])?strtoupper($_POST['s_regno']):'';
    $dob=isset($_POST['dob'])?$_POST['dob']:null;
    $s_place=isset($_POST['s_place'])?$_POST['s_place']:'';
    $s_dept=isset($_POST['s_dept'])?$_POST['s_dept']
    :'';
    $s_phoneno=isset($_POST['s_phoneno'])?$_POST['s_phoneno']:'';
    try{
     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn=new mysqli("localhost","root","","club_man");
    $sql=$conn->prepare("INSERT into form(a_id, s_name, s_regno, dob, s_place, s_dept, s_phoneno) values (?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("issssss", $a_id, $s_name, $s_regno, $dob, $s_place, $s_dept, $s_phoneno);
    $sql->execute();
    echo "yes";
    $sql->close();
    $conn->close();
}
catch(Exception $e){
    echo "dub";
}

}
else{
    echo "false";
}
?>