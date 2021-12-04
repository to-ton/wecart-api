<?php
include 'conn.php';

if(isset($_GET['away_on'])){
$field1 = $_GET['away_on'];

$sql_ = "select * from register where username='$field1'";
$result = mysqli_query($mysqli, $sql_);

if(mysqli_num_rows($result) > 0){
        $sql__= "update register set isaway='yes' where username='$field1'";
        mysqli_query($mysqli, $sql__);
    echo json_encode(array('status' => 'Success.')); 
        $i=0;}else{
            echo json_encode(array('status' => 'User does not exist.')); 
        }
   
}elseif(isset($_GET['away_off'])){
$field1 = $_GET['away_off'];

$sql_ = "select * from register where username='$field1'";
$result = mysqli_query($mysqli, $sql_);

if(mysqli_num_rows($result) > 0){
        $sql__= "update register set isaway='no' where username='$field1'";
        mysqli_query($mysqli, $sql__);
    echo json_encode(array('status' => 'Success.')); 
        $i=0;}else{
            echo json_encode(array('status' => 'User does not exist.')); 
        }
   
}
elseif(isset($_GET["active_list"])){
    $sql = "select * from register where isaway='no' and acc_type='agent'";
    $result = mysqli_query($mysqli, $sql);

    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['user_profile_image'] = $row['user_profile_image'];
            $response[$i]['acc_type'] = $row['acc_type'];
            $response[$i]['full_name'] = $row['full_name'];
            $response[$i]['username'] = $row['username'];
            $response[$i]['password'] = $row['password'];
            $response[$i]['brgy'] = $row['brgy'];
            $response[$i]['sitio'] = $row['sitio'];
            $response[$i]['street'] = $row['street'];
            $response[$i]['contact_num'] = $row['contact_num'];
            $response[$i]['contact_email'] = $row['contact_email'];
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
            echo json_encode(array('status' => 'No available agents.')); 
        }
    }
    }else{
       echo json_encode(array('status' => 'No supplied query.')); 
}
?>