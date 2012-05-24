<h1>Facebook SDK Login - Status Update Online</h1>
<h4><a href='http://9lessons.info'>9lessons.info</a></h4>
<?php
include('../db.php');
require 'lib/facebook.php';
require 'lib/fbconfig.php';

// Connection...
$user = $facebook->getUser();
if ($user)
 {
 $logoutUrl = $facebook->getLogoutUrl();
 try {
 $userdata = $facebook->api('/me');
 } catch (FacebookApiException $e) {
error_log($e);
$user = null;
 }
$_SESSION['facebook']=$_SESSION;
$_SESSION['userdata'] = $userdata;
$_SESSION['logout'] =  $logoutUrl;
header("Location: home.php");
}
else
{ 
$loginUrl = $facebook->getLoginUrl(array( 'scope' => 'email,user_birthday,status_update'));
echo '<a href="'.$loginUrl.'"><img src="facebook.png" title="Login with Facebook" /></a>';
 }
 ?>
