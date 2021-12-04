<?php
include 'conn.php';
    $field1 = $_GET['product_name'];
    $field2 = $_GET['description'];
    $field3 = $_GET['stock'];
    $field4 = $_GET['price'];
    $field5 = $_GET['username'];
    $field6 = $_GET['product_type'];
    $field7 = $_GET['old_product'];
    

if($_GET['product_name'] == $_GET['old_product']){
    try{
        $sql = "select acc_type from register where username='$field5'";
        $result = mysqli_query($mysqli, $sql);


                
        if($result){
                header("Content-Type: JSON");
                $rows = array();
                while($r = mysqli_fetch_assoc($result)) {
                    $rows[] = $r;
                }

                if(mysqli_num_rows($result) > 0){
                $res = json_encode($rows);
                $sql_ = "select product_id from Product where username='$field5' and product_name='$field1'";
                $result_ = mysqli_query($mysqli,$sql_);
                $convert_ = mysqli_fetch_assoc($result_);
            if($convert_ == NULL){
            echo json_encode(array('status' => 'Account does not exist.'));
            }
            else{
                $final_result =  implode("",$convert_);
                    if(!isset($GET['product_name'])){
                    $query = "UPDATE Product set product_name='$field1', description='$field2', stock='$field3', product_price='$field4', product_type='$field6' where username='$field5' and product_id='$final_result'";
                    
                    $mysqli->query($query);
                        echo json_encode(array('status' => 'Success.'));
                    }
                }
           }
            else{
                    echo json_encode(array('status' => 'Your account don\'t have permission to upload products.'));
            }
        }
            else{
                        echo json_encode(array('status' => 'Account does not exist.')); 
                }
            
        }
    catch(Exception $e){
        echo "error";
    }
}else{
    try{
        $sql_ = "select * from Product where username='$field5' and product_name='$field1'"; 
        $result_ = mysqli_query($mysqli, $sql_);

        if(mysqli_num_rows($result_) > 0){
            echo json_encode(array('status' => 'The product already exist in your shop. Choose another name.'));
        }else{
            $sql_ = "select product_id from Product where username='$field5' and product_name='$field7'";

            $result_ = mysqli_query($mysqli,$sql_);


            $convert_ = mysqli_fetch_assoc($result_);
            if($convert_ == NULL){
                    echo json_encode(array('status' => 'Account does not exist.'));
        }
        else{
            $final_result =  implode("",$convert_);
                    if(!isset($GET['product_name'])){
            $query = "UPDATE Product set product_name='$field1', description='$field2', stock='$field3', product_price='$field4', product_type='$field6' where username='$field5' and product_id='$final_result'";
                    
                    $mysqli->query($query);
                    echo json_encode(array('status' => 'Success.'));
            }
        }
    }
 
}catch(Exception $e){
    echo "error";
}}



?>