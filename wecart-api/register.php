<?php
include 'conn.php';
require_once 'PHPMailer/PHPMailerAutoload.php';

$randomness = rand(0,999999999);
$random_string = uniqid().$randomness;
    
if(isset($_GET['buyer'])){
$field1 = $_GET['name'];
$field2 = $_GET['username'];
$field3 = md5($_GET['password']);
$field4 = $_GET['brgy'];
$field5 = $_GET['sitio'];
$field6 = $_GET['street'];
$field7 = $_GET['contact_num'];
$field8 = $_GET['contact_email'];

$email_exist = "select * from register where contact_email='$field8'";
$sql_ = "select * from register where username='$field2'";
$check_email = mysqli_query($mysqli, $email_exist);
$result_ = mysqli_query($mysqli, $sql_);

if(mysqli_num_rows($check_email) > 0)
{
            echo json_encode(array('email_valid_status' => 'email already exist')); 
    }else{
        if(mysqli_num_rows($result_) > 0){
            echo json_encode(array('status' => 'Username already taken.')); 
    }else{
    
        $query = "INSERT INTO register (full_name, username, password, brgy, sitio, street, contact_num, contact_email, acc_type, user_profile_image, isactive, id,isverify,daily_visitors, isaway, timestamp,assigner_id) VALUES ( '$field1','$field2','$field3','$field4','$field5','$field6','$field7','$field8', 'buyer', 'https:\/\/wecart.gq\/wecart-api\/img\/user_profile\/user_default.png', NULL, '$random_string', 'no',null, null,null,'$random_string')";
        echo "Success.";
//BUYER NOTIF
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
$mail->Subject = 'We need to confirm your account';
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
<center>
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
                                                    <td class="esd-structure es-p30t es-p30b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size: 0px;"><a target="_blank"><img src="https://uifjnj.stripocdn.email/content/guids/CABINET_2abd7d2dafb275cdcde5b5c6cf0e24df/images/wecart_logo.png" alt style="display: block;" width="100"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                                        <p>Hello '.$field2.', You have recently registered an account regarding this&nbsp;email to WeCart.To confirm your identity and if it was really you please follow the link below to confirm:<br><br>https://wecart.gq/confirm_email/?confirm='.$random_string.'<br></p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t es-p5b">
                                                                                        <p>If you did not register with us, please disregard this email.</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                                        <p>Once confirmed, this email will be uniquely associated with your account.</p>
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
                                                                                        <center><p>WeCart 2021.&nbsp;All Rights Reserved.</p></center>
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
</center>
</body>

</html>
';
    $mail->AddAddress($field8);
    $mail->Send();
    $mysqli->query($query);
    $mysqli->close();
    }
}

}elseif(isset($_GET['seller'])){
    $field1 = $_GET['name'];
    $field2 = $_GET['username'];
    $field3 = md5($_GET['password']);
    $field4 = $_GET['brgy'];
    $field5 = $_GET['sitio'];
    $field6 = $_GET['street'];
    $field7 = $_GET['contact_num'];
    $field8 = $_GET['contact_email'];
    $field9 = $_GET['store_name'];
    $field01 = $_GET['store_type'];

echo $field1." :".$field2." :".$field3." :".$field4." :".$field5." :".$field6." :".$field7." :".$field8." :".$field9." :".$field01." :";
$email_exist = "select * from register where contact_email='$field8'";
$sql_ = "select * from register where username='$field2'";
$check_email = mysqli_query($mysqli, $email_exist);
$result_ = mysqli_query($mysqli, $sql_);

if(mysqli_num_rows($check_email) > 0)
{
            echo json_encode(array('email_valid_status' => 'email already exist')); 
    }else{
        if(mysqli_num_rows($result_) > 0){
            echo json_encode(array('status' => 'Username already taken.')); 
    }else{
        $sql___ = "select * from register where store_name='$field9'";
        $result___ = mysqli_query($mysqli, $sql___);
        if(mysqli_num_rows($result___) > 0){
                echo json_encode(array('status' => 'Store name already taken.')); 
        }else{
            $query = "INSERT INTO register (full_name, username, password, brgy, sitio, street, contact_num, contact_email, store_name, acc_type, user_profile_image, store_type, isactive,id,isverify,daily_visitors,isaway,timestamp,assigner_id) VALUES ( '$field1','$field2','$field3','$field4','$field5','$field6','$field7','$field8','$field9', 'seller', 'https:\/\/wecart.gq\/wecart-api\/img\/user_profile\/user_default.png', '$field01', NULL,'$random_string','yes','0',null,null,'$random_string')";
                echo json_encode(array('status' => 'Success.')); 

//NOTIF SELLER
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
$mail->Subject = 'Welcome To WeCart';
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
<center>
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
                                                    <td class="esd-structure es-p30t es-p30b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size: 0px;"><a target="_blank"><img src="https://uifjnj.stripocdn.email/content/guids/CABINET_2abd7d2dafb275cdcde5b5c6cf0e24df/images/wecart_logo.png" alt style="display: block;" width="100"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                                        <p>Welcome to WeCart '.$field9.'.<br><br>Thanks for considering joining with us in our journey! You can now start adding and selling products. Please note that your shop is registered under <b>'.$field01.'</b> and your proprietary products should follow the said category. Below are your username and password provided by an admin.<br><br><b>Username: </b>'.$field2.'<br><b>Password:</b> '.$_GET['password'].'
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t es-p5b">
                                                                                        <p>We strongly recommend to update your information such as password immediately.</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                                     <p>if you think there\'s a mistake in information such as your shop category/name. Please email us on our customer email <br>wecart.lobo+ticket@gmail.com</p>       
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
</center>
</body>

</html>
';
    $mail->AddAddress($field8);
    $mail->Send(); 
    $mysqli->query($query);
        $mysqli->close();
        }
    }
}
}
elseif(isset($_GET['agent'])){
    $field1 = $_GET['name'];
    $field2 = $_GET['username'];
    $field3 = md5($_GET['password']);
    $field4 = $_GET['brgy'];
    $field5 = $_GET['sitio'];
    $field6 = $_GET['street'];
    $field7 = $_GET['contact_num'];
    $field8 = $_GET['contact_email'];

$email_exist = "select * from register where contact_email='$field8'";
$sql_ = "select * from register where username='$field2'";
$check_email = mysqli_query($mysqli, $email_exist);
$result_ = mysqli_query($mysqli, $sql_);

if(mysqli_num_rows($check_email) > 0)
{
            echo json_encode(array('email_valid_status' => 'email already exist')); 
    }else{
        if(mysqli_num_rows($result_) > 0){
            echo json_encode(array('status' => 'Username already taken.')); 
    }else{
         $query = "INSERT INTO register (full_name, username, password, brgy, sitio, street, contact_num, contact_email, acc_type, user_profile_image, isactive,id,isverify,daily_visitors,isaway,timestamp,assigner_id) VALUES ( '$field1','$field2','$field3','$field4','$field5','$field6','$field7','$field8', 'agent', 'https:\/\/wecart.gq\/wecart-api\/img\/user_profile\/user_default.png', NULL, '$random_string','yes',null,null,null,'$random_string')";
                echo json_encode(array('status' => 'Success.')); 

//NOTIF AGENT
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
$mail->Subject = 'Welcome To WeCart';
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
<center>
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
                                                    <td class="esd-structure es-p30t es-p30b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size: 0px;"><a target="_blank"><img src="https://uifjnj.stripocdn.email/content/guids/CABINET_2abd7d2dafb275cdcde5b5c6cf0e24df/images/wecart_logo.png" alt style="display: block;" width="100"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                                        <p>Welcome to WeCart '.$field2.'! You have successfully created an account as Agent. Please be advised that this is a system generated and an admin has created the account for you provided with your credentials below:<br><br><b>Username: </b>'.$field2.'<br><b>Passsword: </b>'.$_GET['password'].'
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t es-p5b">
                                                                                        <p>We strongly recommend to update your information such as password immediately.</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                                                        
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
</center>
</body>

</html>
';
    $mail->AddAddress($field8);
    $mail->Send(); 
    $mysqli->query($query);
    $mysqli->close();
        }
    }

    }else{
    echo json_encode(array('status' => 'No supplied query.')); 
}

?>