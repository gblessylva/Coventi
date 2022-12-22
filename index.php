<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coventi_streaming
 */

get_header();
?>
	<!-- ======= Hero Section ======= -->
	<!-- <section id="hero">
    	<div class="hero-container" data-aos="fade-up" data-aos-delay="150">
        	<div class="inner-container">
				
			</div>
    	</div>
  	</section> -->
	<!-- End Hero -->
	<section class="hero">
		<?php get_template_part( 'template-parts/content', 'hero' ); ?>
	</section>

	<main id="main" class="site-main">
		<!-- ======= Solutions Section ======= -->
		<section class="solutions-sect">
      		<div class="inner-container" data-aos="fade-up">
			  	<?php get_template_part( 'template-parts/content', 'solutions' ); ?>
			</div>
    	</section>

		<?php get_template_part( 'template-parts/content', 'testimonial' ); ?>

		<!-- ======= Broadcasting Section ======= -->
		<section id="broadcasting" class="broadcasting section-bg">
      		<div class="container" data-aos="fade-up">
				<?php 
				get_template_part( 'template-parts/content', 'broadcast' );
				 ?>
			</div>
    	</section><!-- End Broadcasting Section -->

		<!-- ======= Event Types Posts Section ======= -->
		<section id="event-types-posts" class="event-types-posts">
      		<div class="inner-container" data-aos="fade-up">

				<div class="section-header">
					<h2>The Any-Kind-Of-Event Platform</h2>
				</div>
        		<div class="row">
					<?php

						if ( have_posts() ) :

							//if ( is_home() && ! is_front_page() ) :
							?>
								<!-- header>
									<h1 class="page-title screen-reader-text"><!?php single_post_title//(); ?></h1>
								</header-->
							<?php
							//endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								//get_template_part( 'template-parts/content', get_post_type() );
								get_template_part( 'template-parts/content', 'index' );
							endwhile;

							//the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
				</div>
      		</div>
    	</section><!-- End Event Types Posts Section -->

		<!-- ======= Past Events Section ======= -->
		

		<!-- Explore Events -->
		<section id="explore-events" class="explore-events">
		<div class="inner-container" data-aos="fade-up">
        		<div class="section-title">
          			<p>Explore Events</p>
        		</div>
				<div class="event-wrapper">
					<?php
					$args = array(
						'post_type'			=> 'coventi_events',
						'orderby'			=> 'date',
						'order'				=> 'DESC',
						'posts_per_page'	=> 4
					);
					$query_events = new WP_Query( $args );
					while ($query_events->have_posts()) : $query_events->the_post();
						get_template_part( 'template-parts/content', 'events' );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
      		</div>
		</section>

		<!-- ======= Contact Section ======= -->
		<section id="contact" class="contact">
      		<div class="inner-container" data-aos="fade-up">
        		<div class="row">
					<?php get_template_part( 'template-parts/content', 'contact' ); ?>
        		</div>
      		</div>
    	</section><!-- End Contact Section -->

	</main><!-- End #main -->

<?php
//get_sidebar();
get_footer();
