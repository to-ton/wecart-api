<?php
include '../wecart-api/conn.php';

$randomness = rand(0,999999999);
$random_string = uniqid().$randomness;

$date = new DateTime("now", new DateTimeZone('Asia/Manila'));
$current_stamp = $date->format('G');
if(isset($_GET["code"])){
    $code = $_GET["code"];
    $sql = "select id from register where id='$code'";
    $res = mysqli_query($mysqli, $sql);
    
    if(mysqli_num_rows($res)>0){
    $get_stamp = "select timestamp from register where id='$code'";
    $res = mysqli_query($mysqli, $get_stamp);
    while($row = mysqli_fetch_assoc($res)){
    $stamp_obtained = $row['timestamp'];   
    }
    
    $valid_time = $stamp_obtained-$current_stamp;
    if($valid_time<0){
echo <<<ERROR
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
<style>
img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
display: none;} 
/* CONFIG STYLES Please do not delete and edit CSS styles below */
/* IMPORTANT THIS STYLES MUST BE ON FINAL EMAIL */
#outlook a {
    padding: 0;
}

.es-button {
    mso-style-priority: 100 !important;
    text-decoration: none !important;
}

a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

.es-desk-hidden {
    display: none;
    float: left;
    overflow: hidden;
    width: 0;
    max-height: 0;
    line-height: 0;
    mso-hide: all;
}

[data-ogsb] .es-button {
    border-width: 0 !important;
    padding: 10px 30px 10px 30px !important;
}

/*
END OF IMPORTANT
*/
body {
    width: 100%;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
}

table {
    mso-table-lspace: 0pt;
    mso-table-rspace: 0pt;
    border-collapse: collapse;
    border-spacing: 0px;
}

table td,
body,
.es-wrapper {
    padding: 0;
    Margin: 0;
}

.es-content,
.es-header,
.es-footer {
    table-layout: fixed !important;
    width: 100%;
}

img {
    display: block;
    border: 0;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
}

p,
hr {
    Margin: 0;
}

h1,
h2,
h3,
h4,
h5 {
    Margin: 0;
    line-height: 120%;
    mso-line-height-rule: exactly;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}

p,
ul li,
ol li,
a {
    -webkit-text-size-adjust: none;
    -ms-text-size-adjust: none;
    mso-line-height-rule: exactly;
}

.es-left {
    float: left;
}

.es-right {
    float: right;
}

.es-p5 {
    padding: 5px;
}

.es-p5t {
    padding-top: 5px;
}

.es-p5b {
    padding-bottom: 5px;
}

.es-p5l {
    padding-left: 5px;
}

.es-p5r {
    padding-right: 5px;
}

.es-p10 {
    padding: 10px;
}

.es-p10t {
    padding-top: 10px;
}

.es-p10b {
    padding-bottom: 10px;
}

.es-p10l {
    padding-left: 10px;
}

.es-p10r {
    padding-right: 10px;
}

.es-p15 {
    padding: 15px;
}

.es-p15t {
    padding-top: 15px;
}

.es-p15b {
    padding-bottom: 15px;
}

.es-p15l {
    padding-left: 15px;
}

.es-p15r {
    padding-right: 15px;
}

.es-p20 {
    padding: 20px;
}

.es-p20t {
    padding-top: 20px;
}

.es-p20b {
    padding-bottom: 20px;
}

.es-p20l {
    padding-left: 20px;
}

.es-p20r {
    padding-right: 20px;
}

.es-p25 {
    padding: 25px;
}

.es-p25t {
    padding-top: 25px;
}

.es-p25b {
    padding-bottom: 25px;
}

.es-p25l {
    padding-left: 25px;
}

.es-p25r {
    padding-right: 25px;
}

.es-p30 {
    padding: 30px;
}

.es-p30t {
    padding-top: 30px;
}

.es-p30b {
    padding-bottom: 30px;
}

.es-p30l {
    padding-left: 30px;
}

.es-p30r {
    padding-right: 30px;
}

.es-p35 {
    padding: 35px;
}

.es-p35t {
    padding-top: 35px;
}

.es-p35b {
    padding-bottom: 35px;
}

.es-p35l {
    padding-left: 35px;
}

.es-p35r {
    padding-right: 35px;
}

.es-p40 {
    padding: 40px;
}

.es-p40t {
    padding-top: 40px;
}

.es-p40b {
    padding-bottom: 40px;
}

.es-p40l {
    padding-left: 40px;
}

.es-p40r {
    padding-right: 40px;
}

.es-menu td {
    border: 0;
}

.es-menu td a img {
    display: inline-block !important;
    vertical-align: middle;
}

/*
END CONFIG STYLES
*/
s {
    text-decoration: line-through;
}

p,
ul li,
ol li {
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    line-height: 150%;
}

ul li,
ol li {
    Margin-bottom: 15px;
}

a {
    text-decoration: underline;
}

.es-menu td a {
    text-decoration: none;
    display: block;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}

.es-wrapper {
    width: 100%;
    height: 100%;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
    background-color: #fafafa;
}

.es-wrapper-color {
    background-color: #fafafa;
}

.es-header {
    background-color: transparent;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
}

.es-header-body {
    background-color: transparent;
}

.es-header-body p,
.es-header-body ul li,
.es-header-body ol li {
    color: #333333;
    font-size: 14px;
}

.es-header-body a {
    color: #666666;
    font-size: 14px;
}

.es-content-body {
    background-color: #ffffff;
}

.es-content-body p,
.es-content-body ul li,
.es-content-body ol li {
    color: #333333;
    font-size: 14px;
}

.es-content-body a {
    color: #5c68e2;
    font-size: 14px;
}

.es-footer {
    background-color: transparent;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
}

.es-footer-body {
    background-color: #ffffff;
}

.es-footer-body p,
.es-footer-body ul li,
.es-footer-body ol li {
    color: #333333;
    font-size: 12px;
}

.es-footer-body a {
    color: #333333;
    font-size: 12px;
}

.es-infoblock,
.es-infoblock p,
.es-infoblock ul li,
.es-infoblock ol li {
    line-height: 120%;
    font-size: 12px;
    color: #cccccc;
}

.es-infoblock a {
    font-size: 12px;
    color: #cccccc;
}

h1 {
    font-size: 46px;
    font-style: normal;
    font-weight: bold;
    color: #333333;
}

h2 {
    font-size: 26px;
    font-style: normal;
    font-weight: bold;
    color: #333333;
}

h3 {
    font-size: 20px;
    font-style: normal;
    font-weight: bold;
    color: #333333;
}

.es-header-body h1 a,
.es-content-body h1 a,
.es-footer-body h1 a {
    font-size: 46px;
}

.es-header-body h2 a,
.es-content-body h2 a,
.es-footer-body h2 a {
    font-size: 26px;
}

.es-header-body h3 a,
.es-content-body h3 a,
.es-footer-body h3 a {
    font-size: 20px;
}

a.es-button,
button.es-button {
    border-style: solid;
    border-color: #5c68e2;
    border-width: 10px 30px 10px 30px;
    display: inline-block;
    background: #5c68e2;
    border-radius: 0px;
    font-size: 20px;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    font-weight: normal;
    font-style: normal;
    line-height: 120%;
    color: #ffffff;
    text-decoration: none;
    width: auto;
    text-align: center;
}

.es-button-border {
    border-style: solid solid solid solid;
    border-color: #2cb543 #2cb543 #2cb543 #2cb543;
    background: #5c68e2;
    border-width: 0px 0px 0px 0px;
    display: inline-block;
    border-radius: 0px;
    width: auto;
}

/* RESPONSIVE STYLES Please do not delete and edit CSS styles below. If you don't need responsive layout, please delete this section. */
@media only screen and (max-width: 600px) {

    p,
    ul li,
    ol li,
    a {
        line-height: 150% !important;
    }

    h1,
    h2,
    h3,
    h1 a,
    h2 a,
    h3 a {
        line-height: 120%;
    }

    h1 {
        font-size: 36px !important;
        text-align: left;
    }

    h2 {
        font-size: 26px !important;
        text-align: left;
    }

    h3 {
        font-size: 20px !important;
        text-align: left;
    }

    .es-header-body h1 a,
    .es-content-body h1 a,
    .es-footer-body h1 a {
        font-size: 36px !important;
        text-align: left;
    }

    .es-header-body h2 a,
    .es-content-body h2 a,
    .es-footer-body h2 a {
        font-size: 26px !important;
        text-align: left;
    }

    .es-header-body h3 a,
    .es-content-body h3 a,
    .es-footer-body h3 a {
        font-size: 20px !important;
        text-align: left;
    }

    .es-menu td a {
        font-size: 12px !important;
    }

    .es-header-body p,
    .es-header-body ul li,
    .es-header-body ol li,
    .es-header-body a {
        font-size: 14px !important;
    }

    .es-content-body p,
    .es-content-body ul li,
    .es-content-body ol li,
    .es-content-body a {
        font-size: 16px !important;
    }

    .es-footer-body p,
    .es-footer-body ul li,
    .es-footer-body ol li,
    .es-footer-body a {
        font-size: 14px !important;
    }

    .es-infoblock p,
    .es-infoblock ul li,
    .es-infoblock ol li,
    .es-infoblock a {
        font-size: 12px !important;
    }

    *[class="gmail-fix"] {
        display: none !important;
    }

    .es-m-txt-c,
    .es-m-txt-c h1,
    .es-m-txt-c h2,
    .es-m-txt-c h3 {
        text-align: center !important;
    }

    .es-m-txt-r,
    .es-m-txt-r h1,
    .es-m-txt-r h2,
    .es-m-txt-r h3 {
        text-align: right !important;
    }

    .es-m-txt-l,
    .es-m-txt-l h1,
    .es-m-txt-l h2,
    .es-m-txt-l h3 {
        text-align: left !important;
    }

    .es-m-txt-r img,
    .es-m-txt-c img,
    .es-m-txt-l img {
        display: inline !important;
    }

    .es-button-border {
        display: inline-block !important;
    }

    a.es-button,
    button.es-button {
        font-size: 20px !important;
        display: inline-block !important;
    }

    .es-adaptive table,
    .es-left,
    .es-right {
        width: 100% !important;
    }

    .es-content table,
    .es-header table,
    .es-footer table,
    .es-content,
    .es-footer,
    .es-header {
        width: 100% !important;
        max-width: 600px !important;
    }

    .es-adapt-td {
        display: block !important;
        width: 100% !important;
    }

    .adapt-img {
        width: 100% !important;
        height: auto !important;
    }

    .es-m-p0 {
        padding: 0 !important;
    }

    .es-m-p0r {
        padding-right: 0 !important;
    }

    .es-m-p0l {
        padding-left: 0 !important;
    }

    .es-m-p0t {
        padding-top: 0 !important;
    }

    .es-m-p0b {
        padding-bottom: 0 !important;
    }

    .es-m-p20b {
        padding-bottom: 20px !important;
    }

    .es-mobile-hidden,
    .es-hidden {
        display: none !important;
    }

    tr.es-desk-hidden,
    td.es-desk-hidden,
    table.es-desk-hidden {
        width: auto !important;
        overflow: visible !important;
        float: none !important;
        max-height: inherit !important;
        line-height: inherit !important;
    }

    tr.es-desk-hidden {
        display: table-row !important;
    }

    table.es-desk-hidden {
        display: table !important;
    }

    td.es-desk-menu-hidden {
        display: table-cell !important;
    }

    .es-menu td {
        width: 1% !important;
    }

    table.es-table-not-adapt,
    .esd-block-html table {
        width: auto !important;
    }

    table.es-social {
        display: inline-block !important;
    }

    table.es-social td {
        display: inline-block !important;
    }

    .es-m-p5 {
        padding: 5px !important;
    }

    .es-m-p5t {
        padding-top: 5px !important;
    }

    .es-m-p5b {
        padding-bottom: 5px !important;
    }

    .es-m-p5r {
        padding-right: 5px !important;
    }

    .es-m-p5l {
        padding-left: 5px !important;
    }

    .es-m-p10 {
        padding: 10px !important;
    }

    .es-m-p10t {
        padding-top: 10px !important;
    }

    .es-m-p10b {
        padding-bottom: 10px !important;
    }

    .es-m-p10r {
        padding-right: 10px !important;
    }

    .es-m-p10l {
        padding-left: 10px !important;
    }

    .es-m-p15 {
        padding: 15px !important;
    }

    .es-m-p15t {
        padding-top: 15px !important;
    }

    .es-m-p15b {
        padding-bottom: 15px !important;
    }

    .es-m-p15r {
        padding-right: 15px !important;
    }

    .es-m-p15l {
        padding-left: 15px !important;
    }

    .es-m-p20 {
        padding: 20px !important;
    }

    .es-m-p20t {
        padding-top: 20px !important;
    }

    .es-m-p20r {
        padding-right: 20px !important;
    }

    .es-m-p20l {
        padding-left: 20px !important;
    }

    .es-m-p25 {
        padding: 25px !important;
    }

    .es-m-p25t {
        padding-top: 25px !important;
    }

    .es-m-p25b {
        padding-bottom: 25px !important;
    }

    .es-m-p25r {
        padding-right: 25px !important;
    }

    .es-m-p25l {
        padding-left: 25px !important;
    }

    .es-m-p30 {
        padding: 30px !important;
    }

    .es-m-p30t {
        padding-top: 30px !important;
    }

    .es-m-p30b {
        padding-bottom: 30px !important;
    }

    .es-m-p30r {
        padding-right: 30px !important;
    }

    .es-m-p30l {
        padding-left: 30px !important;
    }

    .es-m-p35 {
        padding: 35px !important;
    }

    .es-m-p35t {
        padding-top: 35px !important;
    }

    .es-m-p35b {
        padding-bottom: 35px !important;
    }

    .es-m-p35r {
        padding-right: 35px !important;
    }

    .es-m-p35l {
        padding-left: 35px !important;
    }

    .es-m-p40 {
        padding: 40px !important;
    }

    .es-m-p40t {
        padding-top: 40px !important;
    }

    .es-m-p40b {
        padding-bottom: 40px !important;
    }

    .es-m-p40r {
        padding-right: 40px !important;
    }

    .es-m-p40l {
        padding-left: 40px !important;
    }
}

/* END RESPONSIVE STYLES */
html,
body {
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}
</style>
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
                                                                                    <td align="center" class="esd-block-text es-p10t es-p5b">
                                                                                        <p>The link you are following have already expired.</p>
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
ERROR;
    }else{
        $unique = uniqid('', true);
        $newpass = substr($unique, strlen($unique) - 8, strlen($unique));
        $md5_newpass = md5($newpass);
        $new_pass = "UPDATE register set password='$md5_newpass' where id='$code'";
        $mysqli->query($new_pass);
        
        $set_new_key = "update register set id='$random_string' where id='$code'";
        $mysqli->query($set_new_key);
        
               echo <<<NEW
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
<style>
img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
display: none;} 
/* CONFIG STYLES Please do not delete and edit CSS styles below */
/* IMPORTANT THIS STYLES MUST BE ON FINAL EMAIL */
#outlook a {
    padding: 0;
}

