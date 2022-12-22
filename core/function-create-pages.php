<?php

// Create a page ofr  Stream Event if not exists with User Dashboard as parent
function coventi_streaming_create_strean_event_page() {
	$page = get_page_by_path( "user-dashboard", OBJECT, array( 'page' ) );
	$parent_id = $page->ID;
	$stream_event_page = get_page_by_path('user-dashboard/stream-event');
	if(!$stream_event_page) {
		$stream_event_page = array(
			'post_title' => 'Stream Event',
			'post_content' => '',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_type' => 'page',
			'post_parent' => $parent_id
		);
		wp_insert_post($stream_event_page);	
	}
	// Set page template for Stream Event page
	update_post_meta( $stream_event_page->ID, '_wp_page_template', 'template-parts/stream-event.php' );
	// Set page template for Stream Event page
	add_post_meta( $stream_event_page->ID, '_wp_page_parent', 'user-dashboard' );
}

add_filter('init', 'coventi_streaming_create_strean_event_page');