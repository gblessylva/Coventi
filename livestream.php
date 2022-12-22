<?php

/* Template Name: Livestream */

/**
 * The template for displaying all Past Event Content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coventi_streaming
 */

get_header();
?>

<!-- ======= Hero Section ======= -->
<section id="livestream-hero">
    <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
        <div class="inner-container">
            <div class="row-flex">
                <div class="col-lg-12 introduction">
                    <h1>Latest Livestream Event/Video Title</h1>
                    <h2>Reference/Name of the Speaker/Performer/Artist</h2>
                    <div class="countdown d-flex justify-content-center" data-count="2023/12/5">
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
                    <a class="event-btn align-self-start" href="#">Stream</a>
                </div>
              </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
<?php
    $args = array(
        'post_type'			=> 'live-stream',
        'orderby'			=> 'date',
        'order'				=> 'DESC',
        'posts_per_page'	=> 1
    );
    $query_livestream = new WP_Query( $args );
    while ($query_livestream->have_posts()) : $query_livestream->the_post();
        get_template_part( 'template-parts/content', 'livestream-entry' );
    endwhile;
    wp_reset_postdata();
?>

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

    <!-- ======= LiveStream Section ======= -->
    <section id="livestream" class="livestream">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="videoentry">
                        <h3 class="ended">Ended <i class="bi bi-dash-circle-dotted"></i></h3>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/asa.png" class="img-fluid" alt="">
                        <div>
                            <div class="overlay"><a class="strm" href="#">Stream</a></div>
                        </div>
                        <div class="videoentry-content">
                            <h2><a class="strm" href="#">The Event Title</a></h2>
                            <span>Organizer/Performer/Speaker</span>
                            <h4><strong>₦</strong>19,000.00</h4>

                            <p>
                                Description: Magni qui quod omnis unde et eos fuga et exercitationem.
                            </p>
                            <div class="duedate">
                                <strong>30/06/2022</strong>
                            </div>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Ticket</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="videoentry">
                        <h3 class="pending">Upcoming <i class="bi bi-dash-circle-fill"></i></h3>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/food.png" class="img-fluid" alt="">
                        <div>
                            <div class="overlay"><a class="strm" href="#">Stream</a></div>
                        </div>
                        <div class="videoentry-content">
                            <h2><a class="strm" href="#">The Event Title</a></h2>
                            <span>Organizer/Performer/Speaker</span>
                            <h4><strong>₦</strong>19,000.00</h4>
                            <p>
                                Description: Magni qui quod omnis unde et eos fuga et exercitationem.
                            </p>
                            <div class="duedate">
                                <strong>30/06/2022</strong>
                            </div>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Ticket</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="videoentry">
                        <h3 class="streaming">Live <i class="bi bi-filter-circle-fill"></i></h3>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/Worship.jpg" class="img-fluid" alt="">
                        <div>
                            <div class="overlay"><a class="strm" href="#">Stream</a></div>
                        </div>
                        <div class="videoentry-content">
                            <h2><a class="strm" href="#">The Event Title</a></h2>
                            <span>Organizer/Performer/Speaker</span>
                            <h4><strong>₦</strong>19,000.00</h4>
                            <p>
                                Description: Magni qui quod omnis unde et eos fuga et exercitationem.
                            </p>
                            <div class="duedate">
                                <strong>30/06/2022</strong>
                            </div>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Ticket</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php
                $latest_livestream_count = intval(get_post_meta($post->ID, 'archived-posts-no', true));

                if($latest_livestream_count  > 200 || $latest_livestream_count  < 2) $latest_livestream_count  = 6;

                $ls_query = new WP_Query('post_type=live-stream&nopaging=1');

                if($ls_query->have_posts()) {

                    $counter = 1;
                    while($ls_query->have_posts() && $counter <= $latest_livestream_count ) {

                        $ls_query->the_post();
                        ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

                            <div id="post-<?php the_ID(); ?>" <?php post_class('videoentry'); ?>>
                                <h3 class="<?php the_field('status_class'); ?>"><?php the_field('status'); ?>  <i class="bi <?php the_field('icon_class'); ?> "></i></h3>
                                <?php 
                                if ( has_post_thumbnail() ) {
                                ?>
                                <figure class="vid-img-top">
                                    <?php the_post_thumbnail( 'full' ); ?>                                              
                                </figure>
                                <?php } ?>
                                <div>
                                    <div class="overlay"><a class="strm" href="#">Stream</a></div><!--<!?php the_field('video_shortcode'); ?>-->
                                </div>
                                <div class="videoentry-content">
                                    <h2><a class="strm" href="#"><?php the_title(); ?></a></h2>
                                    <span><?php the_field('organizer'); ?></span>
                                    <h4><strong>₦</strong><?php the_field('price'); ?></h4>
                                    <p>
                                        <?php the_field('description'); ?>
                                    </p>
                                    <div class="duedate">
                                        <strong><?php the_field('due_date'); ?></strong>
                                    </div>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">Buy Ticket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $counter++;
                    }
                    wp_reset_postdata();
                }
            ?>
            </div>
        </div>
    </section><!-- End LiveStream Section -->
</main>

<?php
get_footer();