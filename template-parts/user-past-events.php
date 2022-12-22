<?php
/*
 * Template Name: User Past Events Page
 * Template Post Type: page
 */

//  Redirect to login  if user is not logged in.
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url('/login') );
    exit;
}

get_header('dashboard');
 ?>
 <main id="main" class="site-main">
    <?php 
        //Get Dashboard sidebar 
        get_template_part( 'template-parts/dashboard-sidebar' );
    ?>
    <div class="col py-3">
    <div class="up-coming-events" style="margin-top:40px">
                <h2>Past Events</h2>
            
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php 
                        global $current_user;
                        $user_id = $current_user->ID;

                        $user_email = $current_user->user_email;
                        $now = new DateTime();
                        $tickets = get_posts(
                            array(
                                'post_type' => 'coventi_tickets',
                                'author'=>$user_id,

                            ));

                            function get_ticket_number($ticket_number){
                                $user_id = get_current_user_id();
                                $query_args = array(
                                    'post_type' => 'coventi_tickets',
                                    'author'=> $user_id,
                                    'meta_query' =>
                                        array(
                                            array(
                                                'key' => '_coventi_event_id',
                                                'value' => $ticket_number,
                                            ),
                                        )
                                    );
                                    $query = new WP_Query( $query_args );
                                    if ( $query->posts ) {
                                        foreach ( $query->posts as $key => $post_id ) {
                                            $ref = get_post_meta($post_id->ID, '_coventi_tickets_payment_ref', true);
                                            $coventi_event_id = get_post_meta($post_id->ID, '_coventi_event_id', true);
                                            $ticket_number = $ref .$coventi_event_id;
                                            echo $ticket_number;
                                        // Code goes here..
                                        }
                                    }
                            }
                            
                        $ticket_ids = array();
                        $event_ticket_ids = array();
                        foreach($tickets as $ticket){
                            $ev_id = get_post_meta($ticket->ID, '_coventi_event_id', true);
                            
                            array_push($ticket_ids, $ev_id);
                            
                        }
                        
                        $args = array(  
                            'post_type' => 'coventi_events',
                            'post_status' => 'publish',
                            'posts_per_page' => -1, 
                            'orderby' => 'date', 
                            'meta_key'         => '_coventi_events_type',
                            'meta_value'       => 'live-stream'
                            
                        );

                      
                        $loop = new WP_Query( $args ); 
                        while ( $loop->have_posts() ) : $loop->the_post(); 
                        $event_date = get_post_meta( get_the_ID(), '_coventi_events_date', true );
                        $event_date = new DateTime($event_date);
                        $event_date = $event_date->format('Y-m-d');
                        $title = get_the_title();
                        $link = get_permalink();
                        $stream_link = '/user-dashboard/stream-event?ce_id='. get_the_ID();
                        $event_time = get_post_meta( get_the_ID(), '_coventi_events_start_time', true );
                        $event_time = new DateTime($event_time);
                        $event_time = $event_time->format('H:i A');
                        $event_price = get_post_meta( get_the_ID(), '_coventi_events_price', true );
                        
                        // convert price to integer

                        $event_price = intval($event_price);
                        $price = intval($event_price);
                        // Check if event is free
                        if($event_price <= 0){
                            $event_price = 'Free';
                        }else{
                            $event_price = 'N'.$event_price;
                        }
                        $event_description = get_post_meta( get_the_ID(), '_coventi_events_description', true );
                        $event_description = wp_trim_words( $event_description, 20, '...' );
                        $event_image = get_post_meta( get_the_ID(), 'single-post-thumbnail', true );
                        $event_image = wp_get_attachment_image_src( $event_image, 'full' );
                        $event_image = !empty($event_image[0]);
                        $feature_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );

        


                        
                        if (in_array(get_the_ID(), $ticket_ids))
                             {
                               
                        ?>
                        <div class="col">
                            <div class="card shadow-sm">
                            <div class="bd-placeholder-img card-img-top" style="width:100%; height:320px">
                                <img style="width:100%; height:100%; object-fit:cover;" src="<?php echo $feature_image; ?>" alt="<?php echo $title; ?>">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $title; ?></h5>
                                <p class="card-text">  <?php echo date('d M, Y', strtotime($event_date)); ?> <?php echo $event_time; ?></p>
                                <p>Ticket No: <?php 
                                    $ticket_number = get_the_ID();
                                    get_ticket_number($ticket_number);
                                    
                                ?></p>
                                 <div class="d-flex justify-content-between align-items-center">
                                    
                                    <?php
                                    
                                    ?>
                                    <div class="btn-group">
                                        <a href="<?php echo $stream_link; ?>" class="btn btn-sm btn-outline-secondary">Stream Event</a>
                                    </div>  
                                   
                                    
                                </div>
                                
                                
                            </div>
                            </div> 
                        
                        </div>
                        <?php
                        }                       
                        endwhile;

                        wp_reset_postdata(); 
                    
                    ?>
                    </div>
                </div>
            </div>
        </div>
    
        </div>
    </div>
</div>


</main><!-- #main -->

<?php
get_footer();