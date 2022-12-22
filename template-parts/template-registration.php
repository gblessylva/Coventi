<?php
/**
 * Template Name: Registration Page
 * Template Post Type: page
 *
 *  
 * */

require_once(dirname(__DIR__) . '/vendor/autoload.php');

# Send the user to his account or any page if already logged in.
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


# Get login error messages.
$errors = array();
// $errors = (isset($_GET['user-register']) ) ? $_GET['user-register'] : 0;     
if ( $_POST['action'] == 'register' ) {
    // Sanitize user input.
    $username = strstr($email, '@', true);  
    $email = sanitize_email( $_POST['user-name'] );
    $password = sanitize_text_field( $_POST['password'] );
    $full_name = sanitize_text_field( $_POST['fullname'] );
    $phone = sanitize_text_field( $_POST['phone_number'] );

    // Validate inputs.
    if( empty( $username ) ) {
        $errors['username'] = 'Username is required.';
    }
    if( empty( $email ) ) {
        $errors['email'] = 'Email is required.';
    }
    if( empty( $password ) ) {
        $errors['password'] = 'Password is required.';
    }
    // check if password is less than 6 characters
    if( strlen( $password ) < 6 ) {
        $errors['password'] = 'Password must be at least 6 characters.';
    }
    // chek password to require number, capital letter, and special character and minimum of 6 characters
    if( !preg_match( '/^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]){6,}/', $password ) ) {
        $errors['password'] = 'Password must contain at least one number, one uppercase letter, and one special character.';
    }
    
    if( empty( $full_name ) ) {
        $errors['full_name'] = 'Full name is required.';
    }
    if( empty( $phone ) ) {
        $errors['phone_number'] = 'Phone number is required.';
    }
    // check if phone number is valid
    if( !preg_match( '/^[0-9]{11}$/', $phone ) ) {
        $errors['phone_number'] = 'Phone number must be 11 digits.';
    }
    // check if email is valid
    if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        $errors['email'] = 'Email is not valid.';
    }
    // check if username is already taken
    if( username_exists( $username ) ) {
        $errors['username'] = 'Username is already taken.';
    }
    // check if email is already taken
    if( email_exists( $email ) ) {
        $errors['email'] = 'Email is already taken.';
    }
    // check if there are any errors
    if( !empty( $errors ) ) {
        $errors[] = "There were errors with your submission.";
    } else {
        // create user
        $user_id = wp_create_user( $username, $password, $email );
        // set user role
        $user = new WP_User( $user_id );
        $user->set_role( 'subscriber' );
         //  Set user meta as unverified

         update_user_meta( $user_id, 'user_status', 'unverified' );

         //  Generate a random string for the verification code.
         $verification_code = wp_generate_password( 10, false );
         //  Set the verification code for the user.
         update_user_meta( $user_id, 'verification_code', $verification_code );
        //  Generate token.
        // set token in session



        $token = wp_generate_password( 20, false );
        

        // set user meta
        // Copy first name and last name to user meta
        $names = explode( ' ', $full_name );
        $first_name = $names[0];
        $last_name = $names[1];
        update_user_meta( $user_id, 'first_name', $first_name );
        update_user_meta( $user_id, 'last_name', $last_name );
        update_user_meta( $user_id, 'phone_number', $phone );
        // send email
        $to = $email;
        $subject = 'Your account has been verified';
        $message = '<p> Dear '.$first_name.',</p>';
        $message = '<p>Your account has been verified. You can now login to your account.</p>';
        $message .= '<p>You can login to your account by visiting <a href="'.home_url().'/login">'.home_url().'/login</a>.</p>';
        $message .= '<p>Thank you,</p>';
        $message .= '<p>The Coventi Team</p>';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail( $to, $subject, $message, $headers );
        // Redirect to login page
        wp_clear_auth_cookie();
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id); 
        wp_safe_redirect('/user-dashboard');
       
        // redirect to login page
        // wp_redirect( home_url('/registration/email-verification/?user='.$user_id.'&tk='.$token) );
        exit;
    }


  
   
  
      
}
     

get_header();
   
?>

<div id="content" role="main" class = "user-register" >   
    <div class="container">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="card coventi-card">
        <div class="card-body coventi-form">
                
            <h2 class="page-title"><?php the_title(); ?></h2>
            
            <!-- Error messgae container -->
                <?php 
                     foreach( $errors as $error ) {
                        echo '<div class="alert alert-danger" role="alert" id="error-message"> <p>' . $error . '</p>  </div>';
                    }
                ?>
            <div class="d-grid">
                    <?php 

                    echo "<a class='google-login-button' href='".$client->createAuthUrl()."'><img src='".get_template_directory_uri()."/assets/img/google.svg'>Continue with Google</a>"; ?>
                </div>
                <br>
                <p style="text-align:center">OR</p>
                
            <form action="<?php the_permalink(); ?>" method="post" class="register">
                 
                <div class="mb-3 form-wrapper"> 
                    <label  class="form-label" for="fullname"><?php _e('Full Name'); ?></label>
                    <input type="text"class="form-control" placeholder="John Doe"
                        name="fullname" id="fullname" value="<?php echo (isset($_POST['fullname'])) ? $_POST['fullname'] : ''; ?>" />
                </div>
                <div class="divider"></div>

                <div class="mb-3 form-wrapper">
                    <label  class="form-label" for="phone_number"><?php _e('Phone Number'); ?></label>
                    <input type="text"class="form-control" placeholder="e.g 08031234567"
                        name="phone_number" id="phone_number" value="<?php echo (isset($_POST['phone_number'])) ? $_POST['phone_number'] : ''; ?>" />
                </div>
                <div class="divider"></div>

                <div class="mb-3 form-wrapper">
                    <label  class="form-label" for="user-name"><?php _e('Email Address'); ?></label>
                    <input type="text"class="form-control" placeholder="e.g johndoe@gmail.com" 
                        name="user-name" id="user-name" 
                        value="" />
                </div>
                <div class="divider"></div>
                <div class="mb-3 form-wrapper">
                    <label for="password" class="form-label"><?php _e('Password'); ?></label>
                    <input type="password" class="form-control" name="password" id="password" />
                    <i class="bi bi-eye-slash" id="eye"></i>
                </div>
                <div class="divider-40"></div>
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="<?php _e('Submit'); ?>"  />
                    <input type="hidden" name="action" value="register" />
                </div>  <br/> 
                <div class="d-grid gap-2">
                    <a href="login" class="btn btn-link"><?php _e('Login'); ?></a>
                </div>
                <br/>

                <div class="d-grid gap-2">
                    <?php 

                    echo "<a class='google-login-button' href='".$client->createAuthUrl()."'><img src='".get_template_directory_uri()."/assets/img/google.svg'>Continue with Google</a>"; ?>
                </div>
            </form>
        </div>
        </div>
        
        
    </div>
    <?php endwhile; ?>
   
</div>

<?php get_footer(); ?>