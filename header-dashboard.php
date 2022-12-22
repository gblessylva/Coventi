<?php
/**
 * The header for admin dashboard
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coventi_streaming
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-signin-client_id" content="826978232457-sjsi80pgt7pgngiaf44al527spkfjjao.apps.googleusercontent.com">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Google Fonts -->
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://accounts.google.com/gsi/client" async defer></script>

	<script>
		jQuery.noConflict();
		jQuery(document).ready(function($){
		// 	/* Mobile nav toggle */
			$('.mobile-nav-toggle').on('click', function () {
				$('#navbar').toggleClass('navbar-mobile');
				$(this).toggleClass('bi-list');
				$(this).toggleClass('bi-x');
			});
		});
	</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coventi-streaming' ); ?></a>

	<!-- ======= Header ======= -->
	<header id="admin-header" class="fixed-top dashboard-header">
		<!-- <div id="admin-nav-container" class="container-fluid d-flex align-items-center justify-content-between"> -->
			<div class="admin-logo">
				<?php
			the_custom_logo();
			$current_user = wp_get_current_user();
			$username = $current_user->display_name;
			$lastname = $current_user->last_name[0];
			$first_name = $current_user->first_name[0];
			?>
			</div>
			
			
			<nav id="admin-navbar" class="admin-navbar">
				<ul>
					<li><a href="/user-dashboard/profile"><?php _e($current_user->first_name. ' '. $current_user->last_name); ?></a></li>
					<li> <button href="" class="initial"><?php _e($first_name.$lastname); ?></button></li>
				</ul>
			</nav><!-- .navbar -->
		<!-- </div> -->
		</div>
  </header><!-- End Header -->
