<?php
/**
 * The template for displaying all single posts for the events post type.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coventi_streaming
 */

get_header();
?>
	<!-- ======= Hero Section ======= -->
	<section id="single-event">
		<div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
			<img src="<?php echo get_template_directory_uri() ?>/assets/img/videostreaming.jpg" class="img-fluid" alt="">
			<a href="<?php echo get_field('youtube_link'); ?>" class="popup-youtube play-btn mb-4"></a>
		</div>
	</section><!-- End Hero Section -->

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
