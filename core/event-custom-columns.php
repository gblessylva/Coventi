<?php
add_filter( 'manage_coventi_events_posts_columns', 'add_coventti_post_columns' );
function add_coventti_post_columns($columns) {
    unset( $columns['author'] );
    $columns['stream_key'] = __( 'Stream Key', 'coventi_streaming' );
    $columns['video_link'] = __( 'Video Link', 'coventi_events' );
    $columns['_coventi_events_description'] = __( 'Event Description', 'coventi_events' );
    $columns['_coventi_events_price'] = __( 'Price', 'coventi_events' );
    $columns['_coventi_events_type'] = __( 'Event Type', 'coventi_events' );
    $columns['_coventi_events_date'] = __( 'Event Date', 'coventi_events' );
    $columns['_coventi_events_start_time'] = __( 'Event Time', 'coventi_events' );
  

    // Move date to the last column
    $date = $columns['date'];
    unset( $columns['date'] );
    $columns['date'] = $date;



    return $columns;
}

add_action( 'manage_coventi_events_posts_custom_column', 'coventi_post_columns', 10, 2 );
function coventi_post_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'stream_key':
            echo get_post_meta( $post_id, 'liveStreamKey', true );
            break;
        case 'video_link':
            echo get_post_meta( $post_id, 'liveStreamUrl', true );
            break;
        case '_coventi_events_price':
            // Check if price is free
            if ( get_post_meta( $post_id, '_coventi_events_price', true ) == 0 ) {
                echo 'Free';
            } else {
                echo get_post_meta( $post_id, '_coventi_events_price', true );
            }
           
            break;

        case '_coventi_events_type':
            $stream_type = get_post_meta( $post_id, '_coventi_events_type', true );
            if ( $stream_type == 'live-stream' ) {
                echo 'Live Stream';
            } 
            elseif ( $stream_type == 'video-on-demand' ) {
                echo 'Video on Demand';
            }else {
                echo '';
            }
           
            break;
        
        case '_coventi_events_date':
            echo get_post_meta( $post_id, '_coventi_events_date', true );
            break;
        case '_coventi_events_start_time':
            echo get_post_meta( $post_id, '_coventi_events_start_time', true );
            break;
        case '_coventi_events_description':
            // strip description to first 100 characters
            $description = get_post_meta( $post_id, '_coventi_events_description', true );
            $description = substr($description, 0, 100);
            echo $description;
            break;
    }

}


// Make culumns sortable
add_filter( 'manage_edit-coventi_events_sortable_columns', 'coventi_events_sortable_columns' );

function coventi_events_sortable_columns( $columns ) {
    $columns['stream_key'] = 'stream_key';
    $columns['video_link'] = 'video_link';
    $columns['_coventi_events_description'] = '_coventi_events_description';
    $columns['_coventi_events_price'] = '_coventi_events_price';
    $columns['_coventi_events_type'] = '_coventi_events_type';
    $columns['_coventi_events_date'] = '_coventi_events_date';
    $columns['_coventi_events_start_time'] = '_coventi_events_start_time';
    return $columns;
}
