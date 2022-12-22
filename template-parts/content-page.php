<?php
/**
 * Template part for displaying page content in page.php
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

	<!-- ======= Page Content Section ======= -->
	<section id="page-content" class="page-content">
		<div class="container" data-aos="fade-up">
			<div class="page-section-header">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coventi-streaming' ),
					'after'  => '</div>',
				)
			);
			?>
			</div>
		</div>
		<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'coventi-streaming' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
	</section><!-- End Page Content Section -->

</article><!-- #post-<?php the_ID(); ?> -->

