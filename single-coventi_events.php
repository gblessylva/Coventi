<?php

// if ( ! is_user_logged_in() ) {
//     wp_redirect( home_url('/login') );
//     exit;
// }
get_header();
?>
<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'eventvideos' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();