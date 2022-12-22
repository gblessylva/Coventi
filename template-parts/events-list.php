<?php 

/* Template Name: Event Lists Frontend */

/**
 * The template for displaying all content solutions that Coventi provides.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coventi_streaming
 */

get_header();
?>

<div class="events-frontend-container">
<?php
$args = array(
    'numberposts'	=> 1,
	'post_type'		=> 'coventi_events',
    
);

$date_now = new DateTime();
$status = "";


$featured = get_posts($args);
if( ! empty( $featured ) ){
    foreach($featured as $feat){
        
        $event_date = get_post_meta($feat->ID, '_coventi_events_date', true);
        $event_time = get_post_meta($feat->ID, '_coventi_events_start_time', true);
        $date2    = new DateTime($event_date);   
        $url = wp_get_attachment_url( get_post_thumbnail_id($feat->ID) );
        
        if($date_now > $date2){
            echo
            '<div class="upcoming-events-hero" 
            style="background: url('. $url.');
            background-repeat: no-repeat;
            background-size: cover;
            "
          >'
          ;

        }else{
    
     
   echo '<div class="upcoming-events-hero" 
         style="background: url('. $url.');
         background-repeat: no-repeat;
         background-size: cover;
         "
       >'
       ?>
       <div class="overlay-hero">

      
            <h2 class="event-slide-title">
           <?php _e($feat->post_title );  ?>
            </h2>
            <a href="#" class="event-btn">Register</a>
            <div class="timer-container">
                <h3 class="time">
                <span id="days"></span> <span id="hours"></span> <span id="mins"></span> <span id="secs"></span> 
                </h3>
                <input id="evtDate" type="hidden" value = <?php _e($event_date); ?>>
                <input id="evtTime" type="hidden" value = <?php _e($event_time); ?>>
                
            </div>
        </div>

    </div>

<?php
        }
}
}

?>
<div class="event_list_container">
    <div class="event-list-header">
        <h2>Explore Events</h2>
    </div>
    <div class="event-list-wrapper">
        <?php
        $events_args = array(
            'post_type'		=> 'coventi_events',
            'numberposts'	=> 12,
            
        );

        $explore_events = get_posts($events_args);

        if(! empty($explore_events)){
            foreach($explore_events as $event){
                $event_date = get_post_meta($event->ID, '_coventi_events_date', true);
                $event_time = get_post_meta($event->ID, '_coventi_events_start_time', true);
                $event_organizer =  get_post_meta($event->ID, '_coventi_event_organizer', true);
                $date_event    = new DateTime($event_date);
               $title = $event->post_title;
               $imge_url = wp_get_attachment_url( get_post_thumbnail_id($event->ID) );
               if($date_now < $date_event){
                $status = "Upcoming";
               }else{
                $status = $event_date;
               }
               ?>
               <div class="event-card">
                <div class="event-card-header">
                    <img src="<?php _e($imge_url)?>" alt="">
                    <div class="play-btn">
                        <a href="<?php echo the_permalink($event->ID) ; ?>" class="play-button-container"> <i class="ri-play-circle-fill"></i></a>
                       
                    </div>
                </div>
                <div class="event-card-footer">
                    <h3 class="event-card-title">
                        <?php _e($title); ?>
                    </h3>
                    <div class="event-card-details">
                         <p><?php $event_organizer ? _e($event_organizer) : _e("Organizer") ?></p>
                        <p><?php _e($status) ?></p>
                        
                    </div>
                </div>
               </div>

               <?php
            }
        }

        ?>

    </div>
</div>
</div>
<?php

get_footer();
?>









<script>

setInterval(() => {
    var evtDate = document.getElementById('evtDate').value;
    var evtTime = document.getElementById('evtTime').value;

var countDownDate = new Date(evtDate + " " + evtTime).getTime();
// console.log(countDownDate);

var now = new Date().getTime();
var timeleft = countDownDate - now;
    
var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

document.getElementById("days").innerHTML = days + "d "
document.getElementById("hours").innerHTML = hours + "h " 
document.getElementById("mins").innerHTML = minutes + "m " 
document.getElementById("secs").innerHTML = seconds + "s"
}, 1000);


 

</script>