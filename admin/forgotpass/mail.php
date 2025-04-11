<?php
function email($a_email){
    $to=$a_email;
    $subject="change pass";
    $headers="From: kllrkomali@gmail.com";
    $body=rand(1000,9999);
    if(mail($to,$subject,$body,$headers)){
    // if($body){
       $otp=$body;
    }
    else{
        $otp='false';
    }
    return $otp;}
?>
<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $a_email=$_POST['a_email'];
    $conn=new mysqli("localhost","root","","club_man");
    $sql="SELECT * from admin";
    $result=mysqli_query($conn,$sql);
    $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $found=false;
    foreach($data as $value){
    if($value['a_email']==$a_email){
        $found=true;
        $_SESSION['a_id']=$value['a_id'];
        $exp_a_email=time()+100;
         $_SESSION['otp']=email($a_email);
         if($_SESSION['otp']!='false'){
         $a=[];
         $a['otp']=$_SESSION['otp'];
         $a['exp_a_email']=$exp_a_email;
         $a['a_id']=$value['a_id'];
         $a['a_name']=$value['a_name'];
         echo json_encode($a);
         unset($_SESSION['otp']);
        break;}
    }
 
}
if(!$found){
    echo 'false';
}
}
else{
    header("location:../login/1_login.html");
}

?>