.es-button {
    mso-style-priority: 100 !important;
    text-decoration: none !important;
}

a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

.es-desk-hidden {
    display: none;
    float: left;
    overflow: hidden;
    width: 0;
    max-height: 0;
    line-height: 0;
    mso-hide: all;
}

[data-ogsb] .es-button {
    border-width: 0 !important;
    padding: 10px 30px 10px 30px !important;
}

/*
END OF IMPORTANT
*/
body {
    width: 100%;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
}

table {
    mso-table-lspace: 0pt;
    mso-table-rspace: 0pt;
    border-collapse: collapse;
    border-spacing: 0px;
}

table td,
body,
.es-wrapper {
    padding: 0;
    Margin: 0;
}

.es-content,
.es-header,
.es-footer {
    table-layout: fixed !important;
    width: 100%;
}

img {
    display: block;
    border: 0;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
}

p,
hr {
    Margin: 0;
}

h1,
h2,
h3,
h4,
h5 {
    Margin: 0;
    line-height: 120%;
    mso-line-height-rule: exactly;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}

p,
ul li,
ol li,
a {
    -webkit-text-size-adjust: none;
    -ms-text-size-adjust: none;
    mso-line-height-rule: exactly;
}

.es-left {
    float: left;
}

.es-right {
    float: right;
}

