<?php
include 'conn.php';

if(isset($_GET["product"])){
    $field0 = $_GET["product"];
     $sql = "select * from Product where product_name LIKE '%$field0%'";
     $sql2 = "select store_name from Orders where product_name LIKE '%$field0%'";
    $result = mysqli_query($mysqli, $sql);
    $result2 = mysqli_query($mysqli, $sql2);
    if($result){
        header("Content-Type: JSON");
        $i=0;
          while($row = mysqli_fetch_assoc($result2)){
            $response[$i]['store_name'] = $row['store_name'];              
          }
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['product_name'] = $row['product_name'];
            $response[$i]['product_image'] = $row['product_image'];
            $response[$i]['product_type'] = $row['product_type'];
            $response[$i]['description'] = $row['description'];
            $response[$i]['product_price'] = $row['product_price'];
            $response[$i]['stock'] = $row['stock'];
            $response[$i]['username'] = $row['username'];
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
               echo json_encode(array('status' => 'No search result.')); 
        }
    }
}


?>