<?php
include 'conn.php';


if(isset($_GET["set_to_notverify"])){
    $ver = $_GET["set_to_notverify"];
    
    
    $sql ="update register set isverify='no' where contact_email='$ver'";
    $mysqli->query($sql);
    
    echo $ver." succcessfully set to not verify.";
}elseif(isset($_GET["set_to_verify"])){
    $ver = $_GET["set_to_verify"];
    
    
    $sql ="update register set isverify='yes' where contact_email='$ver'";
    $mysqli->query($sql);
    
    echo $ver." succcessfully set to verified.";
}

?>