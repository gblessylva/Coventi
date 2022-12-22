<?php
/**
 * Template Name: Login Page
 * Template Post Type: page
 *
 *  
 * */

# Send the user to his account or any page if already logged in.
require_once(dirname(__DIR__) . '/vendor/autoload.php');
require_once get_template_directory() . '/core/class_sign_in_google.php';
use Coventi_Google_Signon as Coventi_Google;
$sign_on = new Coventi_Google;




// require_once '/core/load-files.php';

if ( is_user_logged_in() ) {
    // Check if user role is admin
    if ( current_user_can( 'administrator' ) ) {
        wp_redirect( admin_url() );
        exit;
    } else {
        wp_redirect( home_url('/user-dashboard') );
        exit;
    }
    
}

# Get login error messages.
$login_errors = (isset($_GET['user-login']) ) ? $_GET['user-login'] : 0;     
   
if ( $_POST['action'] == 'log-in' ) {
   
    # Submit the user login inputs
    $login = wp_login( $_POST['user-name'], $_POST['password'] );
    $login = wp_signon( array( 'user_login' => $_POST['user-name'], 'user_password' => $_POST['password'], 'remember' => $_POST['remember-me'] ), false );
       
    # Redirect to account page after successful login.
    if ( $login->ID ) {
        // Check if user has been verified

        wp_redirect( home_url('/user-dashboard') );
       
              
    }  
}


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
  
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
   
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $first_name =  $google_account_info->given_name;
  $last_name   = $google_account_info->family_name;
  $avatar = $google_account_info->picture;
//   var_dump($google_account_info);

// $sign_on->create_new_user($email, $name);
    // check if email exists

    if(email_exists($email)){
        // Login in if exists
        $user = get_user_by_email($email);
        if($user){           
                wp_clear_auth_cookie();
                wp_set_current_user($user->data->ID);
                wp_set_auth_cookie($user->data->ID); 
                wp_safe_redirect('/user-dashboard');

        }else{


        }
        

    }else{
        $sign_on->create_new_user($email, $first_name, $last_name, $avatar);
    }
  
  // now you can use this profile info to create account in your website and make user logged in.
}

     
get_header();


   
?>

<div id="content" role="main" class = "user-login" >   
    <div class="container">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php
            # Output header error messages.
            if ( $login_errors === "failed" ) {  
                echo '<p class="input-error">Invalid username and / or password.</p>';  
            } elseif ( $login_errors === "empty" ) {  
                echo '<p class="input-error">Username and/or Password is empty.</p>';  
            } elseif ( $login_errors === "false" ) {  
                echo '<p class="input-error">You are now logged out.</p>';  
            }
        ?>
        <div class="card coventi-card">
            <div class="card-body coventi-form">
                <h2 class="page-title"><?php the_title(); ?></h2>
                <form action="<?php the_permalink(); ?>" method="post" class="sign-in">
                <?php  echo "<a class='google-login-button' href='".$client->createAuthUrl()."'><img src='".get_template_directory_uri()."/assets/img/google.svg'>Continue with Google</a>";
?>
                    <br>
                    <p style="text-align:center">OR</p>
                    <div class="mb-3 form-wrapper">
                        <label  class="form-label" for="user-name"><?php _e('Email Address'); ?></label>
                        <input type="text"class="form-control" placeholder="e.g johndoe@gmail.com" 
                            name="user-name" id="user-name" 
                            value="" />
                    <div>
                    <div class="divider"></div>
                    <div class="mb-3 form-wrapper">
                        <label for="password" class="form-label"><?php _e('Password'); ?></label>
                        <input type="password" class="form-control" name="password" id="password" />
                        <i class="bi bi-eye-slash" id="eye"></i>
                    </div>
                    <div class="divider-40"></div>
                
                    <div class="d-grid gap-2">

                        <input type="submit" class="btn btn-primary" name="submit" value="<?php _e('Login'); ?>"  />
                        <input type="hidden" name="action" value="log-in" />
                    </div>   
                    <div class="d-grid gap-2">
                        <a href="/login/reset-password" style="text-align:center; margin-top:20px;" class="btn btn-link"><?php _e('Forgot Password?'); ?></a>
                        <br/><br/>
                        <span style="text-align:center; margin-top:10px;"> Don't have an account? </span>
                        <a href="registration" class="btn btn-link"><span> </span><?php _e('Register'); ?></a>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>


</div>

   
    <?php endwhile; ?>
   
</div>

<?php get_footer(); ?>