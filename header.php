<?php
/**
 * The header for our theme
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
		// 	/* Magnific Popup */
		// 	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		// 		disableOn: 0,
		// 		type: 'iframe',
		// 		mainClass: 'mfp-fade',
		// 		removalDelay: 160,
		// 		preloader: false,

		// 		fixedContentPos: false
		// 	});
		// 	/* Testimonials slider */
		// 	new Swiper('.testimonials-slider', {
		// 		speed: 600,
		// 		loop: true,
		// 		autoplay: {
		// 			delay: 5000,
		// 			disableOnInteraction: false
		// 		},
    	// 		slidesPerView: 'auto',
		// 		pagination: {
		// 			el: '.swiper-pagination',
		// 			type: 'bullets',
		// 			clickable: true
		// 		},
		// 		breakpoints: {
		// 			320: {
		// 				slidesPerView: 1,
		// 				spaceBetween: 20
		// 			},

		// 			1200: {
		// 				slidesPerView: 3,
		// 				spaceBetween: 20
		// 			}
		// 		}
  			// });
		});
	</script>
	<script>
		let selectsHeader = document.getElementById('header')
  		if (selectsHeader) {
    		const headerScrolled = () => {
				if (window.scrollY > 100) {
					selectsHeader.classList.add('header-scrolled')
				} else {
					selectsHeader.classList.remove('header-scrolled')
				}
    		}
    		window.addEventListener('load', headerScrolled)
    		onscroll(document, headerScrolled)
  		}
	</script>
	<!--script type="text/javascript" src="<!?php echo get_bloginfo( 'template_directory' );?>/assets/js/script.js"></script-->
	<!-- =======================================================
	* Theme Name: Coventi Streaming 
	* Theme URL: https://coventi.azurewebsites.net/
	* Author: Coventi Web Streaming
	======================================================== -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coventi-streaming' ); ?></a>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
		<div class="container-fluid d-flex align-items-center justify-content-between">
			<?php
			the_custom_logo();
			?>
			
			<nav id="navbar" class="navbar">
				<?php
					wp_nav_menu(
						array(
							'theme_location'	=> 'menu-1',
							'container'			=> 'ul',
						)
					);
				?>
				<?php
					if(is_user_logged_in()){
						?>
					<a class="getstarted" href="/user-dashboard">User Dashboard</a>
				
				<?php
						
					}else{
				?>
				<a class="getstarted" href="/login">Login</a>
				
				<?php
					}
				
				?>
				
				<i class="bi bi-list mobile-nav-toggle" id="mntoggle"></i>
			</nav><!-- .navbar -->
		</div>
		<!-- Modal -->
		<div class="modal fade" id="contactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<?php 
			// Include contact template part
			get_template_part( 'template-parts/contact-form' );

		?>
		</div>
		<style>
			.modal-backdrop {
				opacity: 0.5 !important;
				z-index: -1 !important;
			}
		</style>
  </header><!-- End Header -->
