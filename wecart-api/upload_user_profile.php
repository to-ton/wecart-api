<?php
include 'conn.php';


if($mysqli){
    $image = $_POST["image"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $random = $_POST['random_string'];
    
    $final_name = 'wecart_'.$name.''.$random.uniqid();
    $upload_path = "img/user_profile/$final_name.png";
    $ifp = fopen( $upload_path, 'wb' );
    fwrite($ifp,base64_decode($image));
        
    $sql = "update register set user_profile_image='https://wecart.gq/wecart-api/img/user_profile/$final_name.png' where username='$username'";
        echo json_encode(array('status' => 'Success.')); 
    mysqli_query($mysqli, $sql);
}   else{
    echo json_encode(array('status' => 'Upload failed.')); 
}

$mysqli->close();
?>
