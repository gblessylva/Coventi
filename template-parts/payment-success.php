<?php
/*
 * Template Name: Payment Success Page
 * Template Post Type: page
 */

//  Redirect to login  if user is not logged in.
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url('/login') );
    exit;
}
include_once get_template_directory() . '/core/function_add_user_payment_details.php';
$ref = $_GET['reference'];
if( !$ref ){
    wp_redirect( home_url('/user-dashboard') );
    exit;
}
$status ='';
$free = $_GET['free'];

$is_live = get_option('is_live');
$live_key = get_option('live_api_key');
$live_secret = get_option('live_secret_key');
$test_key = get_option('test_api_key');
$test_secret = get_option('secret_key');

$url = 'https://api.paystack.co/transaction/verify/'.$ref;
$key = '';
$secret = '';
if($is_live == 1){
    $key = $live_key;
    $secret = $live_secret;
}else{
    $key = $test_key;
    $secret = $test_secret;
}




$args = array(
    'headers' => array(
        'Authorization' => 'Bearer '. $secret,
        'Content-Type' => 'application/json'
    )
);
wp_remote_get($url, $args);
$response = wp_remote_get($url, $args);
$body = json_decode($response['body']);
$status = $body->data->status;
$price = $body->data->amount/100;
var_dump($body);





 get_header();
 ?>
 <main id="main" class="site-main">
    
    <div class="col py-3">
          
          <?php
                if($free == true){
                    $status= 'success';
                }
                if($status == 'success'){
                    // create new post for the user
                    $user_id = get_current_user_id();
                    $eid = $_GET['eid'];
                    //  Get post with eid
                    $event_post = get_post($eid);
                    $event_title = $event_post->post_title;
                    $date = get_post_meta( $eid, '_coventi_events_date', true );
                    $title = 'Ticket ' .$ref.$eid.$user_email .' '  .$event_title;
                    $event_post_link = get_permalink($eid);

                    // Check if post by title exists
                    $post_title = $title;
                    $post_check = get_page_by_title( $post_title, OBJECT, 'coventi_events' );

                    // If post exists, redirect to event page
                    if ( $post_check ) {
                        $event_title = $post_check->post_title;

                        
                    }else{
                        $post_id = wp_insert_post( array(
                            'post_title' => $title,
                            'post_status' => 'publish',
                            'post_type' => 'coventi_tickets',
                            'post_author' => $user_id,
                            'post_content' => $ref,
                        ) );
    
                        // add meta data to the post
                        add_post_meta( $post_id, '_coventi_tickets_price', $price );
                        add_post_meta( $post_id, '_coventi_tickets_event_id', get_the_ID() );
                        add_post_meta( $post_id, '_coventi_tickets_user_id', $user_id );
                        add_post_meta( $post_id, '_coventi_tickets_user_email', $user_email );
                        add_post_meta( $post_id, '_coventi_tickets_status', 'paid' );
                        add_post_meta( $post_id, '_coventi_tickets_payment_method', 'paystack' );
                        add_post_meta( $post_id, '_coventi_tickets_payment_ref', $ref );
                        add_post_meta( $post_id, '_coventi_event_id', $eid );

                        $ticket_info = array(
                            'price' => $price,
                            'event_id' => get_the_ID(),
                            'status' => 'paid',
                            'payment_method'=> 'paystack',
                            'payment_ref'=> $ref,
                            'event_id'=> $eid
                        );
                    }
                                   
                    
                    
                  
                    ?>
                    <div class="alert " style="display:flex; align-items:center; justify-content:space-between; flex-direction:column; padding-top:60px;">
                        <h2>Awesome!</h2>
                        <p>Your payment was successful. Here is the Payment Details.</p>
                        <p>Your payment was successful. You will be redirected to your dashboard shortly.</p>
                        <div class="ticket-card">
                            <div class="ticket-card-header">
                                <h3>Ticket Details</h3>
                            </div>
                            <div class="ticket-card-body">
                                <p>Event: <?php echo $event_title; ?></p>
                                <p>Ticket Ref: <?php echo $ref; ?></p>
                                <p>Ticket ID: CS-TKT-<?php echo $post_id; ?>-<?php echo $eid; ?> </p>
                                <p>Price: <?php echo $price; ?></p>
                                <p>Date: <?php echo $date; ?> </p>
                            </div>
                        </div>
                        <div class="button-group">
                            <a  href="<?php echo home_url('/user-dashboard'); ?>" class="btn alert-success">Go to Dashboard</a>
                            <a href="<?php echo $event_post_link ?>" class="btn btn-primary">Go to Events</a>
                        </div>
                        

                        </div>
                    <?php
                    // Send succes Email to user

                    $to = $user_email;
                    $subject = 'Your payment was successful';
                   
                    $message .= '<div class="ticket-card">
                            <div class="ticket-card-header">
                                <h3>Ticket Details</h3>
                            </div>
                            <div class="ticket-card-body">
                                <p>Event: '.$event_title.'</p>
                                <p>Ticket Ref: '.$ref.'</p>
                                <p>Ticket ID: CS-TKT- '.$post_id.' - '.$eid.' </p>
                                <p>Price: '.$price.'</p>
                                <p>Date: '.$date.' </p>
                            </div>
                        </div>
                        <div class="button-group">
                            <a  href="'.home_url('/user-dashboard').'" class="btn alert-success">Go to Dashboard</a>
                            <a href="'.$event_post_link.'" class="btn btn-primary">Go to Events</a>
                        </div>';
                    $headers[] = 'Content-Type: text/html; charset=UTF-8';
                    $headers[] = 'From: '.get_bloginfo('name').' <'.get_bloginfo('admin_email').'>';
                    wp_mail( $to, $subject, $message, $headers );

                    echo '<meta http-equiv="refresh" content="10;url='.home_url('/user-dashboard').'" />';
                    
                   
                }else{
                    echo '<h2>Payment Failed</h2>';
                    echo '<p>Your payment was not successful. Please try again.</p>';
                    echo '<p>If you are not redirected, please <a href="'.home_url('/user-dashboard').'">click here</a> to go to your dashboard.</p>';
                    echo '<meta http-equiv="refresh" content="5;url='.home_url('/user-dashboard').'" />';
                }

          ?>
        </div>
    </div>
</div>


</main><!-- #main -->

<?php
get_footer();