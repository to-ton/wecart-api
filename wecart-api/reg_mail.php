<?php
include 'conn.php';


if(isset($_GET['buyer'])){
$field1 = $_GET['name'];
$field2 = $_GET['username'];
$field3 = md5($_GET['password']);
$field4 = $_GET['brgy'];
$field5 = $_GET['sitio'];
$field6 = $_GET['street'];
$field7 = $_GET['contact_num'];
$field8 = $_GET['contact_email'];

$email_exist = "select * from register where contact_email='$field8'";
$sql_ = "select * from register where username='$field2'";
$check_email = mysqli_query($mysqli, $email_exist);
$result_ = mysqli_query($mysqli, $sql_);

if(mysqli_num_rows($check_email) > 0)
{
            echo json_encode(array('status' => 'email already exist')); 
if(mysqli_num_rows($result_) > 0){
            echo json_encode(array('status' => 'Username already taken.')); 
    }
    }else{
    $randomness = rand(0,999999999);
    $random_string = uniqid().$randomness;
    
    
        $query = "INSERT INTO register (full_name, username, password, brgy, sitio, street, contact_num, contact_email, acc_type, user_profile_image, isactive, id,isverify) VALUES ( '$field1','$field2','$field3','$field4','$field5','$field6','$field7','$field8', 'buyer', 'https:\/\/wecart.gq\/wecart-api\/img\/user_profile\/user_default.png', NULL, '$random_string', 'no')";
        echo "Success.";

        $mysqli->query($query);
        $mysqli->close();
    }


}elseif(isset($_GET['seller'])){
    $field1 = $_GET['name'];
    $field2 = $_GET['username'];
    $field3 = md5($_GET['password']);
    $field4 = $_GET['brgy'];
    $field5 = $_GET['sitio'];
    $field6 = $_GET['street'];
    $field7 = $_GET['contact_num'];
    $field8 = $_GET['contact_email'];
    $field9 = $_GET['store_name'];
    $field01 = $_GET['store_type'];
    $random_string ="";
$sql__ = "select * from register where username='$field2'";
$result__ = mysqli_query($mysqli, $sql__);


if(mysqli_num_rows($result__) > 0){
            echo json_encode(array('status' => 'Username already taken.')); 
    }else{
        $sql___ = "select * from register where store_name='$field9'";
        $result___ = mysqli_query($mysqli, $sql___);
        if(mysqli_num_rows($result___) > 0){
                echo json_encode(array('status' => 'Store name already taken.')); 
        }else{
            $query = "INSERT INTO register (full_name, username, password, brgy, sitio, street, contact_num, contact_email, store_name, acc_type, user_profile_image, store_type, isactive,id,isverify) VALUES ( '$field1','$field2','$field3','$field4','$field5','$field6','$field7','$field8','$field9', 'seller', 'https:\/\/wecart.gq\/wecart-api\/img\/user_profile\/user_default.png', '$field01', NULL,null,'yes')";
                echo json_encode(array('status' => 'Success.')); 

            $mysqli->query($query);
            $mysqli->close();
        }
      }
    }
elseif(isset($_GET['agent'])){
    $field1 = $_GET['name'];
    $field2 = $_GET['username'];
    $field3 = md5($_GET['password']);
    $field4 = $_GET['brgy'];
    $field5 = $_GET['sitio'];
    $field6 = $_GET['street'];
    $field7 = $_GET['contact_num'];
    $field8 = $_GET['contact_email'];
    $random_string ="";
    
$sql___ = "select * from register where username='$field2'";
$result___ = mysqli_query($mysqli, $sql___);


if(mysqli_num_rows($result___) > 0){
            echo json_encode(array('status' => 'Username already taken.')); 
    }else{
         $query = "INSERT INTO register (full_name, username, password, brgy, sitio, street, contact_num, contact_email, acc_type, user_profile_image, isactive,id,isverify) VALUES ( '$field1','$field2','$field3','$field4','$field5','$field6','$field7','$field8', 'agent', 'https:\/\/wecart.gq\/wecart-api\/img\/user_profile\/user_default.png', NULL, null,'yes')";
                echo json_encode(array('status' => 'Success.')); 

            $mysqli->query($query);
            $mysqli->close();
        }

    }else{
    echo json_encode(array('status' => 'No supplied query.')); 
}

?>