.es-p5 {
    padding: 5px;
}

.es-p5t {
    padding-top: 5px;
}

.es-p5b {
    padding-bottom: 5px;
}

.es-p5l {
    padding-left: 5px;
}

.es-p5r {
    padding-right: 5px;
}

.es-p10 {
    padding: 10px;
}

.es-p10t {
    padding-top: 10px;
}

.es-p10b {
    padding-bottom: 10px;
}

.es-p10l {
    padding-left: 10px;
}

.es-p10r {
    padding-right: 10px;
}

.es-p15 {
    padding: 15px;
}

.es-p15t {
    padding-top: 15px;
}

.es-p15b {
    padding-bottom: 15px;
}

.es-p15l {
    padding-left: 15px;
}

.es-p15r {
    padding-right: 15px;
}

.es-p20 {
    padding: 20px;
}

.es-p20t {
    padding-top: 20px;
}

.es-p20b {
    padding-bottom: 20px;
}

.es-p20l {
    padding-left: 20px;
}

.es-p20r {
    padding-right: 20px;
}

.es-p25 {
    padding: 25px;
}

.es-p25t {
    padding-top: 25px;
}

.es-p25b {
    padding-bottom: 25px;
}

.es-p25l {
    padding-left: 25px;
}

.es-p25r {
    padding-right: 25px;
}

