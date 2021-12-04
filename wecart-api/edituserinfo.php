<?php
include 'conn.php';
    
    $field1 =  $_GET['name'];
    $field2 = $_GET['username'];
    $field4 = $_GET['brgy'];
    $field5 = $_GET['sitio'];
    $field6 = $_GET['street'];
    $field7 = $_GET['contact_num'];
    $field8 = $_GET['contact_email'];
    $field9 = $_GET['store_name'];
    $field01 = $_GET['store_type'];
    
$sql_ = "select * from register where username='$field2'";
$result = mysqli_query($mysqli, $sql_);
    
if(mysqli_num_rows($result) > 0){
    if(isset($_GET["seller"])){
            $sql__ = "update register set full_name='$field1', brgy='$field4', sitio='$field5', street='$field6', contact_num='$field7', contact_email='$field8', store_name='$field9', store_type='$field01' where username='$field2'";
            
             $mysqli->query($sql__);
            echo json_encode(array('status' => 'Update successful.'));
            
    }elseif(isset($_GET["buyer"])){
        $sql__ = "update register set full_name='$field1', brgy='$field4', sitio='$field5', street='$field6', contact_num='$field7', contact_email='$field8', store_name='null', store_type='null' where username='$field2'";
            
             $mysqli->query($sql__);
            echo json_encode(array('status' => 'Update successful.'));
            
    }elseif(isset($_GET["agent"])){
        $sql__ = "update register set full_name='$field1', brgy='$field4', sitio='$field5', street='$field6', contact_num='$field7', contact_email='$field8', store_name='null', store_type='null' where username='$field2'";
            
             $mysqli->query($sql__);
            echo json_encode(array('status' => 'Update successful.'));
            
    }else{
        echo json_encode(array('status' => 'User not found.'));
    }
}else{
    echo json_encode(array('status' => 'User not found.'));
}

$mysqli->query($sql__);
?>