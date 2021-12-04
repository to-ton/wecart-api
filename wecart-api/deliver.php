<?php
include 'conn.php';
require_once 'phpqrcode/qrlib.php';
require_once 'PHPMailer/PHPMailerAutoload.php';



if(isset($_GET["seller"])){
$field4 = $_GET['seller'];
$field5 = $_GET['tracking_id'];

     $sql2 = "select qr_,username,product_name,total,product_price,quantity from Orders where seller='$field4' and seller_list_count='$field5' and iscart='no' group by product_name";
  

     $result2 = mysqli_query($mysqli, $sql2);

     



            header("Content-Type: JSON");
$i=1;
        while($row = mysqli_fetch_assoc($result2)){
                $response[0]['qr'] = $row['qr_'];
                $response[$i]['label'] = 'Product_Breakdown';
                $response[$i]['user'] = $row['username'];
                $response[$i]['product_name'] = $row['product_name'];
                $response[$i]['product_price'] = $row['product_price'];
                $response[$i]['quantity'] = $row['quantity'];
                $response[$i]['total'] = $row['total'];

  
            $i++;
        }
            if(mysqli_num_rows($result2) > 0){
                
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
    }

}elseif(isset($_GET["agent"])){
  $field4 = $_GET['agent'];
  $field5 = $_GET['tracking_id'];
  
     $sql2 = "select seller_stall,delivery_status,store_name,product_name,total,product_price,quantity from Orders where agent='$field4' and seller_list_count='$field5' and iscart='no' group by product_name";
  

     $result2 = mysqli_query($mysqli, $sql2);

     



            header("Content-Type: JSON");
$i=0;
        while($row = mysqli_fetch_assoc($result2)){
                $response[$i]['label'] = 'Product_Breakdown';
                $response[$i]['delivery_status'] = $row['delivery_status'];
                $response[$i]['store_name'] = $row['store_name'];
                $response[$i]['stall_address'] = $row['seller_stall'];
                $response[$i]['product_name'] = $row['product_name'];
                $response[$i]['product_price'] = $row['product_price'];
                $response[$i]['quantity'] = $row['quantity'];
                $response[$i]['total'] = $row['total'];

  
            $i++;
        }
            if(mysqli_num_rows($result2) > 0){
                
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
    }  
}elseif(isset($_GET['ship_ready'])){
    $tracking_id = $_GET['tracking_id'];
    $seller = $_GET['uname_1'];
    $random = rand(0,9999999);
    $final_name = $tracking_id.$random.uniqid();
    $upload_path = "img/qr/$final_name.png";
    

    $sql = "select agent,random_string from Orders where seller_list_count='$tracking_id' and seller='$seller'";
      $checksum_res = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_assoc($checksum_res)){
                $aggent = $row['agent'];
                $final_result = $row['random_string'];
            }

    $text = $final_result;
    QRcode::png($text, $upload_path, 'H', 10);
     if($aggent == "Agent not available on Pick up."){
            $sql_ = "UPDATE Orders set delivery_status='Ready for Pick up.',qr_='https://wecart.gq/wecart-api/img/qr/$final_name.png' where seller_list_count='$tracking_id' and seller='$seller'";

    $mysqli->query($sql_);
    echo json_encode(array('status' => 'Success.'));
     }else{       
    
    $sql_ = "UPDATE Orders set delivery_status='Ready for deliver.',qr_='https://wecart.gq/wecart-api/img/qr/$final_name.png' where seller_list_count='$tracking_id' and seller='$seller'";

    $mysqli->query($sql_);
    echo json_encode(array('status' => 'Success.'));
     }
//GET RIDER EMAIL 

$rider_email = "Select agent from Orders where seller_list_count='$tracking_id'";
$rider_email_exec = mysqli_query($mysqli, $rider_email);
$convert_re = mysqli_fetch_assoc($rider_email_exec);
$convert_re_res =  implode("",$convert_re);

