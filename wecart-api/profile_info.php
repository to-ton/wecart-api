<?php
include 'conn.php';


if(isset($_GET["username"])){
    $username = $_GET["username"];
if($mysqli){
        $sql = "select * from register where username='$username'";
        $result = mysqli_query($mysqli, $sql);
        if($result){
            header("Content-Type: JSON");
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
                $rows[] = $r;
            }
            if(mysqli_num_rows($result) > 0){
            echo json_encode($rows, JSON_PRETTY_PRINT);
            }else{
                   echo json_encode(array('status' => 'No record found.')); 
            }
        }
}else{
       echo json_encode(array('status' => 'Failed.')); 
}
}else{
    echo json_encode(array('status' => 'No supplied query.')); 

}
?>