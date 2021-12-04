<?php
require_once 'PHPMailer/PHPMailerAutoload.php';
include 'conn.php';

if(isset($_GET["action"])){
      $field0 = $_GET["action"];

    
    if($field0 == "add_cart"){
    $field1 = urldecode(base64_decode($_GET["seller"]));
    $field2 = urldecode(base64_decode($_GET["product_name"]));
    $field3 = urldecode(base64_decode($_GET["username"]));
    $field4 = urldecode(base64_decode($_GET['quantity']));
    

            $checksum = "select stock from Product where username='$field1' and product_name='$field2'";
            $checksum_res = mysqli_query($mysqli,$checksum);
            $convert_ = mysqli_fetch_assoc($checksum_res);
            $final_result =  implode("",$convert_);
        
    if($final_result > 0){
    $assigner_id_get = "select assigner_id from register where username='$field1'";
    $assigner_id_res = mysqli_query($mysqli, $assigner_id_get);
    
    
    while($r = mysqli_fetch_assoc($assigner_id_res)){
        $assigner_id_set = $r['assigner_id'];
    }
    
        $sql1 = "select username,product_name,identifier, stock, product_price from Product where username='$field1' and product_name='$field2'";
        $result1 = mysqli_query($mysqli, $sql1);
        
        $sql2 = "select * from register where username='$field1'";
        $result2 = mysqli_query($mysqli, $sql2);
        
        $sqlix = "select full_name,contact_num,brgy,sitio,street from register where username='$field3'";
        $result69 = mysqli_query($mysqli, $sqlix);
        
        
        if($result1){
        

        while($row = mysqli_fetch_assoc($result1)){
            $response['product_name'] = $row['product_name'];
            $response['product_price'] = $row['product_price'];
            $response['stock'] = $row['stock'];
             $response['identifier'] = $row['identifier'];
           
             if($result2){
 

        while($row = mysqli_fetch_assoc($result2)){
            $response['store_name'] = $row['store_name'];
            $response['seller'] = $row['username'];
            $response['sitio'] = $row['sitio'];
        }
        while($row = mysqli_fetch_assoc($result69)){
            $address['brgy'] = $row['brgy'];
            $address['sitio'] = $row['sitio'];
            $address['street'] = $row['street'];
            $address['full_name'] = $row['full_name'];
            $address['contact_num'] = $row['contact_num'];
        }
    }
    
} 
            $product_name= $response['product_name'];
            $product_price = $response['product_price'];
            $stock = $response['stock'];
            $store_name = $response['store_name'];
            $full_name = $address['full_name'];
            $user_address = $address['brgy'].', '.$address['sitio'].', '.$address['street'];
            $contact_num = $address['contact_num'];
            $stall = $response['sitio'];
            $idents = $response['identifier'];

            $query = "INSERT into Orders(username,product_name,product_price,stock,seller, store_name,quantity,total,user_address,agent, iscart, random_string,mode_of_payment,isdelivered,delivery_status,seller_list_count, contact_num,full_name,date,final_quantity, qr_,seller_stall,id,identifier,total2,delivery_fee,add_fee) VALUES ('$field3','$field2','$product_price','$stock','$field1','$store_name' ,'$field4',(product_price*quantity),'$user_address',null, 'yes', '$assigner_id_set', null,'no',null,null,'$contact_num', '$full_name',null,quantity, null, '$stall',null,'$idents',(product_price*quantity),null,null)";
           $mysqli->query($query);
            
            $sql3 = "select * from Orders where seller='$field1'";
            $result3=mysqli_query($mysqli, $sql3);

            
             if($result3){
        header("Content-Type: JSON");

        while($row = mysqli_fetch_assoc($result3)){
            $response['quantity'] = $row['quantity'];
            $response['total_amount'] = $row['total']; 
            $response['status'] = 'Success.'; 
            } 
           

            
        
                        
        } echo json_encode($response, JSON_PRETTY_PRINT);
            
         
            
        }else{
                echo json_encode(array('status' => 'Error.')); 
        }
    }else{
        echo json_encode(array('status' => 'stock hit limit.')); 
    }
}elseif($field0=="choose_agent"){
        $agent = $_GET['agent'];
         $field3 = $_GET["username"];

        
        $sqli = "UPDATE Orders set agent='$agent',delivery_status=null where username='$field3' and iscart='yes'";
        $mysqli->query($sqli);
        
        echo json_encode(array('status' => 'Success.'));
        
        
    }
    elseif($field0 =="order_summary"){
    $field4 = $_GET['username'];
    
    
    if(isset($_GET['mop'])){
    $field5 = strtolower($_GET["mop"]);
    
    if($field5 == "cod"){
    
    //barangay destination
    $br_gy = "select brgy from register where username='$field4'";
    $br_gy_res = mysqli_query($mysqli, $br_gy);
    $convert_br_gy_res = mysqli_fetch_assoc($br_gy_res);
    $final_br_gy =  implode("",$convert_br_gy_res);
    $final_br_gy_res = strtoupper($final_br_gy);

    
     //order total
    $add_percent = "select sum(total) from Orders where username='$field4' and iscart='yes'";
    $percent = mysqli_query($mysqli, $add_percent);
    $convert_p = mysqli_fetch_assoc($percent);
    $final_result_cp =  implode("",$convert_p);

    //percents
    $below_1000 = 0.02;
    $above_1000 = 0.05;
    
    //shipping fee c
    if($final_result_cp>1000){
        $res = round($final_result_cp/1000);
        $prcnt = ($final_result_cp*$above_1000)*$res;
    switch ($final_br_gy_res) {
          case "APAR":
            $final_prcnt = $prcnt+100;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=100,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BALATBAT":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BALIBAGO":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BANALO":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BIGA":
            $final_prcnt = $prcnt+100;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=100,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BIGNAY":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "CALO":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "CALUMPIT":
            $final_prcnt = $prcnt+70;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=70,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "FABRICA":
            $final_prcnt = $prcnt+40;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=40,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "JAYBANGA":
            $final_prcnt = $prcnt+90;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=90,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "LAGADLARIN":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MABILOG NA BUNDOK":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MALABRIGO":
            $final_prcnt = $prcnt+70;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=70,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MALALIN NA SANOG":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MALAPAD NA PARANG ":
            $final_prcnt = $prcnt+60;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=60,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MASAGUITSIT":
            $final_prcnt = $prcnt+60;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=60,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "NAGTALONTONG":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "NAGTOCTOC":
            $final_prcnt = $prcnt+100;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=100,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "OLO-OLO":   
            $final_prcnt = $prcnt+40;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=40,add_fee=$prcntt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "PINAGHAWANAN":
            $final_prcnt = $prcnt+90;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=90,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "POBLACION":
            $final_prcnt = $prcnt+10;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=10,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "SAN MIGUEL":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "SAN NICOLAS":
            $final_prcnt = $prcnt+100;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=100,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
        case "SAWANG":
            $final_prcnt = $prcnt+70;
            $set_ship_price = "update Orders total2=$final_result_cp+$final_prcnt,delivery_fee=70,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "SOLOC":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "TAYUMAN":
            $final_prcnt = $prcnt+70;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=70,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
        }

    }elseif($final_result_cp<1000){

    $prcnt = $final_result_cp*$below_1000;

    switch($final_br_gy_res){
          case "APAR":
            $final_prcnt = $prcnt+100;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=100,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BALATBAT":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BALIBAGO":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BANALO":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BIGA":
            $final_prcnt = $prcnt+100;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=100,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "BIGNAY":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "CALO":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "CALUMPIT":
            $final_prcnt = $prcnt+70;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=70,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "FABRICA":
            $final_prcnt = $prcnt+40;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=40,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "JAYBANGA":
            $final_prcnt = $prcnt+90;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=90,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "LAGADLARIN":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MABILOG NA BUNDOK":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MALABRIGO":
            $final_prcnt = $prcnt+70;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=70,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MALALIN NA SANOG":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MALAPAD NA PARANG ":
            $final_prcnt = $prcnt+60;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=60,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "MASAGUITSIT":
            $final_prcnt = $prcnt+60;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=60,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "NAGTALONTONG":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "NAGTOCTOC":
            $final_prcnt = $prcnt+100;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=100,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "OLO-OLO":   
            $final_prcnt = $prcnt+40;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=40,add_fee=$prcntt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "PINAGHAWANAN":
            $final_prcnt = $prcnt+90;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=90,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "POBLACION":
            $final_prcnt = $prcnt+10;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=10,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "SAN MIGUEL":
            $final_prcnt = $prcnt+50;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=50,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "SAN NICOLAS":
            $final_prcnt = $prcnt+100;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=100,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
        case "SAWANG":
            $final_prcnt = $prcnt+70;
            $set_ship_price = "update Orders total2=$final_result_cp+$final_prcnt,delivery_fee=70,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "SOLOC":
            $final_prcnt = $prcnt+80;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=80,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
          case "TAYUMAN":
            $final_prcnt = $prcnt+70;
            $set_ship_price = "update Orders set total2=$final_result_cp+$final_prcnt,delivery_fee=70,add_fee=$prcnt where username='$field4' and iscart='yes'";
            $mysqli->query($set_ship_price);
            break;
        }
    }
    //shipping fee end here
    
        $sql3 = "update Orders set mode_of_payment='$field5' where username='$field4' and iscart='yes' and isdelivered='no'";
    $sql1 = "select store_name,user_address,agent,mode_of_payment,sum(total) as final_total from Orders where username='$field4' and iscart='yes' group by store_name";
     $sql2 = "select seller,store_name,username,product_name,product_price,sum(total) as total,sum(quantity) as quantity from Orders where username='$field4' and iscart='yes' group by product_name";
     $sql4 = "select mode_of_payment,delivery_fee,add_fee,total2 as final_total_ship,sum(total) as final_total from Orders where username='$field4' and iscart='yes'";

     $mysqli->query($sql3);
     $result1 = mysqli_query($mysqli, $sql1);
     $result2 = mysqli_query($mysqli, $sql2);
     $result4 =  mysqli_query($mysqli, $sql4);




     if($result1){
        header("Content-Type: JSON");
        while($row = mysqli_fetch_assoc($result4)){
            $response[0]['Final_Total'] = $row['final_total'];
            $response[1]['delivery_fee'] = $row['delivery_fee'];
            $response[2]['add_fee'] = $row['add_fee'];
            $response[3]['Final_Total_with_shipping'] = $row['final_total_ship'];
            $response[4]['mode_of_payment'] = $row['mode_of_payment'];
  
}
        $i=5;
        while($row = mysqli_fetch_assoc($result1)){
            $response[$i]['label'] = 'Order_Summary';
            $response[$i]['store_name'] = $row['store_name'];
            $response[$i]['Final_Total'] = $row['final_total'];
            $response[$i]['agent'] = $row['agent'];
            $response[$i]['user_address'] = $row['user_address'];
            
                
         
            $i++;
            continue;
        } 
     }

        while($row = mysqli_fetch_assoc($result2)){
                $response[$i]['label'] = 'Product_Breakdown';
                $response[$i]['store_name'] = $row['store_name'];
                $response[$i]['product_name'] = $row['product_name'];
                $response[$i]['product_price'] = $row['product_price'];
                $response[$i]['quantity'] = $row['quantity'];
                $response[$i]['Total'] = $row['total'];

  
            $i++;
        }
  
            if(mysqli_num_rows($result1) > 0){
                
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
    }
    
}
    elseif($field5 == "pickup"){
         $sql3 = "update Orders set total2=sum(total),mode_of_payment='$field5',agent='Agent not available on Pick up.' where username='$field4' and iscart='yes' and isdelivered='no'";
    $sql1 = "select store_name,user_address,agent,mode_of_payment,sum(total) as final_total from Orders where username='$field4' and iscart='yes' group by store_name";
     $sql2 = "select seller,store_name,username,product_name,product_price,sum(total) as total,sum(quantity) as quantity from Orders where username='$field4' and iscart='yes' group by product_name";
     $sql4 = "select mode_of_payment,sum(total) as final_total_ship,sum(total) as final_total from Orders where username='$field4' and iscart='yes'";


     
     $mysqli->query($sql3);
     $result1 = mysqli_query($mysqli, $sql1);
     $result2 = mysqli_query($mysqli, $sql2);
     $result4 =  mysqli_query($mysqli, $sql4);
     



     if($result1){
                header("Content-Type: JSON");

        while($row = mysqli_fetch_assoc($result4)){
            $response[0]['Final_Total'] = $row['final_total'];
            $response[1]['Final_Total_with_shipping'] = $row['final_total_ship'];
            $response[2]['mode_of_payment'] = $row['mode_of_payment'];
  
}
        $i=3;
        while($row = mysqli_fetch_assoc($result1)){
            $response[$i]['label'] = 'Order_Summary';
            $response[$i]['store_name'] = $row['store_name'];
            $response[$i]['Final_Total'] = $row['final_total'];
            $response[$i]['agent'] = $row['agent'];
            $response[$i]['user_address'] = $row['user_address'];
            
                
         
            $i++;
            continue;
        } 
     }

        while($row = mysqli_fetch_assoc($result2)){
                $response[$i]['label'] = 'Product_Breakdown';
                $response[$i]['store_name'] = $row['store_name'];
                $response[$i]['product_name'] = $row['product_name'];
                $response[$i]['product_price'] = $row['product_price'];
                $response[$i]['quantity'] = $row['quantity'];
                $response[$i]['Total'] = $row['total'];

  
            $i++;
        }
            if(mysqli_num_rows($result1) > 0){
                
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
    }
        }
        else{
                  $sql3 = "update Orders set mode_of_payment='null' where username='$field4' and iscart='yes' and isdelivered='no'";
    $sql1 = "select store_name,user_address,agent,mode_of_payment,sum(total) as final_total from Orders where username='$field4' and iscart='yes' group by store_name";
     $sql2 = "select seller,store_name,username,product_name,product_price,sum(total) as total,sum(quantity) as quantity from Orders where username='$field4' and iscart='yes' group by product_name";
     $sql4 = "select mode_of_payment,sum(total2) as final_total_ship,sum(total) as final_total from Orders where username='$field4' and iscart='yes'";


     
     $mysqli->query($sql3);
     $result1 = mysqli_query($mysqli, $sql1);
     $result2 = mysqli_query($mysqli, $sql2);
     $result4 =  mysqli_query($mysqli, $sql4);
     



     if($result1){
                header("Content-Type: JSON");

        while($row = mysqli_fetch_assoc($result4)){
            $response[0]['Final_Total'] = $row['final_total'];
            $response[1]['Final_Total_with_shipping'] = $row['final_total_ship'];
            $response[2]['mode_of_payment'] = $row['mode_of_payment'];
  
}
        $i=3;
        while($row = mysqli_fetch_assoc($result1)){
            $response[$i]['label'] = 'Order_Summary';
            $response[$i]['store_name'] = $row['store_name'];
            $response[$i]['Final_Total'] = $row['final_total'];
            $response[$i]['agent'] = $row['agent'];
            $response[$i]['user_address'] = $row['user_address'];
            
                
         
            $i++;
            continue;
        } 
     }

        while($row = mysqli_fetch_assoc($result2)){
                $response[$i]['label'] = 'Product_Breakdown';
                $response[$i]['store_name'] = $row['store_name'];
                $response[$i]['product_name'] = $row['product_name'];
                $response[$i]['product_price'] = $row['product_price'];
                $response[$i]['quantity'] = $row['quantity'];
                $response[$i]['Total'] = $row['total'];

  
            $i++;
        }
            if(mysqli_num_rows($result1) > 0){
                
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
    }
        }
    }
}elseif($field0=="place_order"){
    $field9 = $_GET['username'];
    
$datenow = date('Y/m/d');;
$date_str = date("M jS, Y", strtotime($datenow));
$unique_1 =    rand(0, 9999);
$unique_id = date('YmdHis').$unique_1;


$new_identifier = uniqid();

    $ssql= "UPDATE Orders set isdelivered='no',iscart='no',delivery_status='Seller is preparing package 📦
',seller_list_count='$unique_id',date='$date_str',stock=stock-quantity where username='$field9' and iscart='yes'";
    $mysqli->query($ssql);
    
$ssql2 = "select * from Orders where identifier='current_stock'";
$current_stock = mysqli_query($mysqli, $ssql2);

$i=0;
$x=0;
header("Content-type: JSON");
while($row = mysqli_fetch_assoc($current_stock)){
    $response[$i]['stock'] = $row['stock'];
    $response[$i]['product_name'] = $row['product_name'];
    
    $aaa= $response[$x]['stock'];
    $bbb=  $response[$x]['product_name'];
            $ssql3 = "Update Product set stock='$aaa' where identifier='current_stock' and product_name='$bbb'";
    $res = mysqli_query($mysqli,$ssql3);
    $i++; 
    $x++;

}
 $change_identifier = "update Orders set identifier='$new_identifier' where username='$field9'";
 $mysqli->query($change_identifier);


//GET SELLER EMAIL
$buyer_get_seller = "Select seller from Orders where username='$field9'";
$buyer_get_seller_exec = mysqli_query($mysqli, $buyer_get_seller);
$convert_bgs = mysqli_fetch_assoc($buyer_get_seller_exec);
$convert_bgs_res =  implode("",$convert_bgs);

//PHP MAIL
  $sql_email = "select contact_email from register where username='$convert_bgs_res'";
    $sql_inf = "select seller_list_count,product_name,quantity,total from Orders where seller='$convert_bgs_res' and isdelivered='no' and iscart='no' group by seller_list_count desc";
    $result_email = mysqli_query($mysqli,$sql_email);
    $result_inf = mysqli_query($mysqli,$sql_inf);
    if($result_inf){
$i=0;
        while($row = mysqli_fetch_assoc($result_email)){
            $response[$i]['contact_email']=  $row['contact_email'];   
            }
        while($row = mysqli_fetch_assoc($result_inf)){
            $response[$i]['product_name'] =  $row['product_name'];
            $response[$i]['quantity'] = $row['quantity'];
            $response[$i]['total'] = $row['total'];
            $response[$i]['seller_list_count']=$row['seller_list_count'];
     
     $i++;  
            
        }
    }
    $email =$response[0]['contact_email'];
    $tracking =$response[0]['seller_list_count'];
    $product_name =$response[0]['product_name'];
    $quantity =$response[0]['quantity'];
    $total =$response[0]['total'];
    
//PHP MAILER HERE

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure ='ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'wecart.lobo@gmail.com';
$mail->Password = 'wecart2021';
$mail->SetFrom('no-reply@wecart.gq');
$mail->FromName = "WeCart Store";
$mail->Subject = 'WeCart Order #'.$tracking;
$mail->AddCustomHeader("X-MSMail-Priority: High");
$mail->AddCustomHeader("Importance: High");
$mail->Body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#fafafa"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p10b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://uifjnj.stripocdn.email/content/guids/CABINET_1154ef987a3f887ce59a7fdb008c50d6/images/13381617966960434.png" alt style="display: block;" width="330"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p20t es-p5b es-m-txt-c">
                                                                                        <h1 style="font-size:50px;">You have a new order!</h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b">
                                                                                        <p style="font-size:19px;">You just received a new order please visit your WeCart app now.</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b">
                                                                                        <p style="font-size:16px;"><br><br><strong>Order Summary</strong><br><br><b>Tracking Number:</b> '.$tracking.'<br><b>Item Purchased:</b> '.$product_name.'<br><b>Item Quantity:</b> '.$quantity.'<br><b>Amount Total:</b> '.$total.' PHP</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-footer esd-footer-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="388980">
                                        <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" width="640" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="600" class="esd-container-frame" align="left">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p35b">
                                                                                        <p>WeCart 2021. All Rights Reserved.</p>
                                                                                        <p><br></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
';
    $mail->AddAddress($email);
    $mail->Send();
//GET BUYER INGO
   $buyer_sql_inf = "select seller_list_count,product_name,quantity,total from Orders where username='$field9' and isdelivered='no' and iscart='no' order by seller_list_count desc";
    $buyer_result_inf = mysqli_query($mysqli,$buyer_sql_inf);
    if($buyer_result_inf){
        header("Content-Type: JSON");

$s=0;
        while($row = mysqli_fetch_assoc($buyer_result_inf)){
            $response[$s]['product_name'] =  $row['product_name'];
            $response[$s]['quantity'] = $row['quantity'];
            $response[$s]['total'] = $row['total'];
            $response[$s]['seller_list_count']=$row['seller_list_count'];
     
     $s++;  

        }    

    $buyer_product_name =  $response[0]['product_name'];
      $buyer_sql_email = "select product_image from Product where product_name='$buyer_product_name'";
      $result_photo = mysqli_query($mysqli, $buyer_sql_email);
        
          $buyer_sql_email = "select contact_email from register where username='$field9'";
      $result_email = mysqli_query($mysqli, $buyer_sql_email);
$x=0;
 while($row = mysqli_fetch_assoc($result_email)){
            $response[$x]['contact_email'] =  $row['contact_email'];
  }
        while($row = mysqli_fetch_assoc($result_photo)){
            $response[$x]['product_image'] =  $row['product_image'];
 $x++;  

        } 
      
    }     
    $buyer_contact = $response[0]['contact_email'];
    $buyer_product_name = $response[0]['product_name'];
    $buyer_quantity = $response[0]['quantity'];
    $buyer_total = $response[0]['total'];
    $buyer_seller_list_count = $response[0]['seller_list_count'];
    $buyer_product_image = $response[0]['product_image'];
//BUYER PHP MAILER
$mail2buyer = new PHPMailer();
$mail2buyer->isSMTP();
$mail2buyer->SMTPAuth = true;
$mail2buyer->SMTPSecure ='ssl';
$mail2buyer->Host = 'smtp.gmail.com';
$mail2buyer->Port = '465';
$mail2buyer->isHTML();
$mail2buyer->Username = 'wecart.lobo@gmail.com';
$mail2buyer->Password = 'wecart2021';
$mail2buyer->SetFrom('no-reply@wecart.gq');
$mail2buyer->FromName = "WeCart Store";
$mail2buyer->Subject = 'Thanks for Purchasing #'.$tracking;
$mail2buyer->AddCustomHeader("X-MSMail-Priority: High");
$mail2buyer->AddCustomHeader("Importance: High");
$mail2buyer->Body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#fafafa"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="388982">
                                        <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;" bgcolor="rgba(0, 0, 0, 0)">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-header" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="388981">
                                        <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="es-m-p0r esd-container-frame" valign="top" align="center">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p15t es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size: 0px;"><a target="_blank"><img src="https://uifjnj.stripocdn.email/content/guids/CABINET_54100624d621728c49155116bef5e07d/images/84141618400759579.png" alt style="display: block;" width="100"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10b es-m-txt-c">
                                                                                        <h1 style="font-size: 46px; line-height: 100%;">Order confirmation</h1>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-m-txt-c">
                                                                                        <h2>Tracking&nbsp;<a target="_blank">#'.$buyer_seller_list_count.'</a></h2>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                                        <p>'.date("M jS, Y", strtotime($datenow)).'</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p15b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                                        <p>A new order has been added with tracking <a target="_blank">#'.$buyer_seller_list_count.'</a>. Tap "Track Order" now on WeCart App to check your orders.</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p10b es-p20r es-p20l esdev-adapt-off" align="left" esd-custom-block-id="388986">
                                                        <table width="560" cellpadding="0" cellspacing="0" class="esdev-mso-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="70" class="es-m-p0r esd-container-frame" align="center">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="'.$buyer_product_image.'" alt style="display: block;" width="70"></a></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="20"></td>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="265" class="esd-container-frame" align="center">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="left" class="esd-block-text">
                                                                                                        <p><strong>'.$buyer_product_name.'</strong></p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" class="esd-block-text es-p5t">
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="20"></td>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80" align="left" class="esd-container-frame">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-text">
                                                                                                        <p>'.$buyer_quantity.'x</p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="20"></td>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" class="es-right" align="right">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="85" align="left" class="esd-container-frame">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="right" class="esd-block-text">
                                                                                                        <p>'.$buyer_total.' PHP</p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="es-m-p0r esd-container-frame" align="center">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-top: 2px solid #efefef; border-bottom: 2px solid #efefef;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="left" class="esd-block-text es-m-txt-r es-p10t es-p20b">
                                                                                        <p>view complete orders on WeCart App!</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-footer" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="388980">
                                        <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" width="640" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="600" class="esd-container-frame" align="left">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p35b">
                                                                                        <p>WeCart 2021.&nbsp;&nbsp;All Rights Reserved.</p>
                                                                                        <p><br></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content esd-footer-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="388983">
                                        <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;" bgcolor="rgba(0, 0, 0, 0)">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
';
    $mail2buyer->AddAddress($buyer_contact);
    $mail2buyer->Send();

}

}

?>
