<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '259957126008-ghgau690g214q6nk09citk5bjk56b2ed.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'Xx89RxAu_aoGYOEJAF-IQTjm'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/google/login-with-google-using-php';  //return url (url to script)
$homeUrl = 'http://localhost/google/login-with-google-using-php';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to codexworld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>