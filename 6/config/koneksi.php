<?php
$conn = new mysqli("localhost","root","","arkademy");
if($conn->connect_errno){
  echo "connect error";
  exit();
}
?>