.es-p30 {
    padding: 30px;
}

.es-p30t {
    padding-top: 30px;
}

.es-p30b {
    padding-bottom: 30px;
}

.es-p30l {
    padding-left: 30px;
}

.es-p30r {
    padding-right: 30px;
}

.es-p35 {
    padding: 35px;
}

.es-p35t {
    padding-top: 35px;
}

.es-p35b {
    padding-bottom: 35px;
}

.es-p35l {
    padding-left: 35px;
}

.es-p35r {
    padding-right: 35px;
}

.es-p40 {
    padding: 40px;
}

.es-p40t {
    padding-top: 40px;
}

.es-p40b {
    padding-bottom: 40px;
}

.es-p40l {
    padding-left: 40px;
}

.es-p40r {
    padding-right: 40px;
}

.es-menu td {
    border: 0;
}

.es-menu td a img {
    display: inline-block !important;
    vertical-align: middle;
}

/*
END CONFIG STYLES
*/
s {
    text-decoration: line-through;
}

p,
ul li,
ol li {
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    line-height: 150%;
}

ul li,
ol li {
    Margin-bottom: 15px;
}

a {
    text-decoration: underline;
}

.es-menu td a {
    text-decoration: none;
    display: block;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}

.es-wrapper {
    width: 100%;
    height: 100%;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
    background-color: #fafafa;
}

.es-wrapper-color {
    background-color: #fafafa;
}

.es-header {
    background-color: transparent;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
}

.es-header-body {
    background-color: transparent;
}

.es-header-body p,
.es-header-body ul li,
.es-header-body ol li {
    color: #333333;
    font-size: 14px;
}

.es-header-body a {
    color: #666666;
    font-size: 14px;
}

.es-content-body {
    background-color: #ffffff;
}

.es-content-body p,
.es-content-body ul li,
.es-content-body ol li {
    color: #333333;
    font-size: 14px;
}

.es-content-body a {
    color: #5c68e2;
    font-size: 14px;
}

.es-footer {
    background-color: transparent;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
}

.es-footer-body {
    background-color: #ffffff;
}

.es-footer-body p,
.es-footer-body ul li,
.es-footer-body ol li {
    color: #333333;
    font-size: 12px;
}

.es-footer-body a {
    color: #333333;
    font-size: 12px;
}

.es-infoblock,
.es-infoblock p,
.es-infoblock ul li,
.es-infoblock ol li {
    line-height: 120%;
    font-size: 12px;
    color: #cccccc;
}

.es-infoblock a {
    font-size: 12px;
    color: #cccccc;
}

h1 {
    font-size: 46px;
    font-style: normal;
    font-weight: bold;
    color: #333333;
}

h2 {
    font-size: 26px;
    font-style: normal;
    font-weight: bold;
    color: #333333;
}

h3 {
    font-size: 20px;
    font-style: normal;
    font-weight: bold;
    color: #333333;
}

.es-header-body h1 a,
.es-content-body h1 a,
.es-footer-body h1 a {
    font-size: 46px;
}

.es-header-body h2 a,
.es-content-body h2 a,
.es-footer-body h2 a {
    font-size: 26px;
}

.es-header-body h3 a,
.es-content-body h3 a,
.es-footer-body h3 a {
    font-size: 20px;
}

a.es-button,
button.es-button {
    border-style: solid;
    border-color: #5c68e2;
    border-width: 10px 30px 10px 30px;
    display: inline-block;
    background: #5c68e2;
    border-radius: 5px;
    font-size: 20px;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    font-weight: normal;
    font-style: normal;
    line-height: 120%;
    color: #ffffff;
    text-decoration: none;
    width: auto;
    text-align: center;
}

.es-button-border {
    border-style: solid solid solid solid;
    border-color: #2cb543 #2cb543 #2cb543 #2cb543;
    background: #5c68e2;
    border-width: 0px 0px 0px 0px;
    display: inline-block;
    border-radius: 5px;
    width: auto;
}

