<?php
//////////////////////////////////////////////
//DUC LINH - haanhduclinh.com
//BASIC FACEBOOK
//////////////////////////////////////////////
ini_set('display_errors', 'on');
session_start();
use Facebook\Facebook;
// require Facebook PHP SDK
// see: https://developers.facebook.com/docs/php/gettingstarted/
require_once("Facebook/Facebook.php");
require_once 'Facebook/autoload.php';
// initialize Facebook class using your own Facebook App credentials
// see: https://developers.facebook.com/docs/php/gettingstarted/#install
 
$fb = new Facebook([
    'app_id' => '459792177717990', // APP ID
    'app_secret' => '18199cc2064ec54bba71e776941247b1',//SECRET
    'default_graph_version' => 'v2.5',
]);
//$appsecret_proof= hash_hmac('sha256', $access_token, $app_secret);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes','publish_actions','user_photos','user_relationships','user_birthday']; // optional
$loginUrl = $helper->getLoginUrl('https://qoffice.herokuapp.com/callback.php', $permissions);//Change YOUR_URL to your URL CALLBACK FILE

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

if (isset($_SESSION['facebook_access_token'])){
	echo $_SESSION['facebook_access_token'];
}
?>
