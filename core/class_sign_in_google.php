<?php

class Coventi_Google_Signon{
    public $email;
    public $first_name;
    public $last_name;
    public $avatar;

    
    
    public function create_new_user($email, $first_name, $last_name, $avatar){

        // Generate password
        $username =  strstr($email, '@', true);
        $password = wp_generate_password(16, true, true);
        $user_id = wp_create_user( $username, $password, $email );

        if($user_id){
            $user = new WP_User( $user_id );
            $user->set_role( 'subscriber' );
            update_user_meta( $user_id, 'user_status', 'unverified' );
            $verification_code = wp_generate_password( 10, false );
            update_user_meta( $user_id, 'verification_code', $verification_code );
            $token = wp_generate_password( 20, false );
            update_user_meta( $user_id, 'first_name', $first_name );
            update_user_meta( $user_id, 'last_name', $last_name );
            update_usermeta( $user_id, 'author_pic', $avatar );

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
            exit;


        }

        // $user = wp_create_user($username, $password, $email);
        // var_dump($username);
    }
}