/* RESPONSIVE STYLES Please do not delete and edit CSS styles below. If you don't need responsive layout, please delete this section. */
@media only screen and (max-width: 600px) {

    p,
    ul li,
    ol li,
    a {
        line-height: 150% !important;
    }

    h1,
    h2,
    h3,
    h1 a,
    h2 a,
    h3 a {
        line-height: 120% !important;
    }

    h1 {
        font-size: 36px !important;
        text-align: left;
    }

    h2 {
        font-size: 26px !important;
        text-align: left;
    }

    h3 {
        font-size: 20px !important;
        text-align: left;
    }

    .es-header-body h1 a,
    .es-content-body h1 a,
    .es-footer-body h1 a {
        font-size: 36px !important;
        text-align: left;
    }

    .es-header-body h2 a,
    .es-content-body h2 a,
    .es-footer-body h2 a {
        font-size: 26px !important;
        text-align: left;
    }

    .es-header-body h3 a,
    .es-content-body h3 a,
    .es-footer-body h3 a {
        font-size: 20px !important;
        text-align: left;
    }

    .es-menu td a {
        font-size: 12px !important;
    }

    .es-header-body p,
    .es-header-body ul li,
    .es-header-body ol li,
    .es-header-body a {
        font-size: 14px !important;
    }

    .es-content-body p,
    .es-content-body ul li,
    .es-content-body ol li,
    .es-content-body a {
        font-size: 14px !important;
    }

    .es-footer-body p,
    .es-footer-body ul li,
    .es-footer-body ol li,
    .es-footer-body a {
        font-size: 14px !important;
    }

    .es-infoblock p,
    .es-infoblock ul li,
    .es-infoblock ol li,
    .es-infoblock a {
        font-size: 12px !important;
    }

    *[class="gmail-fix"] {
        display: none !important;
    }

    .es-m-txt-c,
    .es-m-txt-c h1,
    .es-m-txt-c h2,
    .es-m-txt-c h3 {
        text-align: center !important;
    }

    .es-m-txt-r,
    .es-m-txt-r h1,
    .es-m-txt-r h2,
    .es-m-txt-r h3 {
        text-align: right !important;
    }

    .es-m-txt-l,
    .es-m-txt-l h1,
    .es-m-txt-l h2,
    .es-m-txt-l h3 {
        text-align: left !important;
    }

    .es-m-txt-r img,
    .es-m-txt-c img,
    .es-m-txt-l img {
        display: inline !important;
    }

    .es-button-border {
        display: inline-block !important;
    }

    a.es-button,
    button.es-button {
        font-size: 20px !important;
        display: inline-block !important;
    }

    .es-adaptive table,
    .es-left,
    .es-right {
        width: 100% !important;
    }

    .es-content table,
    .es-header table,
    .es-footer table,
    .es-content,
    .es-footer,
    .es-header {
        width: 100% !important;
        max-width: 600px !important;
    }

    .es-adapt-td {
        display: block !important;
        width: 100% !important;
    }

    .adapt-img {
        width: 100% !important;
        height: auto !important;
    }

    .es-m-p0 {
        padding: 0 !important;
    }

    .es-m-p0r {
        padding-right: 0 !important;
    }

    .es-m-p0l {
        padding-left: 0 !important;
    }

    .es-m-p0t {
        padding-top: 0 !important;
    }

    .es-m-p0b {
        padding-bottom: 0 !important;
    }

    .es-m-p20b {
        padding-bottom: 20px !important;
    }

    .es-mobile-hidden,
    .es-hidden {
        display: none !important;
    }

    tr.es-desk-hidden,
    td.es-desk-hidden,
    table.es-desk-hidden {
        width: auto !important;
        overflow: visible !important;
        float: none !important;
        max-height: inherit !important;
        line-height: inherit !important;
    }

    tr.es-desk-hidden {
        display: table-row !important;
    }

    table.es-desk-hidden {
        display: table !important;
    }

    td.es-desk-menu-hidden {
        display: table-cell !important;
    }

    .es-menu td {
        width: 1% !important;
    }

    table.es-table-not-adapt,
    .esd-block-html table {
        width: auto !important;
    }

    table.es-social {
        display: inline-block !important;
    }

    table.es-social td {
        display: inline-block !important;
    }

    .es-m-p5 {
        padding: 5px !important;
    }

    .es-m-p5t {
        padding-top: 5px !important;
    }

    .es-m-p5b {
        padding-bottom: 5px !important;
    }

    .es-m-p5r {
        padding-right: 5px !important;
    }

    .es-m-p5l {
        padding-left: 5px !important;
    }

    .es-m-p10 {
        padding: 10px !important;
    }

    .es-m-p10t {
        padding-top: 10px !important;
    }

    .es-m-p10b {
        padding-bottom: 10px !important;
    }

    .es-m-p10r {
        padding-right: 10px !important;
    }

    .es-m-p10l {
        padding-left: 10px !important;
    }

    .es-m-p15 {
        padding: 15px !important;
    }

    .es-m-p15t {
        padding-top: 15px !important;
    }

    .es-m-p15b {
        padding-bottom: 15px !important;
    }

    .es-m-p15r {
        padding-right: 15px !important;
    }

    .es-m-p15l {
        padding-left: 15px !important;
    }

    .es-m-p20 {
        padding: 20px !important;
    }

    .es-m-p20t {
        padding-top: 20px !important;
    }

    .es-m-p20r {
        padding-right: 20px !important;
    }

    .es-m-p20l {
        padding-left: 20px !important;
    }

    .es-m-p25 {
        padding: 25px !important;
    }

    .es-m-p25t {
        padding-top: 25px !important;
    }

    .es-m-p25b {
        padding-bottom: 25px !important;
    }

    .es-m-p25r {
        padding-right: 25px !important;
    }

    .es-m-p25l {
        padding-left: 25px !important;
    }

    .es-m-p30 {
        padding: 30px !important;
    }

    .es-m-p30t {
        padding-top: 30px !important;
    }

    .es-m-p30b {
        padding-bottom: 30px !important;
    }

    .es-m-p30r {
        padding-right: 30px !important;
    }

    .es-m-p30l {
        padding-left: 30px !important;
    }

    .es-m-p35 {
        padding: 35px !important;
    }

    .es-m-p35t {
        padding-top: 35px !important;
    }

    .es-m-p35b {
        padding-bottom: 35px !important;
    }

    .es-m-p35r {
        padding-right: 35px !important;
    }

    .es-m-p35l {
        padding-left: 35px !important;
    }

    .es-m-p40 {
        padding: 40px !important;
    }

    .es-m-p40t {
        padding-top: 40px !important;
    }

    .es-m-p40b {
        padding-bottom: 40px !important;
    }

    .es-m-p40r {
        padding-right: 40px !important;
    }

    .es-m-p40l {
        padding-left: 40px !important;
    }
}

