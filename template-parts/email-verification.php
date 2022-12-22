<?php
/**
 * Template Name: Email Verification Page
 * Template Post Type: page
 *
 *  
 * */

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

# Get login error messages.
$errors = array();
// Get user params from URL
// $user_id = (isset($_GET['user']) ) ? $_GET['user'] : 0;
$token = (isset($_GET['tk']) ) ? $_GET['tk'] : 0;



// $errors = (isset($_GET['user-verify_user']) ) ? $_GET['user-verify_user'] : 0;     
if ( $_POST['action'] == 'verify_user' ) {
    // Sanitize user input.
    $verification_code = sanitize_text_field( $_POST['verification_code'] );  
   
    // Get user by ID
    $user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
    $user = get_user_by( 'id', $user_id );
    $user_meta = get_user_meta( $user_id, 'verification_code', true );
    
    // Get user meta
    
    // Check if user meta matches verification code
  
    
    if( $user_meta == $verification_code ) {

        // Update user meta
        update_user_meta( $user_id, 'user_status', 'verified' );
        // Send Verified Email to User

        $to = $user->user_email;
        $subject = 'Your account has been verified';
        $message = '<p> Dear '.$user->user_login.',</p>';
        $message = '<p>Your account has been verified. You can now login to your account.</p>';
        $message .= '<p>You can login to your account by visiting <a href="'.home_url().'/login">'.home_url().'/login</a>.</p>';
        $message .= '<p>Thank you,</p>';
        $message .= '<p>The Coventi Streaming Team</p>';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail( $to, $subject, $message, $headers );
        // Redirect to login page
        wp_clear_auth_cookie();
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id); 
        wp_safe_redirect('/user-dashboard');

        // wp_redirect( home_url('/user-dashboard') );
        exit;
    } else {
        $errors['verification_code'] = 'Verification code is incorrect.';
    }
      
}
     
get_header();
   
?>

<div id="content" role="main" class = "user-verify_user" >   
    <div class="container">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="card coventi-card">
        <div class="card-body coventi-form">
            <h2 class="page-title"><?php the_title(); ?></h2>
            <p> We have sent you an email with a verification code. Please enter the verification code bellow and click verify </p>
            
            <!-- Error messgae container -->
                <?php 
                     foreach( $errors as $error ) {
                        echo '<div class="alert alert-danger" role="alert" id="error-message"> <p>' . $error . '</p>  </div>';

                        
                    }
                ?>
            
            <form action="<?php the_permalink(); ?>" method="post" class="verify_user">
                <div class="mb-3 form-wrapper"> 
                    <label  class="form-label" for="verification_code"><?php _e('Veirification Code'); ?></label>
                    <input type="text"class="form-control" placeholder="VERIFICATION"
                        name="verification_code" id="verification_code" value="<?php echo (isset($_POST['verification_code'])) ? $_POST['verification_code'] : ''; ?>" />
                </div>
                <!-- Hidden input for user_id -->
                <input type="hidden" name="user_id" value="<?php echo (isset($_GET['user']) ) ? $_GET['user'] : 0;  ?>">
                <div class="divider"></div>

               
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="<?php _e('Verify Me'); ?>"  />
                    <input type="hidden" name="action" value="verify_user" />
                </div>   
               <br/>
               <br/>
            
                <div class="d-grid gap-6">
                        <!-- Resend Activation Code -->
                        <a href="<?php echo home_url('/registration/resend-activation-code'); ?>" >Resend Activation Code</a>
                </div> 
            </form>
        </div>
        </div>
        
        
    </div>
    <?php endwhile; ?>
   
</div>

<?php get_footer(); ?>