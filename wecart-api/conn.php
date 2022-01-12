<?php
$servername = "";
$username = "";
$password = "";
$db = "";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $db);
// Check connection
$mysqli->set_charset('utf8mb4');
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