/* END RESPONSIVE STYLES */
html,
body {
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}
#snackbar {
  visibility: hidden;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
  font-family: Arial;
margin: auto;
  clear:both;
   min-width: 220px;
   margin: auto;

}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>
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
                                                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size: 0px;"><a target="_blank"><img src="https://uifjnj.stripocdn.email/content/guids/CABINET_91d375bbb7ce4a7f7b848a611a0368a7/images/69901618385469411.png" alt style="display: block;" width="100"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p15t es-p15b es-p40r es-p40l es-m-p0r es-m-p0l es-m-txt-c" esd-links-underline="none">
         
                                                                                       <h1><div id="newpass" onclick="cops()">$newpass</div></h1>
                                                                                       </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t">
                                                                                        <p style="font-size: 16px;">is your new system generated password. You can now login to your account using this new password.</p>
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
                                                    <td class="esd-structure es-p20b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px; border-collapse: separate;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b">
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
                        <table cellpadding="0" cellspacing="0" class="es-footer" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="388980">
                                        <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="left">
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
<div id="snackbar">Copied to clipboard.</div>
    <script>

document.getElementById("newpass").onclick = function() {
	copyToClipboard(document.getElementById("newpass"));
	
	 var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

}

function copyToClipboard(e) {
    var tempItem = document.createElement('input');

    tempItem.setAttribute('type','text');
    tempItem.setAttribute('display','none');
    
    let content = e;
    if (e instanceof HTMLElement) {
    		content = e.innerHTML;
    }
    
    tempItem.setAttribute('value',content);
    document.body.appendChild(tempItem);
    
    tempItem.select();
    document.execCommand('Copy');

    tempItem.parentElement.removeChild(tempItem);
}
</script>
</body>

</html>
NEW;

}
    
    
    }else{
              echo <<<EXP
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
<style>
a {text-decoration: none;}
img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
display: none;} 
/* CONFIG STYLES Please do not delete and edit CSS styles below */
/* IMPORTANT THIS STYLES MUST BE ON FINAL EMAIL */
#outlook a {
    padding: 0;
}

.es-button {
    mso-style-priority: 100 !important;
    text-decoration: none !important;
}

a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

.es-desk-hidden {
    display: none;
    float: left;
    overflow: hidden;
    width: 0;
    max-height: 0;
    line-height: 0;
    mso-hide: all;
}

[data-ogsb] .es-button {
    border-width: 0 !important;
    padding: 10px 30px 10px 30px !important;
}

/*
END OF IMPORTANT
*/
body {
    width: 100%;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
}

table {
    mso-table-lspace: 0pt;
    mso-table-rspace: 0pt;
    border-collapse: collapse;
    border-spacing: 0px;
}

table td,
body,
.es-wrapper {
    padding: 0;
    Margin: 0;
}

.es-content,
.es-header,
.es-footer {
    table-layout: fixed !important;
    width: 100%;
}

img {
    display: block;
    border: 0;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
}

p,
hr {
    Margin: 0;
}

h1,
h2,
h3,
h4,
h5 {
    Margin: 0;
    line-height: 120%;
    mso-line-height-rule: exactly;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}

p,
ul li,
ol li,
a {
    -webkit-text-size-adjust: none;
    -ms-text-size-adjust: none;
    mso-line-height-rule: exactly;
}

.es-left {
    float: left;
}

.es-right {
    float: right;
}

.es-p5 {
    padding: 5px;
}

.es-p5t {
    padding-top: 5px;
}

.es-p5b {
    padding-bottom: 5px;
}

.es-p5l {
    padding-left: 5px;
}

.es-p5r {
    padding-right: 5px;
}

.es-p10 {
    padding: 10px;
}

.es-p10t {
    padding-top: 10px;
}

.es-p10b {
    padding-bottom: 10px;
}

.es-p10l {
    padding-left: 10px;
}

.es-p10r {
    padding-right: 10px;
}

.es-p15 {
    padding: 15px;
}

.es-p15t {
    padding-top: 15px;
}

.es-p15b {
    padding-bottom: 15px;
}

.es-p15l {
    padding-left: 15px;
}

.es-p15r {
    padding-right: 15px;
}

.es-p20 {
    padding: 20px;
}

.es-p20t {
    padding-top: 20px;
}

.es-p20b {
    padding-bottom: 20px;
}

.es-p20l {
    padding-left: 20px;
}

.es-p20r {
    padding-right: 20px;
}

.es-p25 {
    padding: 25px;
}

.es-p25t {
    padding-top: 25px;
}

.es-p25b {
    padding-bottom: 25px;
}

.es-p25l {
    padding-left: 25px;
}

