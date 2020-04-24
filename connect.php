<?php
$servername = "localhost";
$username = "david";
$password = "Aqua4Bowl";
$dbname = "pdscrape";

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