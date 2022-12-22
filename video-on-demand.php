<?php

/* Template Name: General Video On Demand */

/**
 * The template for displaying all Video on Demand.
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
            <h2>Video On Demand</h2>
            <p>Videos on your Time and Terms</p>
        </div>
    </div><!-- End Sub Hero -->

    <!-- ======= Video On Demand Section ======= -->
    <section id="vidsondemand" class="vidsondemand">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="vidondemand-item">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/blackdress.jpg" class="img-fluid" alt="...">
                        <div class="vidondemand-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><a href="#">Pay Now</a></h4>
                                <p class="price">₦1,800.00</p>
                            </div>

                            <h3><a href="#">Title of the Video</a></h3>
                            <p>Description: Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                            <div class="organizer d-flex justify-content-between align-items-center">
                                <div class="organizer-profile d-flex align-items-center">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/dark.jpg" class="img-fluid" alt="">
                                    <span>Name of Organizer</span>
                                </div>
                                <div class="organizer-rank d-flex align-items-center">
                                    <i class="bi bi-clock"></i>&nbsp;20/05/2022
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Video-on-demand Item-->

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="vidondemand-item">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/banky.jpg" class="img-fluid" alt="...">
                        <div class="vidondemand-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><a href="#">Pay Now</a></h4>
                                <p class="price">₦1,800.00</p>
                            </div>

                            <h3><a href="#">Title of the Video</a></h3>
                            <p>Description: Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                            <div class="organizer d-flex justify-content-between align-items-center">
                                <div class="organizer-profile d-flex align-items-center">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/dark.jpg" class="img-fluid" alt="">
                                    <span>Name of Organizer</span>
                                </div>
                                <div class="organizer-rank d-flex align-items-center">
                                    <i class="bi bi-clock"></i>&nbsp;20/05/2022
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Video-on-demand Item-->

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="vidondemand-item">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/tems-horiz.jpg" class="img-fluid" alt="...">
                        <div class="vidondemand-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><a href="#">Pay Now</a></h4>
                                <p class="price">₦1,800.00</p>
                            </div>

                            <h3><a href="#">Title of the Video</a></h3>
                            <p>Description: Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                            <div class="organizer d-flex justify-content-between align-items-center">
                                <div class="organizer-profile d-flex align-items-center">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/dark.jpg" class="img-fluid" alt="">
                                    <span>Name of Organizer</span>
                                </div>
                                <div class="organizer-rank d-flex align-items-center">
                                    <i class="bi bi-clock"></i>&nbsp;20/05/2022
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Video-on-demand Item-->
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php
                $latest_vod_count = intval(get_post_meta($post->ID, 'archived-posts-no', true));
                if($latest_vod_count > 200 || $latest_vod_count < 2) $latest_vod_count = 6;
                $vod_query = new WP_Query('post_type=video-on-demand&nopaging=1');
                if($vod_query->have_posts()) {
                    $counter = 1;
                    while($vod_query->have_posts() && $counter <= $latest_vod_count) {
                        $vod_query->the_post();
                        ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div id="post-<?php the_ID(); ?>" <?php post_class('vidondemand-item'); ?> >

                                <?php 
                                if ( has_post_thumbnail() ) {
                                ?>
                                <figure class="vid-img-top">
                                    <?php the_post_thumbnail( 'full' ); ?>                                              
                                </figure>
                                <?php } ?>
                                <div class="vidondemand-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4><a href="#">Pay Now</a></h4>
                                        <?php $vod_price = get_field('price'); ?>
                                        <p class="price"><?php echo $vod_price; ?></p>
                                    </div>

                                    <h3><a href="#"><?php the_title(); ?></a></h3>
                                    <p><?php the_field('description'); ?></p>
                                    <div class="organizer d-flex justify-content-between align-items-center">
                                        <div class="organizer-profile d-flex align-items-center">
                                            <?php $thumbnail_img = get_field('organizer_thumbnail'); ?>
                                            <figure class="vid-img-top">
                                                <?php echo $thumbnail_img; ?>                                              
                                            </figure>
                                            <span><?php the_field('organizer'); ?></span>
                                        </div>
                                        <div class="organizer-rank d-flex align-items-center">
                                            <i class="bi bi-clock"></i>&nbsp;<?php the_field('date'); ?>
                                        </div>
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
    </section><!-- End Video-on-demand Section -->

</main>

<?php
get_footer();