<?php
include 'conn.php';
include 'show-orders.php';
if(isset($_GET['username'])){
    $field0 = $_GET['username'];
    
     $sql = "select * from Orders where username='$field0' order by store_name";
     $result = mysqli_query($mysqli,$sql);
    if($result){
          header("Content-Type: JSON");
        
        $i = 0;

        while($row = mysqli_fetch_assoc($result)){
             $response[$i]['store_name'] = $row['store_name'];
           $response[$i]['product_price'] = $row['product_price'];
            $response[$i]['quantity'] = $row['quantity'];
            $response[$i]['user_address'] = $row['user_address'];

             $i++;

             }
            
            
        }if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
                echo json_encode(array('status' => 'Error')); 
        }
}
        ?>