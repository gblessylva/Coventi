<?php
/*
 * Template Name: Video on Demand
 * Template Post Type: page
 */

//  Redirect to login  if user is not logged in.
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url('/login') );
    exit;
}

 get_header();
 ?>
 <main id="main" class="site-main">
    <?php 
        //Get Dashboard sidebar 
        get_template_part( 'template-parts/dashboard-sidebar' );
    ?>
    <div class="col py-3">
          
          <?php
                _e('<h1>Video on demand </h1>');
          ?>
        </div>
    </div>
</div>


</main><!-- #main -->

<?php
get_footer();