<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package coventi_streaming
 */

if ( ! function_exists( 'coventi_streaming_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function coventi_streaming_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$updated_time_string = "";
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$updated_time_string = '<time class="updated" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$updated_time_string = sprintf(
			$updated_time_string,
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on &nbsp; %s', 'post date', 'coventi-streaming' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$updated_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Updated on &nbsp; %s', 'post date', 'coventi-streaming' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $updated_time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on .'<em>&nbsp;and&nbsp;</em>'. $updated_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'coventi_streaming_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function coventi_streaming_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by &nbsp; %s', 'post author', 'coventi-streaming' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'coventi_streaming_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function coventi_streaming_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'coventi-streaming' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'coventi-streaming' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'coventi-streaming' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'coventi-streaming' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'coventi-streaming' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

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
	}
endif;

if ( ! function_exists( 'coventi_streaming_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function coventi_streaming_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
							'class' => 'image-fluid',
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'coventi_streaming_tags_list' ) ) :
	/**
	 * Prints out the list of available tags
	 */
	function coventi_streaming_tags_list() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags = get_tags( array(
				'hide_empty' => 0,
				'number' => 8,
				'orderby' => 'id',
				'order' => 'DESC'
			) );
			if ( $tags ) {
				foreach($tags as $taggi){
					$tags_link = get_tag_link( $taggi->term_id );
					echo '<li><a href="{$tags_link}" class="{$taggi->slug}">'. $taggi->name .'</a></li>';
				}
			}
		}
	}
endif;

if ( ! function_exists( 'coventi_streaming_searchbar' ) ) :
	/**
	 * Prints out the form containing the search input and search button
	 */
	function coventi_streaming_searchbar() {

		$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
		<input type="text" value="' . get_search_query() . '" name="s" id="s"/>
		<input type="hidden" value="any" name="post_type" id="post_type" />
		<button type="submit" id="searchsubmit"><i class="bi bi-search"></i></button>
		</form>';
		
		echo $form;
	}
endif;

