<?php
include 'conn.php';


if(isset($_GET['username'])){
$field1 = md5($_GET['oldpass']);
$field2 = md5($_GET['newpass']);
$field3 = $_GET['username'];

$sql = "select * from register where password='$field1' and username='$field3'";
$result = mysqli_query($mysqli, $sql);


if(mysqli_num_rows($result) > 0){
    $sql_ = "update register set password='$field2' where username='$field3'";
    $result_ = mysqli_query($mysqli, $sql_);

         echo json_encode(array('status' => 'Success.')); 
    }else{
         echo json_encode(array('status' => 'Incorrect password.')); 
    }
}else{
    echo json_encode(array('status' => 'No supplied query.')); 
}

?>