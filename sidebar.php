<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coventi_streaming
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="col-lg-4">

	<div class="sidebar">

		<div class="sidebar-item search-form">
			<h3 class="sidebar-title">Search</h3>
			<?php coventi_streaming_searchbar() ?>
		</div><!-- End sidebar search form-->

		<div class="sidebar-item recent-posts">
			<h3 class="sidebar-title">Recent Posts</h3>

			<div class="mt-3">
				<?php 

				$latest_posts_count = intval(get_post_meta($post->ID, 'archived-posts-no', true));
				if($latest_posts_count > 200 || $latest_posts_count < 2) $latest_posts_count = 5;
				$latest_post_query = new WP_Query('post_type=post&nopaging=1');
				if($latest_post_query->have_posts()) {
					$counter = 1;
					while($latest_post_query->have_posts() && $counter <= $latest_posts_count) {
						$latest_post_query->the_post();
				?>

				<div class="post-item" id="post-<?php the_ID(); ?>">
					<?php the_post_thumbnail('blog-archive'); ?>
					<div>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<time datetime="2020-01-01"><?php the_date(); ?></time>
					</div>
				</div><!-- End recent post item-->
				<?php
						$counter++;
					}
				}
				wp_reset_postdata();
				?>

			</div>

		</div><!-- End sidebar recent posts-->

		<div class="sidebar-item tags">
			<h3 class="sidebar-title">Tags</h3>
			<ul class="mt-3">
				<?php coventi_streaming_tags_list(); ?>
			</ul>
		</div><!-- End sidebar tags-->

	</div><!-- End Blog Sidebar -->

</div>

