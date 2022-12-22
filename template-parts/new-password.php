<?php
/**
 * Template Name: Reset Password
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

 // Get user id from user param

// $errors = (isset($_GET['user-reset-password']) ) ? $_GET['user-reset-password'] : 0;     
if ( $_POST['action'] == 'reset-password' ) {
    // Sanitize user input.
    $password = sanitize_text_field( $_POST['password'] );
    $password_confirm = sanitize_text_field( $_POST['confirm-password'] );
    $user_id = sanitize_text_field( $_POST['user'] );
    $token = sanitize_text_field( $_POST['tk'] );
    
    // check if password and password_confirm match
    if( $password != $password_confirm ) {
        $errors['confirm-password'] = 'Password and confirm password do not match.';
       
    }
    // check if password is less than 6 characters, contains number, capital letter, and special character and minimum of 6 characters
    if( strlen( $password ) < 6 ) {
        $errors['password'] = 'Password must be at least 6 characters.';
    
    } 
    if( !preg_match( '/^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]){6,}/', $password ) ) {
        $errors['password'] = 'Password must contain at least one number, one uppercase letter, and one special character.';
        
    }

//    Check if user ID exist
    if( $user_id == 0 ) {
        $errors['user'] = 'User ID is required.';
    }
    // Get user byu user ID
    $user = get_user_by( 'id', $user_id );
    if( $user ) {
        // Check if user meta matches verification code
        $user_meta = get_user_meta( $user_id, 'reset-code', true );
        if( $user_meta == $token ) {
            // Update user password
            wp_set_password( $password, $user_id );
            // Send reset password email
            $user = get_user_by( $_POST['user'], $user_id );
            $user_email = $user->user_email;
            $user_name = $user->user_login;
            $subject = 'Password Reset';
            $message = 'Hi ' . $user_name ;
            $message = 'Your password has been reset. You can now login with your new password.';
            $message = 'Click here to login: ' . home_url('/login');
            $message = 'Coventi Streaming';
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail( $user_email, $subject, $message, $headers );

            // Remove user meta
            delete_user_meta( $user_id, 'reset-code' );
            // Redirect to login page
            $errors['success'] = 'Password has been changed. You will be redirected to login page after 5 seconds';

            // Redirect to login page after 5 seconds using jquery
            ?>
            <script>
                setTimeout(function(){
                    window.location.href = "<?php echo home_url('/login'); ?>";
                }, 5000);
            </script>
            <?php

        } else {
            $errors['error'] = 'Invalid token.';
        }
    } else {
        $errors['error'] = 'Invalid user.';
    }
  
      
}
     
get_header();
   
?>

<div id="content" role="main" class = "user-reset-password" >   
    <div class="container">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="card coventi-card">
        <div class="card-body coventi-form">
            <h2 class="page-title"><?php the_title(); ?></h2>
            
            <!-- Error messgae container -->
                <?php 
                     foreach( $errors as $error ) {
                        echo '<div class="alert alert-success" role="alert" id="error-message"> <p>' . $error . '</p>  </div>';

                       
                    }
                ?>
            
            <form action="<?php the_permalink(); ?>" method="post" class="reset-password">
                 <div class="mb-3 form-wrapper">
                    <label for="password" class="form-label"><?php _e('Select New Password '); ?></label>
                    <input type="password" class="form-control" name="password" id="password" />
                    <i class="bi bi-eye-slash" id="eye"></i>
                </div>
                <!-- Add field for confirm password -->
                <div class="mb-3 form-wrapper">
                    <label for="confirm-password" class="form-label"><?php _e('Confirm Password'); ?></label>
                    <input type="password" class="form-control" name="confirm-password" id="confirm-password" />
                </div>
                <div class="mb-3 form-wrapper">
                    <input type="hidden" name="user" value="<?php echo (isset($_GET['user']) ) ? $_GET['user'] : 0; ?>" />
                    <input type="hidden" name="tk" value="<?php echo (isset($_GET['tk']) ) ? $_GET['tk'] : 0; ?>" />
                </div>
               
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="<?php _e('Reset Password'); ?>"  />
                    <input type="hidden" name="action" value="reset-password" />
                </div>   
               
                 
            </form>
        </div>
        </div>
        
        
    </div>
    <?php endwhile; ?>
   
</div>

<?php get_footer(); ?>