.es-p25r {
    padding-right: 25px;
}

.es-p30 {
    padding: 30px;
}

.es-p30t {
    padding-top: 30px;
}

.es-p30b {
    padding-bottom: 30px;
}

.es-p30l {
    padding-left: 30px;
}

.es-p30r {
    padding-right: 30px;
}

.es-p35 {
    padding: 35px;
}

.es-p35t {
    padding-top: 35px;
}

.es-p35b {
    padding-bottom: 35px;
}

.es-p35l {
    padding-left: 35px;
}

.es-p35r {
    padding-right: 35px;
}

.es-p40 {
    padding: 40px;
}

.es-p40t {
    padding-top: 40px;
}

.es-p40b {
    padding-bottom: 40px;
}

.es-p40l {
    padding-left: 40px;
}

.es-p40r {
    padding-right: 40px;
}

.es-menu td {
    border: 0;
}

.es-menu td a img {
    display: inline-block !important;
    vertical-align: middle;
}

/*
END CONFIG STYLES
*/
s {
    text-decoration: line-through;
}

p,
ul li,
ol li {
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    line-height: 150%;
}

ul li,
ol li {
    Margin-bottom: 15px;
}

a {
    text-decoration: underline;
}

.es-menu td a {
    text-decoration: none;
    display: block;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}

.es-wrapper {
    width: 100%;
    height: 100%;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
    background-color: #fafafa;
}

.es-wrapper-color {
    background-color: #fafafa;
}

.es-header {
    background-color: transparent;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
}

.es-header-body {
    background-color: transparent;
}

.es-header-body p,
.es-header-body ul li,
.es-header-body ol li {
    color: #333333;
    font-size: 14px;
}

.es-header-body a {
    color: #666666;
    font-size: 14px;
}

.es-content-body {
    background-color: #ffffff;
}

.es-content-body p,
.es-content-body ul li,
.es-content-body ol li {
    color: #333333;
    font-size: 14px;
}

.es-content-body a {
    color: #5c68e2;
    font-size: 14px;
}

.es-footer {
    background-color: transparent;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
}

.es-footer-body {
    background-color: #ffffff;
}

.es-footer-body p,
.es-footer-body ul li,
.es-footer-body ol li {
    color: #333333;
    font-size: 12px;
}

.es-footer-body a {
    color: #333333;
    font-size: 12px;
}

.es-infoblock,
.es-infoblock p,
.es-infoblock ul li,
.es-infoblock ol li {
    line-height: 120%;
    font-size: 12px;
    color: #cccccc;
}

.es-infoblock a {
    font-size: 12px;
    color: #cccccc;
}

h1 {
    font-size: 46px;
    font-style: normal;
    font-weight: bold;
    color: #333333;
}

h2 {
    font-size: 26px;
    font-style: normal;
    font-weight: bold;
    color: #333333;
}

h3 {
    font-size: 20px;
    font-style: normal;
    font-weight: bold;
    color: #333333;
}

.es-header-body h1 a,
.es-content-body h1 a,
.es-footer-body h1 a {
    font-size: 46px;
}

.es-header-body h2 a,
.es-content-body h2 a,
.es-footer-body h2 a {
    font-size: 26px;
}

.es-header-body h3 a,
.es-content-body h3 a,
.es-footer-body h3 a {
    font-size: 20px;
}

a.es-button,
button.es-button {
    border-style: solid;
    border-color: #5c68e2;
    border-width: 10px 30px 10px 30px;
    display: inline-block;
    background: #5c68e2;
    border-radius: 0px;
    font-size: 20px;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    font-weight: normal;
    font-style: normal;
    line-height: 120%;
    color: #ffffff;
    text-decoration: none;
    width: auto;
    text-align: center;
}

.es-button-border {
    border-style: solid solid solid solid;
    border-color: #2cb543 #2cb543 #2cb543 #2cb543;
    background: #5c68e2;
    border-width: 0px 0px 0px 0px;
    display: inline-block;
    border-radius: 0px;
    width: auto;
}

