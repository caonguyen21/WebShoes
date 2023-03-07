<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shoesweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Kết nối MySQL thất bại: " . $conn->connect_error);
}
?>