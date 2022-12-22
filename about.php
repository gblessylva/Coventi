<?php 

/* Template Name: About */

/**
 * The template for displaying all content about Coventi
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
                <div class="col-lg-6 intro-box">
                    <h1>We are an indigenous event-as-a-service platform.</h1>
                    <h2>We help businesses and professionals maximize and monetize virtual an in-person engagements with their audiences</h2>
                    <a class="event-btn align-self-start" data-bs-toggle="modal" data-bs-target="#contactModal" href="#">Get Started</a>
                </div>

                <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
                  <video loop="true" autoplay="autoplay" muted>
                    <source src="https://res.cloudinary.com/coventi/video/upload/v1660747566/Coventi/intro-video_zcaurz.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                </div>
              </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->

<!-- ======= Schedule Section ======= -->
<section id="schedule" class="solutions-sect">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>About Us</h2>
        </div>

        <h3 class="sub-heading">
            Our vision is to build a thriving community economically and socially. Users can generate income using our products by monetizing their events ranging from training, teachings, entertainment, corporate events, seminars, and conferences. Our platform could also be used to raise funds for social events. The possibility of connecting people and communities make our platform an important social tool. We believe in the potential of the enterprise in contributing to the development of the community. There is trust and respect within the team and in our customers. We believe in caring for each other, equality and diversity.
        </h3>
    </div>
</section>

<main id="main">
    <!-- ======= Solutions Section ======= -->
    <section class="solutions-sect">
        <div class="inner-container" data-aos="fade-up">
            <div class="row set">
                <div class="col-lg-7 d-flex align-items-stretch">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/aboutimg.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="100">
                    <h1>Why Choose Coventi?</h1>
                    <i class="bx bx-check"></i><span>Dedicated mobile data-pack</span><br>
                    <i class="bx bx-check"></i><span>Stream videos on up to 4k screen size</span><br>
                    <i class="bx bx-check"></i><span>Stream on UHD and adjust to bandwidth strength</span><br>
                    <i class="bx bx-check"></i><span>Stream on VR</span><br>
                    <i class="bx bx-check"></i><span>Several event monetization options</span><br>
                    <i class="bx bx-check"></i><span>Several event customization options</span><br>
                </div>
                <p>&nbsp;</p>
                <br>
                <p>&nbsp;</p>
            </div>
        </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="inner-container" data-aos="fade-up">
            <div class="row">
                <?php get_template_part( 'template-parts/content', 'contact' ); ?>
            </div>
        </div>
    </section><!-- End Contact Section -->


</main><!-- End #main -->
<?php
get_footer();