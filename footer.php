<?php

/**

 * The template for displaying the footer

 *

 * Contains the closing of the #content div and all content after.

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package coventi_streaming

 */

?>		



	<!-- ======= Footer ======= -->

	<footer id="footer">

    	<div class="footer-top">

      		<div class="container">

        		<div class="row">

          			<div class="col-lg-3 col-md-6">

            			<div class="footer-info">

							<?php the_custom_logo();?>

							<?php dynamic_sidebar( 'footer_area_one' ); ?>

							<div class="social-links mt-3">

								<a href="https://twitter.com/coventi_" class="twitter"><i class="bx bxl-twitter"></i></a>

								<a href="https://www.instagram.com/coventi_ng/?hl=en" class="instagram"><i class="bx bxl-instagram"></i></a>

								<a href="https://www.linkedin.com/company/linkedinlocallagos/?viewAsMember=true" class="linkedin"><i class="bx bxl-linkedin"></i></a>

							</div>

            			</div>

          			</div>



					<div class="col-lg-2 col-md-6 footer-links">

					

						<h4>Company</h4>

						<?php dynamic_sidebar( 'footer_area_two' ); ?>

						<?php

						// wp_nav_menu(

						// 	array(

						// 		'theme_location'	=> 'menu-2',

						// 		'container'			=> 'ul',

						// 		'depth'				=> 1,

						// 		'fallback_cb'		=> false,

						// 		'add_li_class'		=> 'bx bx-chevron-right',

						// 	)

						// );

						?>	

					</div>



					<div class="col-lg-3 col-md-6 footer-links">

						<h4>Support</h4>

						<?php dynamic_sidebar( 'footer_area_three' ); ?>

						<?php

						// wp_nav_menu(

						// 	array(

						// 		'theme_location'	=> 'menu-',

						// 		'container'			=> 'ul',

						// 		'depth'				=> 1,

						// 		'fallback_cb'		=> false,

						// 		'add_li_class'		=> 'bx bx-chevron-right',

						// 	)

						// );

						?>	

					</div>



					<div class="col-lg-4 col-md-6 footer-newsletter">

						<?php dynamic_sidebar( 'footer_area_four' ); ?>

<!-- 						<h4>Newsletter</h4> -->

						<p>Stay up to date with events</p>

						<form action="" method="post">

							<input type="email" name="email" disabled><input type="submit" value="Subscribe" disabled>

						</form>



					</div>



        		</div>

      		</div>

    	</div>



    	<div class="container">

			<div class="copyright">

				&copy; Copyright <strong><span>Coventi</span></strong>. All Rights Reserved

			</div>

			<div class="credits">

			Created for <a href="https://coventi.co/">Coventi</a>

			</div>

    	</div>

  	</footer><!-- End Footer -->



  	<div id="preloader">
		<div class="logo-animate-div">
   			<img class="coventi-logo" src="https://coventi.co/wp-content/uploads/2022/12/blue.png" alt="" srcset="">
		</div>
	</div>

  	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</div><!-- #page -->

<script>

	// const element = document.getElementById("blue");

	// let namess = ['Virtual', 'Hybrid', 'In-Person']; 

	// let i = 0;

	// let interval = setInterval(() => element.innerHTML = (namess[i++ % namess.length]), 2000);



	// let countdown = document.querySelector('.countdown');

	// const output = countdown.innerHTML;



	// const countDownDate = function() {

	// 	let timeleft = new Date(countdown.getAttribute('data-count')).getTime() - new Date().getTime();



	// 	let days = Math.floor(timeleft / (1000 * 60 * 60 * 24));

	// 	let hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

	// 	let minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));

	// 	let seconds = Math.floor((timeleft % (1000 * 60)) / 1000);



	// 	countdown.innerHTML = output.replace('%d', days).replace('%h', hours).replace('%m', minutes).replace('%s', seconds);

	// }

	// countDownDate();

	// setInterval(countDownDate, 1000);

</script>



<?php wp_footer(); ?>





</body>

</html>

<style>
  .logo-animate-div{
    width: 100%;
    margin: auto;
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;
    background-color: aliceblue;
  }

  .coventi-logo {
    height: 60px;
	-webkit-animation: rotate-center 0.6s ease-in-out both;
	        animation: rotate-center 1s ease-in-out both infinite ;
        
}



 
@keyframes rotate-center {
  0% {
    -webkit-transform: rotate(0);
            transform: rotate(0);
            /* transform: scale(0.5); */
  }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
            /* transform: scale(1); */
  }
}




</style>

