<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coventi_streaming
 */

?>

<!-- ======= Hero Section ======= -->
<section id="livestream-hero">
    <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
        <div class="inner-container">
            <div class="row">
                <div class="col-lg-12 introduction">
                    <h1><?php the_title(); ?></h1>
                    <h2><?php the_field('organizers'); ?></h2>
                    <div class="countdown d-flex justify-content-center" data-count="<?php the_field('due_date'); ?>">
                      <div>
                        <h3>%d</h3>
                        <h4>Days</h4>
                      </div>
                      <div>
                        <h3>%h</h3>
                        <h4>Hours</h4>
                      </div>
                      <div>
                        <h3>%m</h3>
                        <h4>Minutes</h4>
                      </div>
                      <div>
                        <h3>%s</h3>
                        <h4>Seconds</h4>
                      </div>
                    </div>              
                    <a class="event-btn align-self-start" href="#">Stream</a><!--<!?php the_field('video_shortcode'); ?>-->
                </div>
              </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= Describe Section ======= -->
    <section id="describe">
        <div class="container" data-aos="zoom-in">
            <div class="text-center">
                <h3>The Event's Description</h3>
                <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a class="pay-btn" href="#">Buy Ticket</a>
            </div>
        </div>
    </section><!-- End Describe Section -->