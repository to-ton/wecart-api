<?php
include 'conn.php';

$response = array();

if(isset($_GET['storelist']) || isset($_GET['sellerlist'])){
    $sql = "select * from register where acc_type='seller'";
    $result = mysqli_query($mysqli, $sql);

    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['acc_type'] = $row['acc_type'];
            $response[$i]['store_name'] = $row['store_name'];
            $response[$i]['user_profile_image'] = $row['user_profile_image'];
            $response[$i]['store_type'] = $row['store_type'];
            $response[$i]['full_name'] = $row['full_name'];
            $response[$i]['username'] = $row['username'];
            $response[$i]['password'] = $row['password'];
            $response[$i]['brgy'] = $row['brgy'];
            $response[$i]['sitio'] = $row['sitio'];
            $response[$i]['street'] = $row['street'];
            $response[$i]['contact_num'] = $row['contact_num'];
            $response[$i]['contact_email'] = $row['contact_email'];
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
               echo json_encode(array('status' => 'No available stores.')); 
        }
    }
}
elseif(isset($_GET['agentlist'])){
    if($_GET['agentlist'] == 'isactive'){
    $sql = "select * from register where isactive='yes' and acc_type='agent'";
    $result = mysqli_query($mysqli, $sql);

    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['user_profile_image'] = $row['user_profile_image'];
            $response[$i]['acc_type'] = $row['acc_type'];
            $response[$i]['full_name'] = $row['full_name'];
            $response[$i]['username'] = $row['username'];
            $response[$i]['password'] = $row['password'];
            $response[$i]['brgy'] = $row['brgy'];
            $response[$i]['sitio'] = $row['sitio'];
            $response[$i]['street'] = $row['street'];
            $response[$i]['contact_num'] = $row['contact_num'];
            $response[$i]['contact_email'] = $row['contact_email'];
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
            echo json_encode(array('status' => 'No available agents.')); 
        }
    }
    }
    else{
    $sql = "select * from register where acc_type='agent'";
    $result = mysqli_query($mysqli, $sql);

    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['user_profile_image'] = $row['user_profile_image'];
            $response[$i]['acc_type'] = $row['acc_type'];
            $response[$i]['store_type'] = $row['store_type'];
            $response[$i]['full_name'] = $row['full_name'];
            $response[$i]['username'] = $row['username'];
            $response[$i]['password'] = $row['password'];
            $response[$i]['brgy'] = $row['brgy'];
            $response[$i]['sitio'] = $row['sitio'];
            $response[$i]['street'] = $row['street'];
            $response[$i]['contact_num'] = $row['contact_num'];
            $response[$i]['contact_email'] = $row['contact_email'];
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
             echo json_encode(array('status' => 'No available agents.')); 
        }
    
    }
    }
}
elseif(isset($_GET['buyerlist'])){

    $sql = "select * from register where acc_type='buyer'";
    $result = mysqli_query($mysqli, $sql);

    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['user_profile_image'] = $row['user_profile_image'];
            $response[$i]['acc_type'] = $row['acc_type'];
            $response[$i]['full_name'] = $row['full_name'];
            $response[$i]['username'] = $row['username'];
            $response[$i]['password'] = $row['password'];
            $response[$i]['brgy'] = $row['brgy'];
            $response[$i]['sitio'] = $row['sitio'];
            $response[$i]['street'] = $row['street'];
            $response[$i]['contact_num'] = $row['contact_num'];
            $response[$i]['contact_email'] = $row['contact_email'];
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
            echo json_encode(array('status' => 'Users are empty.')); 
        }
    
    }
    
}

else{
if(isset($_GET['isactive'])){
    $sql = "select * from register where isactive='yes'";
    $result = mysqli_query($mysqli, $sql);

        if($result){
            header("Content-Type: JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['user_profile_image'] = $row['user_profile_image'];
                $response[$i]['acc_type'] = $row['acc_type'];
                $response[$i]['store_name'] = $row['store_name'];
                $response[$i]['full_name'] = $row['full_name'];
                $response[$i]['username'] = $row['username'];
                $response[$i]['password'] = $row['password'];
                $response[$i]['brgy'] = $row['brgy'];
                $response[$i]['sitio'] = $row['sitio'];
                $response[$i]['street'] = $row['street'];
                $response[$i]['contact_num'] = $row['contact_num'];
                $response[$i]['contact_email'] = $row['contact_email'];
                $i++;
            }
            if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
               echo json_encode(array('status' => 'Database empty.')); 
        }
        }
        }else{
             $sql = "select * from register";
            $result = mysqli_query($mysqli, $sql);

        if($result){
            header("Content-Type: JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['user_profile_image'] = $row['user_profile_image'];
                $response[$i]['acc_type'] = $row['acc_type'];
                $response[$i]['store_name'] = $row['store_name'];
                $response[$i]['full_name'] = $row['full_name'];
                $response[$i]['username'] = $row['username'];
                $response[$i]['password'] = $row['password'];
                $response[$i]['brgy'] = $row['brgy'];
                $response[$i]['sitio'] = $row['sitio'];
                $response[$i]['street'] = $row['street'];
                $response[$i]['contact_num'] = $row['contact_num'];
                $response[$i]['contact_email'] = $row['contact_email'];
                $i++;
            }
            if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
              echo json_encode(array('status' => 'Database empty.')); 
                
            }
        }
    }
}
?>