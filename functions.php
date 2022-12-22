<?php

/**

 * coventi streaming functions and definitions

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package coventi_streaming

 */



if ( ! defined( '_S_VERSION' ) ) {

	// Replace the version number of the theme on each release.

	define( '_S_VERSION', '1.0.0' );

}



/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 * 

 * 

 */





function coventi_streaming_setup() {

	/*

		* Make theme available for translation.

		* Translations can be filed in the /languages/ directory.

		* If you're building a theme based on coventi streaming, use a find and replace

		* to change 'coventi-streaming' to the name of your theme in all the template files.

		*/

	load_theme_textdomain( 'coventi-streaming', get_template_directory() . '/languages' );



	// Add default posts and comments RSS feed links to head.

	add_theme_support( 'automatic-feed-links' );



	/*

		* Let WordPress manage the document title.

		* By adding theme support, we declare that this theme does not use a

		* hard-coded <title> tag in the document head, and expect WordPress to

		* provide it for us.

		*/

	add_theme_support( 'title-tag' );



	/*

		* Enable support for Post Thumbnails on posts and pages.

		*

		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/

		*/

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'blog-archive', 105, 70 );



	// This theme uses wp_nav_menu() in one Event Type.

	register_nav_menus(

		array(

			'menu-1' => esc_html__( 'Primary', 'coventi-streaming' ),

			'menu-2' => esc_html__( 'Secondary', 'coventi-streaming' ),

			'menu-3' => esc_html__( 'Support', 'coventi-streaming' ),

		)

	);



	/*

		* Switch default core markup for search form, comment form, and comments

		* to output valid HTML5.

		*/

	add_theme_support(

		'html5',

		array(

			'search-form',

			'comment-form',

			'comment-list',

			'gallery',

			'caption',

			'style',

			'script',

		)

	);



	// Set up the WordPress core custom background feature.

	add_theme_support(

		'custom-background',

		apply_filters(

			'coventi_streaming_custom_background_args',

			array(

				'default-color' => 'ffffff',

				'default-image' => '',

			)

		)

	);



	// Add theme support for selective refresh for widgets.

	add_theme_support( 'customize-selective-refresh-widgets' );



	/**

	 * Add support for core custom logo.

	 *

	 * @link https://codex.wordpress.org/Theme_Logo

	 */

	add_theme_support(

		'custom-logo',

		array(

			'height'      => 250,

			'width'       => 250,

			'flex-width'  => true,

			'flex-height' => true,

		)

	);

}

add_action( 'after_setup_theme', 'coventi_streaming_setup' );



/**

 * Set the content width in pixels, based on the theme's design and stylesheet.

 *

 * Priority 0 to make it available to lower priority callbacks.

 *

 * @global int $content_width

 */

function coventi_streaming_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'coventi_streaming_content_width', 640 );

}

add_action( 'after_setup_theme', 'coventi_streaming_content_width', 0 );



/**

 * Register widget area.

 *

 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

 */

function coventi_streaming_widgets_init() {

	register_sidebar(

		array(

			'name'          => esc_html__( 'Sidebar', 'coventi-streaming' ),

			'id'            => 'sidebar-1',

			'description'   => esc_html__( 'Add widgets here.', 'coventi-streaming' ),

			'before_widget' => '<section id="%1$s" class="widget %2$s">',

			'after_widget'  => '</section>',

			'before_title'  => '<h2 class="widget-title">',

			'after_title'   => '</h2>',

		)

	);

}

add_action( 'widgets_init', 'coventi_streaming_widgets_init' );



/**

 * Enqueue scripts and styles.

 * 

 * 

 */





