<?php
/**
 * Template Name: User Profile Page
 * Template Post Type: page
 *
 *  
 * */

    if(!is_user_logged_in()){
        wp_redirect( home_url('/login') );
        exit;
    }
    get_header('dashboard');
?>
 <main id="main" class="site-main" >
 <div class="container-fluid">
        <?php
            //Get Dashboard sidebar 
            get_template_part( 'template-parts/dashboard-sidebar' );
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;
			$username = $current_user->display_name;
			$lastname = $current_user->last_name;
			$first_name = $current_user->first_name;
            $email = $current_user->user_email;
            $phone_number = get_user_meta($user_id, 'phone_number', true);
            $password = $current_user->user_pass;
            $state = get_user_meta($user_id, 'state', true);
            $message="";
            // var_dump($current_user);
        ?>
        <div class="col py-3">
            <div class="profile-page-container">
                <div class="profile-header">
                    <?php _e('<h2> Profile </h2>')
                    ?>
                </div>

                
                <form class="profile-form-wrapper" action="/user-dashboard/profile" method="post" >
                    <div class="form-control-wrapper">
                        <div class="form-container">
                            <label for="first-name" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first-name" value=<?php _e($first_name) ?> />
                        </div>
                        <div class="form-container">
                            <label for="last-name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last-name" value=<?php _e($lastname) ?> />
                        </div>
                    </div>
                    <div class="form-control-wrapper">
                        <div class="form-container">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" name="email" class="form-control" id="email" value=<?php _e($email) ?> />
                        </div>
                        <div class="form-container">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number" value=<?php _e($phone_number) ?> />
                        </div>
                    </div>
                    <div class="form-control-wrapper">
                        <div class="form-container">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value=<?php _e($password) ?> />
                        </div>
                        <div class="form-container">
                            <label for="state" class="form-label">State</label>
                            <input type="text" name="state" class="form-control" id="state" value=<?php _e($state) ?> />
                        </div>
                    </div>
                    <div class="form-control-wrapper">
                            <input class="btn-update" name="update" type="submit" value="Update">
                            <input type="hidden" name="action" value="update" />
                    </div>
                </form>
            </div>  
        
        
        </div>
    </div>
</div>

<?php 
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email( $_POST['email'] );
    $password = sanitize_text_field( $_POST['password'] );
    $phone_number = sanitize_text_field( $_POST['phone_number'] );
    $state = sanitize_text_field( $_POST['state'] );

  if ( $_POST['action'] == 'update' ) {
    $user = wp_get_current_user();
    $uid= $user->ID;
    $uname = wp_update_user(
        array(
            "ID"=> $uid,
            'last_name'=> $last_name
        )
        );
    $u_first= wp_update_user(
        array(
            "ID"=> $uid,
            'first_name'=> $first_name
        )
        );
    $u_email = wp_update_user(
        array(
            "ID"=> $uid,
            'email'=> $email
        )
        );
    $u_phone = update_user_meta($uid, 'phone_number', $phone_number);
    $u_state= update_user_meta($uid, 'state', $state);
       
   
  }
?>

</main><!-- #main -->

<?php
get_footer();