<?php
include 'conn.php';

if(isset($_GET["buyer"])){
    $field0 = $_GET['buyer'];
    $sql = "select * from Orders where username='$field0' and isdelivered='no' and iscart='no'";
    
    $result = mysqli_query($mysqli,$sql);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['delivery_status'] = $row['delivery_status'];
            $response[$i]['username'] = $row['username'];
            $response[$i]['product_name'] = $row['product_name'];
            $response[$i]['product_price'] = $row['product_price'];
            $response[$i]['total'] = $row['total'];
            $response[$i]['store_name'] = $row['store_name'];
            $response[$i]['seller'] = $row['seller'];
            $response[$i]['agent'] = $row['agent'];
        
        
  
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
                echo json_encode(array('status' => 'You have empty orders.')); 
        }
}
}elseif(isset($_GET["seller"])){
    $field1 = $_GET['seller'];
    $sql = "select contact_num,full_name,username,seller_list_count,delivery_status,user_address,agent,mode_of_payment,total2 as cod_final_total,sum(total) as final_total from Orders where seller='$field1' and isdelivered='no' and iscart='no' group by seller_list_count desc";
    
    $result = mysqli_query($mysqli,$sql);
    

    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['user'] =  $row['username'];
            $response[$i]['full_name'] = $row['full_name'];
            $response[$i]['contact_num'] = $row['contact_num'];
            $response[$i]['user_address'] = $row['user_address'];
            $response[$i]['tracking_id'] = $row['seller_list_count']; 
            
            if($row['mode_of_payment'] == "cod"){
                $response[$i]['mode_of_payment'] = "Cash on Delivery";
                $response[$i]['Final_Total'] = $row['cod_final_total'];
                $response[$i]['agent'] = $row['agent'];
            }else{
                $response[$i]['mode_of_payment'] = "Pick up";
                 $response[$i]['Final_Total'] = $row['final_total'];
                 $response[$i]['agent'] = "feature not available when pickup.";
            }

            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
                echo json_encode(array('status' => 'Empty orders.')); 
            }
         }
    
}elseif(isset($_GET["agent"])){
    $field2 = $_GET['agent'];
    
    
    $sql = "select * from Orders where agent='$field2' and isdelivered='no'";
    $mysqli->query($sql);
    
    $sql2 = "select full_name,contact_num,add_fee,delivery_fee,username,seller_list_count,seller,store_name,delivery_status,user_address,agent,mode_of_payment,total2,sum(total) as final_total from Orders where agent='$field2' and iscart='no' and isdelivered='no' group by seller_list_count desc";
    $result2 = mysqli_query($mysqli, $sql2);
    if($result2){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result2)){
            $response[$i]['status'] =  $row['delivery_status'];
            $response[$i]['Customer'] =  $row['username'];
            $response[$i]['full_name'] = $row['full_name'];
            $response[$i]['contact_num'] = $row['contact_num'];
            $response[$i]['full_name'] = $row['full_name'];
            $response[$i]['customer_address'] = $row['user_address'];
            $response[$i]['store_name'] = $row['store_name'];
            $response[$i]['seller'] = $row['seller'];
            $response[$i]['agent'] = $row['agent'];
            $response[$i]['tracking_id'] = $row['seller_list_count'];
            if($row['mode_of_payment'] == "cod"){
                $response[$i]['delivery_fee'] = $row['delivery_fee'];
                $response[$i]['add_fee'] = $row['add_fee'];
                $response[$i]['mode_of_payment'] = $row['mode_of_payment'];
                $response[$i]['Final_Total'] = $row['total2'];
            }else{
                $response[$i]['mode_of_payment'] = $row['mode_of_payment'];
                $response[$i]['Final_Total'] = $row['final_total'];
            }
  
            $i++;
        } if(mysqli_num_rows($result2) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
                echo json_encode(array('status' => 'You have empty queue.')); 
        }
     

 

        

            
       }
        
       
        
        
       
}elseif(isset($_GET["iscart"])){
    $field3 = $_GET["iscart"];
    
     $sql = "select stock,seller,store_name,username,product_name,sum(quantity) as final_quantity,product_price,sum(total) as total from Orders where username='$field3' and iscart='yes' group by product_name";
     $sql2 = "select sum(total) as final_total from Orders where username='$field3' and iscart='yes'";
    $result = mysqli_query($mysqli,$sql);
        $result2 = mysqli_query($mysqli,$sql2);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result2)){
            $response[$i]['Final_Total'] = $row['final_total'];
  
            $i++;
        }
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['seller'] = $row['seller'];
            $response[$i]['store_name'] = $row['store_name'];
            $response[$i]['username'] = $row['username'];
            $response[$i]['product_name'] = $row['product_name'];
            $response[$i]['product_price'] = $row['product_price'];
            $response[$i]['stock'] = $row['stock'];
            $response[$i]['quantity'] = $row['final_quantity'];
            $response[$i]['total'] = $row['total'];
        
  
            $i++;
        }if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
                echo json_encode(array('status' => 'You have empty cart.')); 
        }
}
}elseif(isset($_GET["update"])){
    
    $field1 = base64_decode(urldecode($_GET["quantity"]));
    $field1 = base64_decode(urldecode($_GET["username"]));
    $field1 = base64_decode(urldecode($_GET["product_name"]));
    $field1 = base64_decode(urldecode($_GET["seller_uname"]));
    
    $sql0 = "UPDATE Orders set final_quantity='$quantity',total=product_price*final_quantity where username='$username' and product_name='$product_name' and seller='$seller_uname'";
    
    echo json_encode(array('status' => 'Success.'));
    $mysqli->query($sql0);
    
    }elseif(isset($_GET['track'])){
        $track = $_GET["track"];
        
        $sql = "select seller_list_count,store_name,product_name,product_price,seller,delivery_status,mode_of_payment,agent,quantity,total from Orders where seller_list_count='$track' and iscart='no' and isdelivered='no'";
        $res = mysqli_query($mysqli, $sql);
        
        
        if($res){
        header("Content-Type: JSON");
        $i=0;
        while($row= mysqli_fetch_assoc($res)){
            $response[$i]['tracking_id'] = $row['seller_list_count'];
                    $response[$i]['store_name'] = $row['store_name'];
            $response[$i]['product_name'] = $row['product_name'];
            $response[$i]['product_price'] = $row['product_price'];
            $response[$i]['quantity'] = $row['quantity'];
            $response[$i]['total'] = $row['total'];
             $response[$i]['seller'] = $row['seller'];
             $response[$i]['delivery_status'] = $row['delivery_status'];
             $response[$i]['mode_of_payment'] = $row['mode_of_payment'];
             $response[$i]['agent'] = $row['agent'];
             $i++;
        }if(mysqli_num_rows($res) > 0){
                        echo json_encode($response, JSON_PRETTY_PRINT);
        }
        }
        
    }elseif(isset($_GET['tracklist'])){
        $field0 = $_GET['username'];
        
        $sql = "select seller_list_count,mode_of_payment,delivery_status,delivery_fee,add_fee,total2, sum(total) as final_total from Orders where username ='$field0' and iscart='no' and isdelivered='no' group by seller_list_count desc";
        $res = mysqli_query($mysqli, $sql);
        
         if($res){
        header("Content-Type: JSON");
        $i=0;
        while($row= mysqli_fetch_assoc($res)){
            $response[$i]['tracking_id'] = $row['seller_list_count'];
            $response[$i]['delivery_status'] = $row['delivery_status'];
            if($row['mode_of_payment'] == "cod"){
            $response[$i]['delivery_fee'] = $row['delivery_fee']; 
            $response[$i]['add_fee'] = $row['add_fee']; 
            $response[$i]['final_total'] = $row['total2'];    
            }else{
            $response[$i]['delivery_fee'] = "0.00"; 
            $response[$i]['add_fee'] = "0.00"; 
            $response[$i]['final_total'] = $row['final_total'];
            }
             $i++;
        }if(mysqli_num_rows($res) > 0){
                        echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
    }
    
    elseif(isset($_GET["history"])){
    $field4 = $_GET["history"];
    
     $sql = "select date,username, store_name, sum(total) as final_total from Orders where username='$field4' and iscart='no' and isdelivered='yes' group by seller_list_count desc";
    
    $result = mysqli_query($mysqli,$sql);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['username'] =  $row['username'];
            $response[$i]['store_name'] = $row['store_name'];
            $response[$i]['date'] = $row['date'];
            
            $response[$i]['Final_Total'] = $row['final_total'];
        
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
                echo json_encode(array('status' => 'You have empty cart.')); 
        }
        
        
//PHP-MAIL
    $sql = "select product_name,quantity,total  from Orders where seller='$field9' and isdelivered='no' and iscart='no' group by seller_list_count desc";
    
    $result = mysqli_query($mysqli,$sql);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $product_name =  $row['product_name'];
            $quantity = $row['quantity'];
            $total = $row['total'];

        }
        

    }
}
}

?>