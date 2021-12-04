<?php
include 'conn.php';
    $image = $_POST["image"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $product_name = $_POST['product_name'];
    $random = $_POST['random_string'];






if($mysqli){
    

    $sql_ = "select product_id from Product where username='$username' and product_name='$product_name'";
    $rest = mysqli_query($mysqli, $sql_);
    
    if($rest){
        $r = mysqli_fetch_assoc($rest);
        
        if(mysqli_num_rows($rest) > 0){
                     $final_name = 'wecart_'.$name.'_'.$random.uniqid();
                     $upload_path = "img/products/$fname_hash.png";
                     $ifp = fopen( $upload_path, 'wb' );
                     fwrite($ifp,base64_decode($image));
    
              $query ="update Product set product_image='https://wecart.gq/wecart-api/img/products/$final_name.png' where username='$username' and product_name='$product_name'";
                          echo json_encode(array('status' => 'Success.')); 

            $mysqli->query($query);


    }
    }else{
        echo json_encode(array('status' => 'Upload failed.')); 
    }
} else{
    echo json_encode(array('status' => 'Shop does not exist.')); 
}

$mysqli->close();
?>
