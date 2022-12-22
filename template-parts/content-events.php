<?php
/**
 * Template part for displaying the Events custom post type.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coventi_streaming
 */

?>


<div class="events-container " data-aos="fade-up" data-aos-delay="100"> 
    <div id="post-<?php the_ID(); ?>" <?php post_class('event-card'); ?> >
    <?php $post_id = get_the_ID(); ?>
        <?php 
            
            if ( has_post_thumbnail() ) {
        ?>
                <figure class="event-image">
                    <?php the_post_thumbnail( 'full' ); ?> 
                    <div class="card-icon">
                        <a href="<?php the_permalink(); ?>"><i class="ri-play-circle-fill"></i></a>
                    </div>                                             
                </figure>
        <?php } ?>

        
        <div class="event-card-body">
            <h6 class="event-title"><?php the_title();  ?> </h6>
            <div class="event-footer">
                <p class="organiser">Organizer</p>
                <p class="date"><?php echo get_post_meta($post_id, '_coventi_events_date', true)?></p>
            </div>
        </div>

    </div>
</div>