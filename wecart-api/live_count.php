<?php
include 'conn.php';

 $sql = "select * from register";
            $result = mysqli_query($mysqli, $sql);

        if($result){
            header("Content-Type: JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['user_profile_image'] = $row['user_profile_image'];
                $response[$i]['acc_type'] = $row['acc_type'];
                $response[$i]['store_name'] = $row['store_name'];
                $response[$i]['description'] = $row['description'];
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
            $xx = json_encode($response);
            $yy = json_decode($xx);
            
            $users_count = count($yy);
            echo json_encode(array('registered_users_count' => $users_count,'registered_users_count' => $users_count), JSON_PRETTY_PRINT);

        }else{
              echo json_encode(array('status' => 'Database empty.')); 
                
            }
        }

?>