<?php
include 'conn.php';
    
$field1 = $_GET['product_name'];
$field2 = $_GET['description'];
$field3 = $_GET['stock'];
$field4 = $_GET['price'];
$field5 = $_GET['username'];
$field6 = $_GET['product_type'];
    
    $sql_ = "SELECT COUNT(*) as count FROM Product";

    $result_ = mysqli_query($mysqli,$sql_);
    $convert_ = mysqli_fetch_assoc($result_);
    $final_result =  implode("",$convert_);
    $iden_tifier = "current_stock";

if($final_result > 0){
    $sql__ = "Select * from Product where product_name=N'$field1' and username='$field5'";
    $result__ = $mysqli->query($sql__);
    
    if(mysqli_num_rows($result__) > 0){
        echo json_encode(array('status' => 'Product already exist. Please choose another name.'));
    }else{
        $sql___ = "select acc_type from register where username='$field5'";
        $result___ = mysqli_query($mysqli, $sql___);

        if($result___){
            header("Content-Type: JSON");
            $rows = array();
                while($r = mysqli_fetch_assoc($result___)) {
                    $rows[] = $r;
                }
            if(mysqli_num_rows($result___) > 0){
                $res = json_encode($rows);

                if(strpos($res, 'seller') !== false) {
                    $query = "INSERT INTO Product(product_name, description, stock, product_price, username, product_type, product_image,identifier) VALUES ( '$field1', '$field2', '$field3', '$field4', '$field5', '$field6', 'https:\/\/wecart.gq\/wecart-api\/img\/products\/default_product.jpg', '$iden_tifier')";
                    echo json_encode(array('status' => 'Success.')); 
        
                    $mysqli->query($query);
                    $mysqli->close();
                }else{
                    echo json_encode(array('status' => 'Your account don\'t have permission to edit products.'));
                }
            }
            else{
                echo json_encode(array('status' => 'Account does not exist.')); 
            }
        }
    }
}else{
    $query = "INSERT INTO Product(product_name, description, stock, product_price, username, product_type, product_image, identifier) VALUES ( '$field1', '$field2', '$field3', '$field4', '$field5', '$field6', 'https:\/\/wecart.gq\/wecart-api\/img\/products\/default_product.jpg','$iden_tifier')";
    echo json_encode(array('status' => 'Success.')); 
    
    $mysqli->query($query);
    $mysqli->close();
           
}
?>