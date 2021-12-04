<?php
include 'conn.php';



if(isset($_GET['seller']) && !isset($_GET['product_type'])){
    $field1 = $_GET['seller'];
    
        $sql = "select * from Product where username='$field1'";
         $result = mysqli_query($mysqli, $sql);
         
        $record_visits = "Update register set daily_visitors=daily_visitors+1 where username='$field1'";
            $mysqli->query($record_visits);

    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['username'] = $row['username'];
            $response[$i]['product_name'] = $row['product_name'];
            $response[$i]['product_type'] = $row['product_type'];
            $response[$i]['product_image'] = $row['product_image'];
            $response[$i]['description'] = $row['description'];
            $response[$i]['product_price'] = $row['product_price'];
            $response[$i]['stock'] = $row['stock'];
            $response[$i]['product_id'] = $row['product_id'];
        
  
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
                echo json_encode(array('status' => 'No record found.')); 
        }
    
}
}elseif(isset($_GET['seller']) && isset($_GET['product_type'])){
    $field1 = $_GET['seller'];
    $field2 = $_GET['product_type'];

    
        $sql = "select * from Product where username='$field1' and product_type='$field2'";
         $result = mysqli_query($mysqli, $sql);

    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['username'] = $row['username'];
            $response[$i]['product_name'] = $row['product_name'];
            $response[$i]['product_type'] = $row['product_type'];
            $response[$i]['product_image'] = $row['product_image'];
            $response[$i]['description'] = $row['description'];
            $response[$i]['product_price'] = $row['product_price'];
            $response[$i]['stock'] = $row['stock'];
            $response[$i]['product_id'] = $row['product_id'];
        
  
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
                echo json_encode(array('status' => 'No record found.')); 
        }
    
}
}
else{
     $sql = "select * from Product";
         $result = mysqli_query($mysqli, $sql);

    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['username'] = $row['username'];
            $response[$i]['product_name'] = $row['product_name'];
            $response[$i]['product_type'] = $row['product_type'];
            $response[$i]['product_image'] = $row['product_image'];
            $response[$i]['description'] = $row['description'];
            $response[$i]['product_price'] = $row['product_price'];
            $response[$i]['stock'] = $row['stock'];
            $response[$i]['product_id'] = $row['product_id'];
        
  
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
               echo json_encode(array('status' => 'No record found.')); 
        }
    }
}
?>