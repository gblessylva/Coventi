<?php
require_once(dirname(__DIR__) . '/vendor/autoload.php');
function get_google_account(){
$clientID = '826978232457-eko7obg6cso8ngkieovlb6f5t1f0i2d0.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = get_home_url().'/login'; 
   
// create Client Request to access Google API
$client = new Google_Client();
$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
$client->setHttpClient($guzzleClient);
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

$email;
$first_name;
$last_name;
$avatar;

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
     
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    // $first_name =  $google_account_info->given_name;
    $last_name   = $google_account_info->family_name;
    $avatar = $google_account_info->picture;
    $first_name = 'Hello';
    
   
}
 $account = array(
        'client'=>$client,
        'google_account_info'=> array(
            'name'=>$first_name
        )
    );

    return $account;

}
