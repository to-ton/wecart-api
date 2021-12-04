<?php
include 'conn.php';


if(isset($_GET['username'])){
$field1 = $_GET['username'];

$sql_ = "select * from register where username='$field1'";
$result = mysqli_query($mysqli, $sql_);


if(mysqli_num_rows($result) > 0){
        $sql__= "update register set isactive='no' where username='$field1'";
        mysqli_query($mysqli, $sql__);
    echo json_encode(array('status' => 'Successfully logged out.')); 
        $i=0;}else{
            echo json_encode(array('status' => 'User does not exist.')); 
        }
   
}else{
       echo json_encode(array('status' => 'No supplied query.')); 
}

?>