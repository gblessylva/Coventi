<?php 

/* Template Name: Past Events */

/**
 * The template for displaying all Past Event Content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coventi_streaming
 */

get_header();
?>

<main id="main">
     <!-- ======= Sub Hero ======= -->
     <div class="subhero" data-aos="fade-in">
        <div class="container">
            <h2>Past Events</h2>
            <p>Watch Our Past Events for Free!</p>
        </div>
    </div><!-- End Sub Hero -->
    <!-- ======= Past Events Section ======= -->
    <section id="explore-events" class="explore-events">
        <div class="inner-container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/Worship.jpg" class="card-img-top" alt="...">
                        <div class="card-icon">
                            <a href="single1.html"><i class="ri-play-circle-fill"></i></a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Online Worship</h6>
                            <br>
                            <span class="card-text">Heaven's Playlist</span><span class="blue-text">Upcoming</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/food.png" class="card-img-top" alt="...">
                        <div class="card-icon">
                            <a href="single1.html"><i class="ri-play-circle-fill"></i></a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">GTCO Food & Drink Festival</h6>
                            <br>
                            <span class="card-text">GTBank</span><span class="blue-text">2021</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/asa.png" class="card-img-top" alt="...">
                        <div class="card-icon">
                            <a href="single1.html"><i class="ri-play-circle-fill"></i></a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Asa's Live in London</h6>
                            <br>
                            <span class="card-text">Asa</span><span class="blue-text">May 2nd, 2022</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/kizz.jpg" class="card-img-top" alt="...">
                        <div class="card-icon">
                            <a href="single.html"><i class="ri-play-circle-fill"></i></a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Kizz Daniels Live-in Concert</h6>
                            <br>
                            <span class="card-text">Kizz Daniels</span><span class="blue-text">2021</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                $latest_past_events_count = intval(get_post_meta($post->ID, 'archived-posts-no', true));
                if($latest_past_events_count > 200 || $latest_past_events_count < 2) $latest_past_events_count = 6;
                $pe_query = new WP_Query('post_type=events&nopaging=1');
                if($pe_query->have_posts()) {
                    $counter = 1;
                    while($pe_query->have_posts() && $counter <= $latest_past_events_count) {
                        $pe_query->the_post();
                        ?>
                        <div class="col-lg-4 col-md-8 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

                            <?php 
                            if ( has_post_thumbnail() ) {
                            ?>
                            <figure class="vid-img-top">
                                <?php the_post_thumbnail( 'full' ); ?>                                              
                            </figure>
                            <?php } ?>
                            <div class="card-icon">
                                <a href="<?php the_permalink(); ?>"><i class="ri-play-circle-fill"></i></a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title"><?php the_title(); ?></h6>
                                <br>
                                <?php $organizer = get_field('organizer'); ?>
                                <span class="card-text">
                                    <?php echo $organizer; ?>
                                </span>
                                <span class="blue-text">
                                    <?php the_field('date'); ?>
                                </span>
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
    </section><!-- End Past Events Section -->
</main>
<?php
get_footer();