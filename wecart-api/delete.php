<?php
include 'conn.php';


if(isset($_GET['allbuyer'])){
    echo "are you sure you want to delete all <b>buyer</b> record? click <a href='https://wecart.gq/wecart-api/delete.php?allbuyer=confirm'>here</a>";
    
    if($_GET['allbuyer'] == ""){
    }
    elseif($_GET['allbuyer'] == "confirm"){
        $sql_delete = "DELETE from register where acc_type='buyer'";
    $mysqli->query($sql_delete);
    
    echo "<br><br>success!";
    }else{
        echo json_encode(array('status', 'Failed.'));
    }
}elseif(isset($_GET['allseller'])){
     echo "are you sure you want to delete all <b>seller</b> record? click <a href='https://wecart.gq/wecart-api/delete.php?allseller=confirm'>here</a>";
     
       if($_GET['allseller'] == ""){
    }
    elseif($_GET['allseller'] == "confirm"){
        $sql_delete = "DELETE from register where acc_type='seller' and username NOT IN('bellz')";
    $mysqli->query($sql_delete);
    
    echo "<br><br>success!";
    }else{
        echo json_encode(array('status', 'Failed.'));
    }
}elseif(isset($_GET['allagent'])){
     echo "are you sure you want to delete all <b>agent</b> record? click <a href='https://wecart.gq/wecart-api/delete.php?allagent=confirm'>here</a>";
     
       if($_GET['allagent'] == ""){
    }
    elseif($_GET['allagent'] == "confirm"){
        $sql_delete = "DELETE from register where acc_type='agent'";
    $mysqli->query($sql_delete);
    
    echo "<br><br>success!";
    }else{
        echo json_encode(array('status', 'Failed.'));
    }
}elseif(isset($_GET['allproduct'])){
     echo "are you sure you want to delete all <b>product</b> record? click <a href='https://wecart.gq/wecart-api/delete.php?allproduct=confirm'>here</a>";
     
     if($_GET['allproduct'] == ""){
    }
    elseif($_GET['allproduct'] == "confirm"){
        $sql_delete = "delete from Product where username not in('bellz')";
    $mysqli->query($sql_delete);
    
    echo "<br><br>success!";
    }else{
        echo json_encode(array('status', 'Failed.'));
    }
}elseif(isset($_GET['buyer'])){
    if($mysqli){
    $field0 = $_GET['buyer'];
    $sql_delete = "delete from register where username='$field0'";
    $mysqli->query($sql_delete);
    
    echo json_encode(array('status', 'Success.'));
    }else{
        echo json_encode(array('status', 'Failed.'));
    }
}
elseif(isset($_GET['agent'])){
    if($mysqli){
    $field0 = $_GET['agent'];
    $sql_delete = "delete from register where username='$field0'";
    $mysqli->query($sql_delete);
    
    echo json_encode(array('status', 'Success.'));
    }else{
        echo json_encode(array('status', 'Failed.'));
    }
}elseif(isset($_GET['seller']) && !isset($_GET['product_name'])){
    if($mysqli){
    $field0 = $_GET['seller'];
    $sql_delete_1 = "delete from register where username='$field0'";
    $sql_delete_2 = "delete from Product where username='$field0'";
    $sql_delete_3 = "delete from Orders where username='$field0'";
    $mysqli->query($sql_delete_1);
    $mysqli->query($sql_delete_2);
     $mysqli->query($sql_delete_3);
    
    echo json_encode(array('status', 'Succes.'));
    }else{
        echo json_encode(array('status', 'Failed.'));
    }
    
}elseif(isset($_GET['product_name']) && isset($_GET['seller'])){
    if($mysqli){
    $field0 = $_GET['seller'];
    $field1 = $_GET['product_name'];
    $sql_delete = "delete from Product where username='$field0' and product_name='$field1'";
    $mysqli->query($sql_delete);
    
    echo json_encode(array('status', 'Success.'));
    }else{
        echo json_encode(array('status', 'Failed.'));
    }
    
}elseif(isset($_GET['buyer_user']) && isset($_GET['seller_user']) && isset($_GET['product'])){
    if($mysqli){
    $field1 = $_GET['seller_user'];
    $field2 = $_GET['buyer_user'];
    $field3 = $_GET['product'];
    $aa = "delete from Orders where username='$field2' and product_name='$field3' and seller='$field1'";
    $mysqli->query($aa);
    
    echo json_encode(array('status', 'Success.'));
    }else{
        echo json_encode(array('status', 'Failed.'));
    }
    
}else{
    echo "This is a sensitive utility. Be wary.";
}
$mysqli->close();
?>