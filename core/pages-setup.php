<?php
// 1. Create Payment Success page if not exists with User dashboard as parent

function coventi_streaming_create_payment_success_page() {
	$page = get_page_by_path( "user-dashboard", OBJECT, array( 'page' ) );
	$parent_id = $page->ID;
	$payment_success_page = get_page_by_path('user-dashboard/payment-success');
	if(!$payment_success_page) {
		$payment_success_page = array(
			'post_title' => 'Payment Success',
			'post_content' => '',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_type' => 'page',
			'post_parent' => $parent_id
		);
		wp_insert_post($payment_success_page);	
	}
	// Set page template for payment success page
	update_post_meta( $payment_success_page->ID, '_wp_page_template', 'template-parts/payment-success.php' );
	// Set page template for payment success page
	add_post_meta( $payment_success_page->ID, '_wp_page_parent', 'user-dashboard' );
}

add_filter('init', 'coventi_streaming_create_payment_success_page');