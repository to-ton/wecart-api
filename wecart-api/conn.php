<?php
$servername = "localhost";
$username = "id17820533_wecart2021";
$password = "EYB#Cb?Q[)88(>U%";
$db = "id17820533_wecart";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $db);
// Check connection
$mysqli->set_charset('utf8mb4');
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
