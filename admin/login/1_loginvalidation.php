<?php
session_start();
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
  
  $conn = new mysqli("localhost", "root", "", "club_man");
  if ($conn->connect_error) {
      die("server error");
  }
  
  $a_email = htmlspecialchars($_POST['a_email']);
  $a_pass =htmlspecialchars($_POST['a_pass']);
  
  // Use prepared statements to prevent SQL injection
  $stmt = $conn->prepare("SELECT * FROM admin WHERE a_email = ?");
  $stmt->bind_param("s", $a_email);
  $stmt->execute();
  $result = $stmt->get_result();
  $data = $result->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $conn->close();
  
  $found = false;
  foreach ($data as $key => $value) {
      if ($value['a_email'] == $a_email && $value['a_pass'] == $a_pass) {
          $_SESSION['a_name']=$value['a_name'];
          $_SESSION['a_id']=$value['a_id'];
          $_SESSION['a_email'] = $a_email;
          $_SESSION['a_pass'] = $a_pass;
          echo "true";
          $found = true;
      }
  }
  
  if (!$found) {
      echo "false";  
  }
  
  
}
else{
    echo "access denied";
}
?>