if($convert_re_res == "Agent not available on Pick up."){
    
}else{
$get_rider_email = "Select contact_email from register where username='$convert_re_res'";
$get_rider_email_exec = mysqli_query($mysqli, $get_rider_email);
$convert_gre = mysqli_fetch_assoc($get_rider_email_exec);
$convert_gre_res =  implode("",$convert_gre);

//PHP-MAILER
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
$mail->FromName = "WeCart Team";
$mail->Subject = 'Order #'.$tracking_id.' is ready.';
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
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
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
                                                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://uifjnj.stripocdn.email/content/guids/CABINET_887f48b6a2f22ad4fb67bc2a58c0956b/images/36981617967116311.png" alt style="display: block;" width="300"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p20t es-p10b es-m-txt-c">
                                                                                        <h1 style="font-size: 46px; line-height: 100%;">An item is ready to deliver.</h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text">
                                                                                        <p style="font-size: 27px;">Order #'.$tracking_id.'</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b">
                                                                                        <p>A seller is waiting for you to deliver a package please open your WeCart app now for more details.<br><br><br></p>
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
    $mail->AddAddress($convert_gre_res);
    $mail->Send();
}

}elseif(isset($_GET['buyer_delivered'])){
    $tracking_id = $_GET["tracking_id"];
    $buyer = $_GET['buyer'];
    $key = $_GET["key"];
      $sql = "select random_string from Orders where seller_list_count='$tracking_id' and username='$buyer' and random_string='$key'";
      $checksum_res = mysqli_query($mysqli, $sql);
      if(mysqli_num_rows($checksum_res)>0){
            $convert_ = mysqli_fetch_assoc($checksum_res);
            $final_result =  implode("",$convert_); 
                
    if($final_result == $key){
        
    $sql_ = "UPDATE Orders set delivery_status='item received.',isdelivered='yes' where seller_list_count='$tracking_id' and random_string='$final_result'";
    $mysqli->query($sql_);
    
    echo json_encode(array('status'=>'Success.'));
         }
        }
    }elseif(isset($_GET['ship_now'])){
    $tracking_id = $_GET["tracking_id"];
    $rider = $_GET['rider'];
    $key = $_GET["key"];
      $sql = "select random_string from Orders where seller_list_count='$tracking_id' and agent='$rider' and random_string='$key'";
      $checksum_res = mysqli_query($mysqli, $sql);
      if(mysqli_num_rows($checksum_res)>0){
            $convert_ = mysqli_fetch_assoc($checksum_res);
            $final_result =  implode("",$convert_); 
                
    if($final_result == $key){
        
    $sql_ = "UPDATE Orders set delivery_status='Out For Delivery.' where seller_list_count='$tracking_id' and random_string='$final_result'";
    $mysqli->query($sql_);
    
    //GET BUYER EMAIL
    $rider_email = "Select username from Orders where seller_list_count='$tracking_id'";
    $rider_email_exec = mysqli_query($mysqli, $rider_email);
    $convert_re = mysqli_fetch_assoc($rider_email_exec);
    $convert_re_res =  implode("",$convert_re);
    
    
    $get_rider_email = "Select contact_email from register where username='$convert_re_res'";
    $get_rider_email_exec = mysqli_query($mysqli, $get_rider_email);
    $convert_gre = mysqli_fetch_assoc($get_rider_email_exec);
    $convert_gre_res =  implode("",$convert_gre);

    //PHP-MAILER
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
$mail->FromName = "WeCart Team";
$mail->Subject = 'Your order is ready.';
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
                        <table cellpadding="0" cellspacing="0" class="es-header esd-header-popover" align="center">
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
                                                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size: 0px;"><a target="_blank"><img src="https://uifjnj.stripocdn.email/content/guids/CABINET_c67048fd0acf81b47e18129166337c05/images/72301618403900832.png" alt style="display: block;" width="100"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10b es-m-txt-c">
                                                                                        <h1 style="font-size: 46px; line-height: 100%;"><strong>Track your order</strong></h1>
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
                                                                                        <h2>Order <a target="_blank">#</a>'.$tracking_id.'<br>is under way!</h2>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p20b">
                                                                                        <p><br><br>Contact your rider now for delivery options on WeCart App!</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b">
                                                                                        <p>Want to report a rider?&nbsp;Email us at <br>wecart.lobo+riders@gmail.com</p>
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
                                                    <td class="esd-structure es-p15t es-p10b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" align="left" class="esd-container-frame">
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
                                                                                        <p>WeCart 2021, Inc. All Rights Reserved.</p>
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
    $mail->AddAddress($convert_gre_res);
    $mail->Send();
    echo json_encode(array('status' => 'Success.'));
 } else{
    echo json_encode(array('status' => 'Key does not match.'));
    }}else{
        echo json_encode(array('status' => 'Invalid key.'));
    }
    
}elseif(isset($_GET['ship_success'])){
    $tracking_id = $_GET["tracking_id"];
    $randomness = uniqid();
    $sql_ = "UPDATE Orders set delivery_status='Package has been delivered.',isdelivered='yes',random_string='$randomness' where seller_list_count='$tracking_id'";
    
    $mysqli->query($sql_);
    echo json_encode(array('status' => 'Success.'));
}elseif(isset($_GET['ship_fail'])){
    $tracking_id = $_GET["tracking_id"];
    
    $sql_ = "UPDATE Orders set delivery_status='There has been problem delivering your package. The agent will attemp to re-deliver.',isdelivered='no' where seller_list_count='$tracking_id'";
    
    $mysqli->query($sql_);
    echo json_encode(array('status' => 'Success.'));
}
?>