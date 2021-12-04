<?php
include 'conn.php';
    $field4 = base64_decode($_GET['param']);
$email_exist = "select username from register where contact_email='$field4'";
   $checksum_res = mysqli_query($mysqli,$email_exist);
            $convert_ = mysqli_fetch_assoc($checksum_res);
            $final_result =  implode("",$convert_);

    
    echo $field4;
    echo $final_result;
?>