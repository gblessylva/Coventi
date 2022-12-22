<?php

if ( ! is_user_logged_in() ) {
    wp_redirect( home_url('/login') );
    exit;
}
$eid = $_GET['ce_id'] ;
if(! $eid){
    wp_redirect( home_url('/user-dashboard') );
    exit;
}

$event = get_post($eid);

get_header();
 ?>
 <main id="main" class="site-main">
    <?php 
        //Get Dashboard sidebar 
        get_template_part( 'template-parts/dashboard-sidebar' );
    ?>
    <div class="col py-3">
        <div class="event-header">
            <h2 class="event-title">
                <?php
                $event_iframe = get_post_meta($eid, 'iframe', true );
                _e($event->post_title, $coventi);
               
                ?>
            </h2>
            <div class="event-iframe">
                <?php
                     _e($event_iframe, 'coventi');
                ?>
            </div>
        </div>
          
          <?php
            
          ?>
        </div>
    </div>
</div>


</main><!-- #main -->

<?php
get_footer();