function coventi_streaming_scripts() {

	//wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css',false,'1.1','all');

	//wp_style_add_data( 'coventi-streaming-style', 'rtl', 'replace' );

	

	wp_enqueue_style( 'coventi-streaming-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css', 'all');

	wp_enqueue_style( 'coventi-streaming-bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css', 'all');

	wp_enqueue_style( 'coventi-streaming-boxicons', 'https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css', 'all');

	wp_enqueue_style( 'coventi-streaming-aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', 'all');

	wp_enqueue_style( 'coventi-streaming-magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css');

	wp_enqueue_style( 'coventi-streaming-swiper-bundle', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.min.css');

	wp_enqueue_style( 'coventi-streaming-remixicon', 'https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css');

	wp_enqueue_style( 'coventi-streaming-main', get_template_directory_uri() . '/assets/css/style.css');



	//wp_enqueue_script( 'coventi-streaming-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'coventi-streaming-bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js', true);

	wp_enqueue_script( 'coventi-streaming-aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', true);

	wp_enqueue_script( 'coventi-streaming-magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js', true);

	wp_enqueue_script( 'coventi-streaming-isotope-pkgd', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js', true);

	// wp_enqueue_script( 'coventi-streaming-swiper-bundle', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.min.js.map', true);

	// wp_enqueue_script( 'coventi-streaming-purecounter', 'rc="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js', true);

	wp_enqueue_script( 'coventi-streaming-main', get_template_directory_uri() . '/assets/js/main.js', true);

	wp_enqueue_script( 'coventi-streaming-script', get_template_directory_uri() . '/assets/js/script.js', true);

	wp_enqueue_script( 'coventi-streaming-login-script', get_template_directory_uri() . '/assets/js/login.js', true);



	// Load Paystack Scripts

	wp_enqueue_script( 'coventi-streaming-paystack', 'https://js.paystack.co/v1/inline.js', true);



	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

}

add_action( 'wp_enqueue_scripts', 'coventi_streaming_scripts' );



/**

 * Add custom class to menu-2 and menu-3 list coventi_events.

 */

function coventi_streaming_add_li_class($classes, $coventi_event, $args) {

	if(isset($args->add_li_class)) {

		$classes[] = $args->add_li_class;

	}

	return $classes;

}



add_filter('nav_menu_css_class', 'coventi_streaming_add_li_class', 1, 3);

/**

 * Implement the Custom Header feature.

 */

require get_template_directory() . '/inc/custom-header.php';



// Include Core files

require get_template_directory() . '/core/coventi.php';



/**

 * Register a custom post type.

 *

 * This function makes it possible to create custom posts for case studies post entries.

 *

 * @link https://developer.wordpress.org/reference/functions/register_post_type/

 */



/**

 * Custom template tags for this theme.

 */

require get_template_directory() . '/inc/template-tags.php';



/**

 * Functions which enhance the theme by hooking into WordPress.

 */

require get_template_directory() . '/inc/template-functions.php';



/**

 * Customizer additions.

 */

require get_template_directory() . '/inc/customizer.php';



/**

 * Load Jetpack compatibility file.

 */

if ( defined( 'JETPACK__VERSION' ) ) {

	require get_template_directory() . '/inc/jetpack.php';

}





@ini_set( 'upload_max_size' , '120M' );

@ini_set( 'post_max_size', '120M');

@ini_set( 'max_execution_time', '300' );



// Extended functions



// 1. Create a new page for login if not exists

function coventi_streaming_create_login_page() {

	$login_page = get_page_by_path('login');

	if(!$login_page) {

		$login_page = array(

			'post_title' => 'Login',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page'

		);

		wp_insert_post($login_page);	

	}

	// Set page template for login page

	update_post_meta( $login_page->ID, '_wp_page_template', 'template-parts/template-login.php' );

}



add_filter('init', 'coventi_streaming_create_login_page');





// 2. Hide admin bar for non-admins

function coventi_streaming_hide_admin_bar() {

	if(!current_user_can('administrator')) {

		show_admin_bar(false);

	}

}



add_action('wp_loaded', 'coventi_streaming_hide_admin_bar');



// 3. Create a new page for registration if not exists

function coventi_streaming_create_registration_page() {

	$registration_page = get_page_by_path('registration');

	if(!$registration_page) {

		$registration_page = array(

			'post_title' => 'Registration',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page'

		);

		wp_insert_post($registration_page);	

	}

	// Set page template for registration page

	update_post_meta( $registration_page->ID, '_wp_page_template', 'template-parts/template-registration.php' );

}



add_filter('init', 'coventi_streaming_create_registration_page');





// 4. Create Dashboard for users

function coventi_streaming_create_dashboard_page() {

	$dashboard_page = get_page_by_path('user-dashboard');

	if(!$dashboard_page) {

		$dashboard_page = array(

			'post_title' => 'User Dashboard',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page'

		);

		wp_insert_post($dashboard_page);	

	}

	// Set page template for dashboard page

	update_post_meta( $dashboard_page->ID, '_wp_page_template', 'template-parts/user-dashboard.php' );

}



add_filter('init', 'coventi_streaming_create_dashboard_page');





//5. Create a new page for user profile if not exists with User Dashboard page as parent

function coventi_streaming_create_user_profile_page() {

	$page = get_page_by_path( "user-dashboard", OBJECT, array( 'page' ) );

	$parent_id = $page->ID;





	$user_profile_page = get_page_by_path('user-dashboard/profile');

	if(!$user_profile_page) {

		$user_profile_page = array(

			'post_title' => 'Profile',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page',

			'post_parent' => $parent_id

		);

		wp_insert_post($user_profile_page);	

	}

	// Set page template for user profile page

	update_post_meta( $user_profile_page->ID, '_wp_page_template', 'template-parts/user-profile.php' );

	// Set page template for user profile page

	add_post_meta( $user_profile_page->ID, '_wp_page_parent', 'user-dashboard' );

}

add_filter('init', 'coventi_streaming_create_user_profile_page');



// 6. Create a new page for Past event if not exists with User Dashboard page as parent



// function coventi_streaming_create_past_event_page() {

// 	$page = get_page_by_path( "user-dashboard", OBJECT, array( 'page' ) );

// 	$parent_id = $page->ID;

// 	$past_event_page = get_page_by_path('user-dashboard/past-events');

// 	if(!$past_event_page) {

// 		$past_event_page = array(

// 			'post_title' => 'Video on Demand',

// 			'post_content' => '',

// 			'post_status' => 'publish',

// 			'post_author' => 1,

// 			'post_type' => 'page',

// 			'post_parent' => $parent_id

// 		);

// 		wp_insert_post($past_event_page);	

// 	}

// 	// Set page template for user past event page

// 	update_post_meta( $past_event_page->ID, '_wp_page_template', 'template-parts/user-past-events.php' );

// 	// Set page template for user past event page

// 	add_post_meta( $past_event_page->ID, '_wp_page_parent', 'user-dashboard' );

// }

// add_filter('init', 'coventi_streaming_create_past_event_page');





// 7. Create Email verification page if not exists with Registration page as parent

function coventi_streaming_create_email_verification_page() {

	$page = get_page_by_path( "registration", OBJECT, array( 'page' ) );

	$parent_id = $page->ID;

	$email_verification_page = get_page_by_path('registration/email-verification');

	if(!$email_verification_page) {

		$email_verification_page = array(

			'post_title' => 'Email Verification',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page',

			'post_parent' => $parent_id

		);

		wp_insert_post($email_verification_page);	

	}

	// Set page template for email verification page

	update_post_meta( $email_verification_page->ID, '_wp_page_template', 'template-parts/email-verification.php' );

	// Set page template for email verification page

	add_post_meta( $email_verification_page->ID, '_wp_page_parent', 'registration' );

}

add_filter('init', 'coventi_streaming_create_email_verification_page');



// 8. Create Resend Activation Code page if not exists with Registration page as parent

function coventi_streaming_create_resend_activation_code_page() {

	$page = get_page_by_path( "registration", OBJECT, array( 'page' ) );

	$parent_id = $page->ID;

	$resend_activation_code_page = get_page_by_path('registration/resend-activation-code');

	if(!$resend_activation_code_page) {

		$resend_activation_code_page = array(

			'post_title' => 'Resend Activation Code',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page',

			'post_parent' => $parent_id

		);

		wp_insert_post($resend_activation_code_page);	

	}

	// Set page template for resend activation code page

	update_post_meta( $resend_activation_code_page->ID, '_wp_page_template', 'template-parts/resend-activation-code.php' );

	// Set page template for resend activation code page

	add_post_meta( $resend_activation_code_page->ID, '_wp_page_parent', 'registration' );

}



add_filter('init', 'coventi_streaming_create_resend_activation_code_page');



// 9. Create Reset Password page if not exists with Login page as parent

function coventi_streaming_create_reset_password_page() {

	$page = get_page_by_path( "login", OBJECT, array( 'page' ) );

	$parent_id = $page->ID;

	$reset_password_page = get_page_by_path('login/reset-password');

	if(!$reset_password_page) {

		$reset_password_page = array(

			'post_title' => 'Reset Password',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page',

			'post_parent' => $parent_id

		);

		wp_insert_post($reset_password_page);	

	}

	// Set page template for reset password page

	update_post_meta( $reset_password_page->ID, '_wp_page_template', 'template-parts/reset-password.php' );

	// Set page template for reset password page

	add_post_meta( $reset_password_page->ID, '_wp_page_parent', 'login' );

}

add_filter('init', 'coventi_streaming_create_reset_password_page');



// 10. Create New Password page if not exists with Registration page as parent

function coventi_streaming_create_new_password_page() {

	$page = get_page_by_path( "registration", OBJECT, array( 'page' ) );

	$parent_id = $page->ID;

	$new_password_page = get_page_by_path('registration/new-password');

	if(!$new_password_page) {

		$new_password_page = array(

			'post_title' => 'New Password',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page',

			'post_parent' => $parent_id

		);

		wp_insert_post($new_password_page);	

	}

	// Set page template for new password page

	update_post_meta( $new_password_page->ID, '_wp_page_template', 'template-parts/new-password.php' );

	// Set page template for new password page

	add_post_meta( $new_password_page->ID, '_wp_page_parent', 'registration' );

}



add_filter('init', 'coventi_streaming_create_new_password_page');









// Create Payment Success page if not exists with user-dashboard page as parent







// 11. Create a Thank you page if not exists

function coventi_streaming_create_thank_you_page() {

	$content = '<div class="center-message"><h2>We have received your message</h2>

				<p> <i class="bi bi-check2-circle"></i> </p>

				<p>Thank you for contacting us.</p>

				<p>We will get back to you as soon as possible.</p>

				<p> Click <a href="/">here</a> to go back to the home page.</p>

				

				</div>';

	



	$thank_you_page = get_page_by_path('thank-you');

	if(!$thank_you_page) {

		$thank_you_page = array(

			'post_title' => 'Thank You',

			'post_content' => $content,

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page',

			'post_parent' => 0

		);

		wp_insert_post($thank_you_page);	

	}

	// Set page template for thank you page

	update_post_meta( $thank_you_page->ID, '_wp_page_template', 'template-parts/thank-you.php' );

}

add_filter('init', 'coventi_streaming_create_thank_you_page');





// Create a page ofr  Video on Demand if not exists with User Dashboard as parent

function coventi_streaming_create_video_on_demand_page() {

	$page = get_page_by_path( "user-dashboard", OBJECT, array( 'page' ) );

	$parent_id = $page->ID;

	$video_on_demand_page = get_page_by_path('user-dashboard/video-on-demand');

	if(!$video_on_demand_page) {

		$video_on_demand_page = array(

			'post_title' => 'Video On Demand',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page',

			'post_parent' => $parent_id

		);

		wp_insert_post($video_on_demand_page);	

	}

	// Set page template for video on demand page

	update_post_meta( $video_on_demand_page->ID, '_wp_page_template', 'template-parts/video-on-demand.php' );

	// Set page template for video on demand page

	add_post_meta( $video_on_demand_page->ID, '_wp_page_parent', 'user-dashboard' );

}



add_filter('init', 'coventi_streaming_create_video_on_demand_page');





function coventi_streaming_create_events_page() {

	$page = get_page_by_path( "login", OBJECT, array( 'page' ) );

	

	$events_page_create = get_page_by_path('events');

	if(!$events_page_create) {

		$events_page_create = array(

			'post_title' => 'Events',

			'post_content' => '',

			'post_status' => 'publish',

			'post_author' => 1,

			'post_type' => 'page',

		);

		wp_insert_post($events_page_create);	

	}

	// Set page template for reset password page

	update_post_meta( $events_page_create->ID, '_wp_page_template', 'template-parts/events-list.php' );

	// Set page template for reset password page

	// add_post_meta( $events_page->ID, '_wp_page_parent', 'login' );

}

add_filter('init', 'coventi_streaming_create_events_page');



// Destroy other sessions except the current session

function coventi_streaming_destroy_other_sessions() {

	global $wp_session;

$user_id = get_current_user_id();

$session = wp_get_session_token();

$sessions = WP_Session_Tokens::get_instance($user_id);

$sessions->destroy_others($session);

}



add_filter('init', 'coventi_streaming_destroy_other_sessions');





// Add Event Custom Post Type



if ( ! function_exists('coventi_events') ) {



	// Register Custom Post Type

	function coventi_events() {

	

		$labels = array(

			'name'                  => _x( 'Coventi Events', 'Post Type General Name', 'coventi_events' ),

			'singular_name'         => _x( 'Coventi Events', 'Post Type Singular Name', 'coventi_events' ),

			'menu_name'             => __( 'Coventi Events', 'coventi_events' ),

			'name_admin_bar'        => __( 'Coventi Events', 'coventi_events' ),

			'archives'              => __( 'Coventi Event Archives', 'coventi_events' ),

			'attributes'            => __( 'Coventi Event Attributes', 'coventi_events' ),

			'parent_coventi_event_colon'     => __( 'Parent Coventi Event:', 'coventi_events' ),

			'all_coventi_events'             => __( 'All Coventi Events', 'coventi_events' ),

			'add_new_coventi_event'          => __( 'Add New Coventi Event', 'coventi_events' ),

			'add_new'               => __( 'Add New Event', 'coventi_events' ),

			'new_coventi_event'              => __( 'New Event', 'coventi_events' ),

			'edit_coventi_event'             => __( 'Edit Coventi Event', 'coventi_events' ),

			'update_coventi_event'           => __( 'Update Coventi Event', 'coventi_events' ),

			'view_coventi_event'             => __( 'View Coventi Event', 'coventi_events' ),

			'view_coventi_events'            => __( 'View Coventi Events', 'coventi_events' ),

			'search_coventi_events'          => __( 'Search Coventi Event', 'coventi_events' ),

			'not_found'             => __( 'Not found', 'coventi_events' ),

			'not_found_in_trash'    => __( 'Not found in Trash', 'coventi_events' ),

			'featured_image'        => __( 'Featured Image', 'coventi_events' ),

			'set_featured_image'    => __( 'Set featured image', 'coventi_events' ),

			'remove_featured_image' => __( 'Remove featured image', 'coventi_events' ),

			'use_featured_image'    => __( 'Use as featured image', 'coventi_events' ),

			'insert_into_coventi_event'      => __( 'Insert into Event', 'coventi_events' ),

			'uploaded_to_this_coventi_event' => __( 'Uploaded to this Coventi Event', 'coventi_events' ),

			'coventi_events_list'            => __( 'Coventi Events list', 'coventi_events' ),

			'coventi_events_list_navigation' => __( 'Coventi Events list navigation', 'coventi_events' ),

			'filter_coventi_events_list'     => __( 'Filter Coventi Event list', 'coventi_events' ),

			'register_meta_box_cb' => 'coventi_events_meta_box'

		);

		$args = array(

			'label'                 => __( 'Coventi Events', 'coventi_events' ),

			'description'           => __( 'ALl events types supported by coventi', 'coventi_events' ),

			'labels'                => $labels,

			'supports'              => array( 'title', 'thumbnail',  ),

			// 'taxonomies'            => array( 'category', 'post_tag' ),

			'hierarchical'          => false,

			'public'                => true,

			'show_ui'               => true,

			'show_in_menu'          => true,

			'menu_position'         => 10,

			'show_in_admin_bar'     => true,

			'show_in_nav_menus'     => true,

			'can_export'            => true,

			'has_archive'           => true,

			'exclude_from_search'   => false,

			'publicly_queryable'    => true,

			'capability_type'       => 'page',

		);

		register_post_type( 'coventi_events', $args );

	

	}

	add_action( 'init', 'coventi_events', 0 );

	

	}



// Create custom Taxonomy for Events





function add_coventi_event_types() {

	// Add new "Event Types" taxonomy to Posts

	register_taxonomy('event_type', 'coventi_events', array(

	  // Hierarchical taxonomy (like categories)

	  'hierarchical' => true,

	  // This array of options controls the labels displayed in the WordPress Admin UI

	  'labels' => array(

		'name' => _x( 'Event Type', 'taxonomy general name' ),

		'singular_name' => _x( 'Event Type', 'taxonomy singular name' ),

		'search_items' =>  __( 'Search Event Types' ),

		'all_items' => __( 'All Event Types' ),

		'parent_item' => __( 'Parent Event Type' ),

		'parent_item_colon' => __( 'Parent Event Type:' ),

		'edit_item' => __( 'Edit Event Type' ),

		'update_item' => __( 'Update Event Type' ),

		'add_new_item' => __( 'Add New Event Type' ),

		'new_item_name' => __( 'New Event Type Name' ),

		'menu_name' => __( 'Event Types' ),

	  ),

	  // Control the slugs used for this taxonomy

	  'rewrite' => array(

		'slug' => 'Event Types', // This controls the base slug that will display before each term

		'with_front' => false, // Don't display the category base before "/Event Types/"

		'hierarchical' => true // This will allow URL's like "/Event Types/boston/cambridge/"

	  ),

	));

  }

  add_action( 'init', 'add_coventi_event_types', 0 );



  function coventi_events_meta_box() {



	add_meta_box('coventi-events-description', 'Event Description', 'coventi_event_description_cb', 'coventi_events', 'advanced', 	'high' );



    add_meta_box(

        'coventi-events',

        __( 'Event Type', 'coventi' ),

        'coventi_events_meta_box_callback',

        'coventi_events',

		'advanced', 

		'high' 

	);

	

}



add_action( 'add_meta_boxes', 'coventi_events_meta_box' );



function coventi_events_meta_box_callback( $post ) {



    // Add a nonce field so we can check for it later.

    wp_nonce_field( 'coventi_events_nonce', 'coventi_events_nonce' );

    $value = get_post_meta($post->ID, '_coventi_events_type', true);

	$date = get_post_meta( $post->ID, '_coventi_events_date', true );

	$price = get_post_meta( $post->ID, '_coventi_events_price', true );

	$time = get_post_meta($post->ID, '_coventi_events_start_time', true);

	$event_organizer = get_post_meta($post->ID, '_coventi_event_organizer', true)

    ?>





	<div class="row" style="display:flex; flex-direction:column;">

    <label for="coventi_events_type" style="margin-bottom:20px; font-size:19px">Select an Event Type</label>

    <select name="coventi_events_type" id="coventi_events_type" class="postbox" style="border:1px solid #d4d4d4; font-size:16px;">

        <option value="live-stream" <?php selected($value, 'live-stream'); ?>>Live Stream</option>

		<option value="video-production" <?php selected($value, 'video-production'); ?>>Video Production</option>

        <option value="video-on-demand" <?php selected($value, 'video-on-demand'); ?>>Video on Demand</option>

    </select>

	</div>

	<div class="row"  style="display:flex; flex-direction:row; justify-content:space-between; margin-top:20px;  padding:20px; border:1px solid #d4d4d4; border-radius:10px;">

		<div class="column">

		<div for="coventi_events_price" class="label"  style="margin-bottom:20px; font-size:19px">Event Price &#8358;</div>

			<input name="coventi_events_price" type="number" value="<?php echo esc_attr($price); ?>">

		</div>

		<div class="column">

		<div class="label" for='coventi_events_date' style="margin-bottom:20px; font-size:19px">Event Date</div>

			<input name="coventi_events_date" type="date" value="<?php echo esc_attr($date); ?>">

		</div>

		<div class="column">

		<div class="label"  for='coventi_events_start_time' style="margin-bottom:20px; font-size:19px">Event Time</div>

			<input name="coventi_events_start_time" type="time" value="<?php echo esc_attr($time); ?>">

		</div>

		<div class="column">

			<div class="label"  for='event_organizer' style="margin-bottom:20px; font-size:19px">Event Organizer</div>

				<input name="event_organizer" id="event_organizer" type="text" value="<?php echo esc_attr($event_organizer); ?>">

			</div>



		</div>

	</div>

	

    <?php

}







function coventi_event_description_cb($post){

	$text= get_post_meta($post->ID, '_coventi_events_description' , true );

	 do_action('coventi_event_header_message');	

    wp_editor( htmlspecialchars($text), 'mettaabox_ID', $settings = array('textarea_name'=>'coventi_events_description') );

}





	// Save 



function save_coventi_events_meta_box_data( $post_id ) {



    // Check if our nonce is set.

    if ( ! isset( $_POST['coventi_events_nonce'] ) ) {

        return;

    }



    // Verify that the nonce is valid.

    if ( ! wp_verify_nonce( $_POST['coventi_events_nonce'], 'coventi_events_nonce' ) ) {

        return;

    }



    // If this is an autosave, our form has not been submitted, so we don't want to do anything.

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

        return;

    }



    // Check the user's permissions.

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {



        if ( ! current_user_can( 'edit_page', $post_id ) ) {

            return;

        }



    }

    else {



        if ( ! current_user_can( 'edit_post', $post_id ) ) {

            return;

        }

    }





    // Make sure that it is set.

    if ( ! isset( $_POST['coventi_events_type'] ) ) {

        return;

    }



    // Sanitize user input.

    $type = sanitize_text_field( $_POST['coventi_events_type'] );

	// $date = sanitize_text_field($POST['coventi_events_type'] );



    // // Update the meta field in the database.

    update_post_meta( $post_id, '_coventi_events_type', $type );

	// update_post_meta( $post_id, '_coventi_events_date', $date );



	if ( array_key_exists( 'coventi_events_date', $_POST ) ) {

		update_post_meta(

		   $post_id,

		   '_coventi_events_date',

		   $_POST['coventi_events_date']

		);

	 }	



	 if(array_key_exists('coventi_events_price', $_POST)){

		update_post_meta(

			$post_id,

			'_coventi_events_price',

			$_POST['coventi_events_price']

		 );

	 }

	 if(array_key_exists('coventi_events_start_time', $_POST)){

		update_post_meta(

			$post_id,

			'_coventi_events_start_time',

			$_POST['coventi_events_start_time']

		 );

	 }

	 if(array_key_exists('event_organizer', $_POST)){

		update_post_meta(

			$post_id,

			'_coventi_event_organizer',

			$_POST['event_organizer']

		 );

	 }





	 

	 

	 



}	



add_action( 'save_post', 'save_coventi_events_meta_box_data' );





add_action( 'save_post', function($post_id) {

    if (!empty($_POST['coventi_events_description'])) {

        $datta=sanitize_text_field($_POST['coventi_events_description']);

        update_post_meta($post_id, '_coventi_events_description', $datta );

		video_api_check($post_id);

    }

	// video_api_check($post_id);

	

	

}); 












