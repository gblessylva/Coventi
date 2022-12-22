<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coventi_streaming
 */

?>
<!-- ======= Sub Hero ======= -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="subhero" data-aos="fade-in">
		<div class="container">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</div>
	</div><!-- End Sub Hero -->


	<!-- ======= Blog Details Section ======= -->
	<section id="blog" class="blog">
		<div class="container" data-aos="fade-up">

			<div class="row g-5">
				<div class="col-lg-8">

					<article class="blog-details">

						<div class="post-img">
							<?php coventi_streaming_post_thumbnail(); ?>
						</div>

						<?php the_title( '<h2 class="title">', '</h2>' ); 
						if ( 'post' === get_post_type() ) : ?>
						<div class="meta-top">
							<ul>
								<li class="d-flex align-items-center"><i class="bi bi-person"></i> <?php coventi_streaming_posted_by();?></li>
								<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <?php coventi_streaming_posted_on(); ?></li>
							</ul>
						</div><!-- End meta top -->
						<?php endif; ?>

						<div class="content">
							<?php
							the_content(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'coventi-streaming' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									wp_kses_post( get_the_title() )
								)
							);

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coventi-streaming' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- End post content -->

						<div class="meta-bottom">
							<i class="bi bi-tags"></i>
							<ul class="tags">
								<?php coventi_streaming_tags_list(); ?>
							</ul>
						</div><!-- End meta bottom -->

					</article><!-- End blog post -->    
				</div>
				<?php get_sidebar(); ?>
			</div>

		</div>
	</section><!-- End Blog Details Section -->
</article><!-- #post-<?php the_ID(); ?> -->


