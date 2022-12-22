<?php

// Create a Ticket Custom Post Type
function coventi_events_create_ticket_cpt(){
    register_post_type('coventi_tickets', array(
        'labels' => array(
            'name' => 'Tickets',
            'singular_name' => 'Ticket',
            // 'add_new_item' => 'Add New Ticket',
            'edit_item' => 'Edit Ticket',
            'all_items' => 'All Tickets',
            'view_item' => 'View Ticket',
            'search_items' => 'Search Tickets',
            'not_found' => 'No Tickets Found',
            'not_found_in_trash' => 'No Tickets Found in Trash'
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'tickets'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-tickets-alt',
        'menu_position' => 20,
       
    ));
}
add_action('init', 'coventi_events_create_ticket_cpt');





function coventi_admin_menu() {
    add_submenu_page(
        'options-general.php',
        __( 'Coventi Settings', 'coventi-streaming' ),
        __( 'Coventi Settings', 'coventi-streaming' ),
        'manage_options',
        'coventi-api-page',
        'coventi_admin_page_contents',
        'dashicons-schedule',
        1
    );
}
add_action( 'admin_menu', 'coventi_admin_menu' );

function coventi_admin_page_contents() {
    ?>
    <h1> <?php esc_html_e( 'Coventing Streaming API Settings.', 'coventi-streaming' ); ?> </h1>
    <form method="POST" action="options.php">
    <?php
    settings_fields( 'coventi-api-page' );
    do_settings_sections( 'coventi-api-page' );
    submit_button();
    ?>
    </form>
    <?php
}

add_action( 'admin_init', 'coventi_settings_init' );

function coventi_settings_init() {

    add_settings_section(
        'coventi_api_page_settings',
        __( 'PayStack settings', 'coventi-streaming' ),
        'coventi_setting_section_callback_function',
        'coventi-api-page'
    );
        
    add_settings_field(
        'is_live',
        __( 'Enable Live', 'coventi-streaming' ),
        'coventi_setting_is_live_callback_function',
        'coventi-api-page',
        'coventi_api_page_settings'
     );

     register_setting( 'coventi-api-page', 'is_live' );

		add_settings_field(
		   'test_api_key',
		   __( 'TEST API KEY', 'coventi-streaming' ),
		   'coventi_setting_markup',
		   'coventi-api-page',
		   'coventi_api_page_settings'
		);

		register_setting( 'coventi-api-page', 'test_api_key' );

    
        add_settings_field(
            'secret_key',
            __( 'TEST SECRET KEY', 'coventi-streaming' ),
            'coventi_secret_markup',
            'coventi-api-page',
            'coventi_api_page_settings'
         );
 
         register_setting( 'coventi-api-page', 'secret_key' );

         add_settings_field(
            'live_secret_key',
            __( 'Live SECRET KEY', 'coventi-streaming' ),
            'coventi_live_secret_markup',
            'coventi-api-page',
            'coventi_api_page_settings'
         );
 
         register_setting( 'coventi-api-page', 'live_secret_key' );

         add_settings_field(
            'live_api_key',
            __( 'Live API KEY', 'coventi-streaming' ),
            'coventi_live_markup',
            'coventi-api-page',
            'coventi_api_page_settings'
         );
         
            register_setting( 'coventi-api-page', 'live_api_key' );
}


function coventi_setting_section_callback_function() {
    echo '<p>Enter the valid Test API Key from Paystack</p>';
}


function coventi_setting_markup() {
    ?>
    <label for="coventi-input"><?php _e( 'API Key' ); ?></label>
    <input type="password" id="test_api_key" name="test_api_key" value="<?php echo get_option( 'test_api_key' ); ?>">
    <?php
}

function coventi_secret_markup() {
    ?>
    <label for="coventi-input"><?php _e( 'Secret Key' ); ?></label>
    <input type="password" id="secret_key" name="secret_key" value="<?php echo get_option( 'secret_key' ); ?>">
    <?php
}
function coventi_setting_is_live_callback_function() {
    ?>
    <label for="coventi-input"><?php _e( 'Enable Live' ); ?></label>
    <input type="checkbox" id="is_live" name="is_live" value="1" <?php checked( 1, get_option( 'is_live' ), true ); ?>>
    <?php
}
function coventi_live_secret_markup () {
    ?>
    <label for="coventi-input"><?php _e( 'Live Secret Key' ); ?></label>
    <input type="password" id="live_secret_key" name="live_secret_key" value="<?php echo get_option( 'live_secret_key' ); ?>">
    <?php
}
function coventi_live_markup () {
    ?>
    <label for="coventi-input"><?php _e( 'Live API Key' ); ?></label>
    <input type="password" id="live_api_key" name="live_api_key" value="<?php echo get_option( 'live_api_key' ); ?>">
    <?php
}

// Create AJAX call for admin-ajax.php
add_action( 'wp_ajax_coventi_get_events', 'coventi_get_events' );
add_action( 'wp_ajax_nopriv_coventi_get_events', 'coventi_get_events' );

// Enqueue the script on the frontend
add_action( 'wp_enqueue_scripts', 'coventi_enqueue_scripts' );

function coventi_enqueue_scripts() {
    wp_enqueue_script( 'coventi-ajax-script', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ) );
    wp_localize_script( 'coventi-ajax-script', 'coventi_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}




function coventi_get_events(){
    $api_key = get_option( 'test_api_key' );
    $secret_key = get_option( 'secret_key' );
    $is_live = get_option( 'is_live' );
    $live_secret_key = get_option( 'live_secret_key' );
    $live_api_key = get_option( 'live_api_key' );
    
    if( $is_live == 1 ){
        $key = $live_api_key;
        $secret = $live_secret_key;
    }else{
        $key = $api_key;
        $secret = $secret_key;
    }

    // $data = array('secret' => $secret);
    echo json_encode($secret);
    die();
}