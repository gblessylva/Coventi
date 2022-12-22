<?php 

/* Template Name: Solutions */

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
                    <h2 id="solution-heading">The Only All-In-One Solution <br>for Your <span id="blue"></span> Events</h2>
                    <p>We help businesses and professionals maximize and monetize virtual <br>an in-person engagements with their audiences</p>
                    <a class="event-btn align-self-start" data-bs-toggle="modal" data-bs-target="#contactModal" href="#">Host Event</a>
                </div>
              </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= Solutions Section ======= -->
    <section class="solutions-sect">
        <div class="inner-container" data-aos="fade-up">
            <div class="row set">
                <div class="col-lg-6 d-flex align-items-stretch">
                    <img src="https://res.cloudinary.com/coventi/image/upload/v1664907223/Coventi/solution_pl3gxq.webp" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                    <h2 >Host engaging virtual event</h2>
                    <div class="content-solution-para">
                        <p>Coventi has made it easy to offer your attendee a virtual venue, where they can actively participate in your event in a real-time memorable experience.</p>
                    </div>
                    <div class="solution-content-list">
                        <li><i class="bx bx-check"></i><span>Dedicated mobile data-pack</span></li>
                        <li> <i class="bx bx-check"></i><span>Stream on transcoding infrastructure that is 10x faster.</span></li>
                        <li> <i class="bx bx-check"></i><span>Stream on 4,000 pixels(4k) at 3840 x 2169 Ultra High Definition.</span></li>
                    </div>
                </div>
            </div>
            <div class="row swap">
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                    <h2 >Foster interactions among on-site & online audiences</h2>
                    <div class="content-solution-para">
                     <p>Connect and engage your in-person and virtual attendees with a customizable and user-friendly event application.</p>
                    </div>
                    <div class="solution-content-list">
                        <li>
                        <i class="bx bx-check"></i><span>Use Coventi's centralized registration for both your in-person and virtual attendees.</span>
                        </li>
                        <li>
                            <i class="bx bx-check"></i><span>Connect in-person, online attendees, and speakers with our virtual networking and chat features.</span>
                        </li>
                        <li>
                         <i class="bx bx-check"></i><span>Boost event attendance with Coventi's mobile VAS marketing options.</span>
                         </li>
                    </div>
                   
                   
                </div>
                <div class="col-lg-6 d-flex align-items-stretch">
                    <img src="https://res.cloudinary.com/coventi/image/upload/v1664908849/Coventi/solution-2_1_kegn6l.webp" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    </section>
    <!-- ======= Testimonial Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="inner-container" data-aos="fade-up">
            <?php get_template_part( 'template-parts/content', 'testimonial' ); ?>
        </div>
    </section><!-- End Testimonial Section -->

    <!-- ======= Broadcasting Section ======= -->
    <section id="broadcasting" class="broadcasting section-bg">
        <div class="container" data-aos="fade-up">
            <?php get_template_part( 'template-parts/content', 'broadcast' ); ?>
        </div>
    </section><!-- End Broadcasting Section -->

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