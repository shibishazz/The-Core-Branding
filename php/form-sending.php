<?php
$my_email = "salesthecore@gmail.com";
$continue = "salesthecore@gmail.com";
$errors = array();
// Remove $_COOKIE elements from $_REQUEST.
if(count($_COOKIE)){foreach(array_keys($_COOKIE) as $value){unset($_REQUEST[$value]);}}
// Check all fields for an email header.
function recursive_array_check_header($element_value)
{
global $set;
if(!is_array($element_value)){if(preg_match("/(%0A|%0D|\n+|\r+)(content-type:|to:|cc:|bcc:)/i",$element_value)){$set = 1;}}
else
{
foreach($element_value as $value){if($set){break;} recursive_array_check_header($value);}
}
}
recursive_array_check_header($_REQUEST);
if($set){$errors[] = "You cannot send an email header";}
unset($set);
// Validate email field.
if(isset($_REQUEST['email']) && !empty($_REQUEST['email']))
{
if(preg_match("/(%0A|%0D|\n+|\r+|:)/i",$_REQUEST['email'])){$errors[] = "Email address may not contain a new line or a colon";}
$_REQUEST['email'] = trim($_REQUEST['email']);
if(substr_count($_REQUEST['email'],"@") != 1 || stristr($_REQUEST['email']," ")){$errors[] = "Email address is invalid";}else{$exploded_email = explode("@",$_REQUEST['email']);if(empty($exploded_email[0]) || strlen($exploded_email[0]) > 64 || empty($exploded_email[1])){$errors[] = "Email address is invalid";}else{if(substr_count($exploded_email[1],".") == 0){$errors[] = "Email address is invalid";}else{$exploded_domain = explode(".",$exploded_email[1]);if(in_array("",$exploded_domain)){$errors[] = "Email address is invalid";}else{foreach($exploded_domain as $value){if(strlen($value) > 63 || !preg_match('/^[a-z0-9-]+$/i',$value)){$errors[] = "Email address is invalid"; break;}}}}}}
}
// Check referrer is from same site.
if(!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']))){$errors[] = "You must enable referrer logging to use the form";}
// Check for a blank form.
function recursive_array_check_blank($element_value)
{
global $set;
if(!is_array($element_value)){if(!empty($element_value)){$set = 1;}}
else
{
foreach($element_value as $value){if($set){break;} recursive_array_check_blank($value);}
}
}
recursive_array_check_blank($_REQUEST);
if(!$set){$errors[] = "You cannot send a blank form";}
unset($set);
// Display any errors and exit if errors exist.
if(count($errors)){foreach($errors as $value){print "$value<br>";} exit;}
if(!defined("PHP_EOL")){define("PHP_EOL", strtoupper(substr(PHP_OS,0,3) == "WIN") ? "\r\n" : "\n");}
// Build message.
function build_message($request_input){if(!isset($message_output)){$message_output ="";}if(!is_array($request_input)){$message_output = $request_input;}else{foreach($request_input as $key => $value){if(!empty($value)){if(!is_numeric($key)){$message_output .= str_replace("_"," ",ucfirst($key)).": ".build_message($value).PHP_EOL.PHP_EOL;}else{$message_output .= build_message($value).", ";}}}}return rtrim($message_output,", ");}
$message = build_message($_REQUEST);
$message = $message . PHP_EOL.PHP_EOL."-- ".PHP_EOL."";
$message = stripslashes($message);
$subject = "THE CORE ENQUIRY MESSAGE";
$headers = "From: " . $_REQUEST['Name'];
mail($my_email,$subject,$message,$headers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FORM SENDING</title>
<link rel="icon" href="../images/favicon.png" type="image/gif">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.container { width: 300px; text-align: center; font-family: 'Roboto', sans-serif; color: #1d1d1d; padding-top: 50px; padding-bottom: 50px; margin: auto; }
.container a { font-weight: 600; font-size: 13px; color: #000; font-family: 'Roboto', sans-serif; margin-top: 40px; padding: 10px 15px; text-decoration: none; font-family: 'Montserrat', sans-serif; border: 2px solid #000; }
img { display: block; margin-left: auto; margin-right: auto; margin-bottom: -30px; height: 60px;}
.container h4 { font-size: 15px; font-weight: 400; margin-bottom: 40px; line-height: 28px; }
.container h3 { font-weight: 600 }
.container a:hover, .container a:focus { background-color: #000; color : #fff }
</style>
</head>

<body>
<div class="container"><img src="../images/main-logo.svg">
  <h3 style="padding-top: 25px;">Thank you</h3>
  <h4>Your mail has been sent. Thank you for reaching regarding. We truly appreciate your interest and the opportunity to assist you.</h4>
  <a href="../index.php" target="_self">BACK TO HOME</a> </div>
</body>
</html>