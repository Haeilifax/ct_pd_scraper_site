<html>
<head>
<title>
PHP Test
</title>
</head>
<body>

<form action=<?php echo $_SERVER["PHP_SELF"]?> method="post">
Last Name: <input type="text" name = "last_name">
<input type="submit">
</form>

<?php
/* $servername = "localhost";
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
 */
 
include ('connect.php');
 
$sql = $conn->prepare("SELECT first_name, last_name FROM person where last_name=?");

$sql->bind_param("s", $last_name);
$last_name = $_POST["last_name"];

$sql->execute();

$fname = NULL;
$lname = NULL;

$sql->bind_result($fname, $lname);

echo "<table><tr><th>First Name</th><th>Last Name</th></tr>";
while($sql->fetch()){
    echo "<tr><td>" . $fname . "</td><td>" . $lname . "</td></tr>";
}



$sql->close();
$conn->close();
?>
</body>
</html>
