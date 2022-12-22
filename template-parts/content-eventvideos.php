<?php
/**
 * Template part for displaying a single events video entry.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coventi_streaming
 */

?>

<!-- ======= Describe Section ======= -->
<section id="describe">
    <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12">
            <h1><?php the_title(); ?></h1>
          </div>
        </div>
    </div>
</section><!-- End Describe Section -->

<!-- ======= Speaker Details Section ======= -->
<section id="speakers-details">
    <div class="container">
        <div class="video-description-section-header">
          <h2><?php echo get_post_meta(get_the_ID(), '_coventi_events_date', true) ?></h2>
          <p>BY: <?php echo get_post_meta(get_the_ID(), '_coventi_event_organizer', true)   ?></p>
        </div>
    </div>
</section>


<section class="video-description-sect">
    <div class="inner-container" data-aos="fade-up">
        <div class="row set">
            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="row picture-frame-ashen">
                    <div class="col-lg-12 bigimage">
                        <?php the_post_thumbnail(); ?> 
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="zoom-in" data-aos-delay="100">
                <p><?php echo get_post_meta(get_the_ID(), '_coventi_events_description', true) ?></p>
                <div class="col-lg-7" data-aos="zoom-in" data-aos-delay="100">
                <div class="btn-group">
                    <a href="<?php echo '/user-dashboard/' ?>" class="btn btn-sm btn-outline-secondary">Stream Event</a>
                </div> 
            </div>
            </div>
            
        </div>


        
    </div>
</section>

