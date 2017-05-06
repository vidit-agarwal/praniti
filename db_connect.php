<?php
$servername = "localhost";
$username = "root";
$password = "hmr17@tt";
$db = "hmr_db" ;
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
	die("connection failed: " . $conn->connect_error);
}
echo "connected succesfully";
?>