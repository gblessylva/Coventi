<?php
/**
 * Template part for displaying standard posts on the index page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coventi_streaming
 */

?>

<div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="200">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-box">
			<div class="post-img">
				<?php coventi_streaming_post_thumbnail(); ?>
			</div>
			<a href="<?php the_permalink(); ?>">
				<?php the_title( '<h3 class="post-title">', '</h3>' ); ?>
			</a>
			<?php the_excerpt(); ?>
			<ul>
				<li><?php the_tags(); ?></li>
			</ul>
			<br>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
