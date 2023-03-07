<?php
$mysqli = new mysqli("localhost","root","","webshoe-mysqli");

// Check connection
if ($mysqli->connect_error) {
  echo "Kết nối MYSQLI lỗi" . $mysqli->connect_error;
  exit();
}
?>