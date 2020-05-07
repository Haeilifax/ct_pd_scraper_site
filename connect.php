<?php
$servername = $_ENV["servername"];
$username = $_ENV["db_username"];
$password = $_ENV["db_password"];
$dbname = $_ENV["db_name"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully". "<br>";
$conn->set_charset("utf-8");
return $conn;
?>