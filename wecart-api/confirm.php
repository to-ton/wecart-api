<?php
include 'conn.php';

if(isset($_GET["email"])){
$email = $_GET["email"];
$sql = "select isverify from register where contact_email='$email'";
$query = mysqli_query($mysqli, $sql);

while($row = mysqli_fetch_assoc($query)){
    echo $row['isverify'];
}
}
?>