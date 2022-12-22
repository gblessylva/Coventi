<?php 

/* Template Name: Products */

/**
 * The template for displaying all content solutions that Coventi provides.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coventi_streaming
 */

get_header();
?>

<!-- ======= Hero Section ======= -->
<section id="hero-pages">
    <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
        <div class="inner-container">
            <div class="row-flex">
                <div class="col-lg-12 introduction">
                    <h1>How It Works</h1>
                    <h2>Indicate your interest in any of our products by reaching us through our contact form.</h2>
                    <a class="event-btn align-self-start" href="#cta-live">
                      learn More
                    </a>
                </div>
              </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= Call To Action Section ======= -->
    <section id="cta-live" class="cta cta-live">
      <div class="container" data-aos="zoom-out">

        <div class="row g-5">

          <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
            <h3>Live Streaming</h3>
            <p>Coventi is here to host and stream your live event to a wide audience. We are only a message away. Contact us by hitting the action button to register your interest.</p>
            <a class="cta-btn align-self-start" href="#contact">Call To Action</a>
          </div>

          <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
            <div class="img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/app-form.jpg" alt="" class="img-fluid">
            </div>
          </div>

        </div>

      </div>
    </section>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-out">

        <div class="row g-5">

          <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-last">
            <h3>Video On Demand</h3>
            <p>Monetize your value intensive videos by hosting them on the Coventi platform. We place monetary value on your videos with tickets while you get paid for every view. Indicate your interest by sending a message on our contact form.</p>
            <a class="cta-btn align-self-start" href="#contact">Call To Action</a>
          </div>

          <div class="col-lg-4 col-md-6 order-first order-md-first d-flex align-items-center">
            <div class="img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/contact-us.jpg" alt="" class="img-fluid">
            </div>
          </div>

        </div>

      </div>
    </section>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-out">

        <div class="row g-5">

          <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
            <h3>Video Production</h3>
            <p>Contact Coventi for full-ranged video production services at competitive prices for your events. We'll provide a turnkey solution in exchange for your patronage.</p>
            <a class="cta-btn align-self-start" href="#contact">Call To Action</a>
          </div>

          <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
            <div class="img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/cta.jpg" alt="" class="img-fluid">
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Testimonial Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="inner-container" data-aos="fade-up">
            <?php get_template_part( 'template-parts/content', 'testimonials' ); ?>
        </div>
    </section><!-- End Testimonial Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="inner-container" data-aos="fade-up">
            <div class="row">
                <?php get_template_part( 'template-parts/content', 'contact' ); ?>
            </div>
        </div>
    </section><!-- End Contact Section -->
</main>

<?php
get_footer();