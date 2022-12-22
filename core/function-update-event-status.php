<?php
function update_event_status(){
    $event = get_posts(
        array(
            'post_type'=>'coventi_events',
            'numberposts' => -1,
            
        )
        
    );
    foreach($event as $ev){
        $event_date = get_post_meta($ev->ID, '_coventi_events_date', true);
        

        // var_dump($ev->ID);
        
        $date_now = new DateTime();
        $date2    = new DateTime($event_date);
        $status ='';
       
       if ($date_now > $date2) {
           $status = 'past';
       }else{
          $status = 'Upcoming';
       }

       echo $status . '<br />';
        
    }
   
}
// add_filter('init', 'update_event_status');