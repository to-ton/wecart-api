<?php
include 'conn.php';


if(isset($_GET['username'])){
$field1 = $_GET['username'];
$field2 = md5($_GET['password']);

$sql = "select acc_type from register where username='$field1' and password='$field2'";
$result = mysqli_query($mysqli, $sql);
if(mysqli_num_rows($result) > 0){
$sql2 = "select isverify from register where username='$field1' and password='$field2'";
$result2 = mysqli_query($mysqli, $sql2);
$convert_ = mysqli_fetch_assoc($result2);
$final_result =  implode("",$convert_);
if($final_result == "yes"){

    $sql_ = "update register set isactive='yes' where username='$field1'";
    $slq2 = "Update Orders set agent='$field1' where agent='null'";
    $mysqli->query($sql_);
    $mysqli->query($slq2);
    
        if($result){
            header("Content-Type: JSON");
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
                $rows[] = $r;
            }
            if(mysqli_num_rows($result) > 0){
                echo json_encode($rows, JSON_PRETTY_PRINT);
            }else{
                    echo json_encode(array('status' => 'Account not found.')); 
            }
        }
    }else{
        echo json_encode(array('status' => 'not verified')); 
    }
}else{
        echo json_encode(array('status' => 'User does not exist.')); 
}
}else{
        echo json_encode(array('status' => 'No supplied query.')); 
}

?>