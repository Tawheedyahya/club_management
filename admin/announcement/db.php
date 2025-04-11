<?php
$conn=new mysqli("localhost","root","","club_man");
$sql="CREATE table ament(
a_id int,
ament_id int primary key not null AUTO_INCREMENT,
ament_img varchar(270)
)";
mysqli_query($conn,$sql);
?>