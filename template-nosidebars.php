<?php
/**
 * Template Name: Privacy Pages
 * Template Post Type: page
 *
 *  
 * */


get_header();
?>

	<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			?>
            <div class="nav-space"></div>
            <div class="privay-container">
                <div class="header">
                    <h2><?php the_title();?></h2>
                </div>
                <div class="privacy-content-container">
                    <?php
                    the_content();
                    ?>
                </div>
            </div>

            <?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

