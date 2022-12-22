<?php
/**
 * Template Name: Resend Activation Code
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



// $errors = (isset($_GET['user-resend-code']) ) ? $_GET['user-resend-code'] : 0;     
if ( $_POST['action'] == 'resend-code' ) {
    // Sanitize user input.
    $email = sanitize_text_field( $_POST['email'] );  

    // Check if user email exists
    $user = get_user_by( 'email', $email );

    if( $user ) {
        // Get user meta
        $user_meta = get_user_meta( $user->ID, 'verification_code', true );
        // Check if user meta matches verification code
        if( $user_meta ) {
            // Send Verified Email to User
            $to = $user->user_email;
            $subject = 'Your account activation code';
            $message = '<p> Dear '.$user->user_login.',</p>';
            $message .= '<p>Your account activation code is: '.$user_meta.'</p>';
            $message .= '<p>You can login to your account by visiting <a href="'.home_url().'/login">'.home_url().'/login</a>.</p>';
            $message .= '<p>Thank you,</p>';
            $message .= '<p>The Coventi Streaming Team</p>';
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail( $to, $subject, $message, $headers );
            // Redirect to login page
            $errors['success'] = 'Activation code has been sent to your email.';
        } else {
            $errors['success'] = 'Activation code has been sent to email if it exists.';
        }
    } else {
        $errors['success'] = 'Activation code has been sent to email if it exists.';
    }
  
      
}
     
get_header();
   
?>

<div id="content" role="main" class = "user-resend-code" >   
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
            
            <form action="<?php the_permalink(); ?>" method="post" class="resend-code">
                <div class="mb-3 form-wrapper"> 
                    <label  class="form-label" for="email"><?php _e('Enter your registered email'); ?></label>
                    <input type="text"class="form-control" placeholder="johndoe@gmail.com"
                        name="email" id="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" />
                </div>

               
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="<?php _e('Resend Code'); ?>"  />
                    <input type="hidden" name="action" value="resend-code" />
                </div>   
               
                 
            </form>
        </div>
        </div>
        
        
    </div>
    <?php endwhile; ?>
   
</div>

<?php get_footer(); ?>