/* RESPONSIVE STYLES Please do not delete and edit CSS styles below. If you don't need responsive layout, please delete this section. */
@media only screen and (max-width: 600px) {

    p,
    ul li,
    ol li,
    a {
        line-height: 150% !important;
    }

    h1,
    h2,
    h3,
    h1 a,
    h2 a,
    h3 a {
        line-height: 120%;
    }

    h1 {
        font-size: 36px !important;
        text-align: left;
    }

    h2 {
        font-size: 26px !important;
        text-align: left;
    }

    h3 {
        font-size: 20px !important;
        text-align: left;
    }

    .es-header-body h1 a,
    .es-content-body h1 a,
    .es-footer-body h1 a {
        font-size: 36px !important;
        text-align: left;
    }

    .es-header-body h2 a,
    .es-content-body h2 a,
    .es-footer-body h2 a {
        font-size: 26px !important;
        text-align: left;
    }

    .es-header-body h3 a,
    .es-content-body h3 a,
    .es-footer-body h3 a {
        font-size: 20px !important;
        text-align: left;
    }

    .es-menu td a {
        font-size: 12px !important;
    }

    .es-header-body p,
    .es-header-body ul li,
    .es-header-body ol li,
    .es-header-body a {
        font-size: 14px !important;
    }

    .es-content-body p,
    .es-content-body ul li,
    .es-content-body ol li,
    .es-content-body a {
        font-size: 16px !important;
    }

    .es-footer-body p,
    .es-footer-body ul li,
    .es-footer-body ol li,
    .es-footer-body a {
        font-size: 14px !important;
    }

    .es-infoblock p,
    .es-infoblock ul li,
    .es-infoblock ol li,
    .es-infoblock a {
        font-size: 12px !important;
    }

    *[class="gmail-fix"] {
        display: none !important;
    }

    .es-m-txt-c,
    .es-m-txt-c h1,
    .es-m-txt-c h2,
    .es-m-txt-c h3 {
        text-align: center !important;
    }

    .es-m-txt-r,
    .es-m-txt-r h1,
    .es-m-txt-r h2,
    .es-m-txt-r h3 {
        text-align: right !important;
    }

    .es-m-txt-l,
    .es-m-txt-l h1,
    .es-m-txt-l h2,
    .es-m-txt-l h3 {
        text-align: left !important;
    }

    .es-m-txt-r img,
    .es-m-txt-c img,
    .es-m-txt-l img {
        display: inline !important;
    }

    .es-button-border {
        display: inline-block !important;
    }

    a.es-button,
    button.es-button {
        font-size: 20px !important;
        display: inline-block !important;
    }

    .es-adaptive table,
    .es-left,
    .es-right {
        width: 100% !important;
    }

    .es-content table,
    .es-header table,
    .es-footer table,
    .es-content,
    .es-footer,
    .es-header {
        width: 100% !important;
        max-width: 600px !important;
    }

    .es-adapt-td {
        display: block !important;
        width: 100% !important;
    }

    .adapt-img {
        width: 100% !important;
        height: auto !important;
    }

    .es-m-p0 {
        padding: 0 !important;
    }

    .es-m-p0r {
        padding-right: 0 !important;
    }

    .es-m-p0l {
        padding-left: 0 !important;
    }

    .es-m-p0t {
        padding-top: 0 !important;
    }

    .es-m-p0b {
        padding-bottom: 0 !important;
    }

    .es-m-p20b {
        padding-bottom: 20px !important;
    }

    .es-mobile-hidden,
    .es-hidden {
        display: none !important;
    }

    tr.es-desk-hidden,
    td.es-desk-hidden,
    table.es-desk-hidden {
        width: auto !important;
        overflow: visible !important;
        float: none !important;
        max-height: inherit !important;
        line-height: inherit !important;
    }

    tr.es-desk-hidden {
        display: table-row !important;
    }

    table.es-desk-hidden {
        display: table !important;
    }

    td.es-desk-menu-hidden {
        display: table-cell !important;
    }

    .es-menu td {
        width: 1% !important;
    }

    table.es-table-not-adapt,
    .esd-block-html table {
        width: auto !important;
    }

    table.es-social {
        display: inline-block !important;
    }

    table.es-social td {
        display: inline-block !important;
    }

    .es-m-p5 {
        padding: 5px !important;
    }

    .es-m-p5t {
        padding-top: 5px !important;
    }

    .es-m-p5b {
        padding-bottom: 5px !important;
    }

    .es-m-p5r {
        padding-right: 5px !important;
    }

    .es-m-p5l {
        padding-left: 5px !important;
    }

    .es-m-p10 {
        padding: 10px !important;
    }

    .es-m-p10t {
        padding-top: 10px !important;
    }

    .es-m-p10b {
        padding-bottom: 10px !important;
    }

    .es-m-p10r {
        padding-right: 10px !important;
    }

    .es-m-p10l {
        padding-left: 10px !important;
    }

    .es-m-p15 {
        padding: 15px !important;
    }

    .es-m-p15t {
        padding-top: 15px !important;
    }

    .es-m-p15b {
        padding-bottom: 15px !important;
    }

    .es-m-p15r {
        padding-right: 15px !important;
    }

    .es-m-p15l {
        padding-left: 15px !important;
    }

    .es-m-p20 {
        padding: 20px !important;
    }

    .es-m-p20t {
        padding-top: 20px !important;
    }

    .es-m-p20r {
        padding-right: 20px !important;
    }

    .es-m-p20l {
        padding-left: 20px !important;
    }

    .es-m-p25 {
        padding: 25px !important;
    }

    .es-m-p25t {
        padding-top: 25px !important;
    }

    .es-m-p25b {
        padding-bottom: 25px !important;
    }

    .es-m-p25r {
        padding-right: 25px !important;
    }

    .es-m-p25l {
        padding-left: 25px !important;
    }

    .es-m-p30 {
        padding: 30px !important;
    }

    .es-m-p30t {
        padding-top: 30px !important;
    }

    .es-m-p30b {
        padding-bottom: 30px !important;
    }

    .es-m-p30r {
        padding-right: 30px !important;
    }

    .es-m-p30l {
        padding-left: 30px !important;
    }

    .es-m-p35 {
        padding: 35px !important;
    }

    .es-m-p35t {
        padding-top: 35px !important;
    }

    .es-m-p35b {
        padding-bottom: 35px !important;
    }

    .es-m-p35r {
        padding-right: 35px !important;
    }

    .es-m-p35l {
        padding-left: 35px !important;
    }

    .es-m-p40 {
        padding: 40px !important;
    }

    .es-m-p40t {
        padding-top: 40px !important;
    }

    .es-m-p40b {
        padding-bottom: 40px !important;
    }

    .es-m-p40r {
        padding-right: 40px !important;
    }

    .es-m-p40l {
        padding-left: 40px !important;
    }
}

/* END RESPONSIVE STYLES */
html,
body {
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}
</style>
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
                                                                                    <td align="center" class="esd-block-text es-p10t es-p5b">
                                                                                        <p>The link you are following have already expired.</p>
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
EXP;
    } 
    
}
?>