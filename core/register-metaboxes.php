<?php
function coventi_api_metaboxes() {

	add_meta_box('coventi-api-metaboxes', 'Live Streaming Details', 'coventi_api_metaboxes_cb', 'coventi_events', 'advanced', 	'low' );
    

    function coventi_api_metaboxes_cb($post ){
        wp_nonce_field( 'coventi_api_metaboxes_cb', 'coventi_api_metaboxes_cb_nonce' );
        $is_live = get_post_meta($post->ID, 'is_live', true);
        $live_streaming_key = get_post_meta($post->ID, 'liveStreamKey', true);
        $video_url = get_post_meta($post->ID, 'liveStreamUrl', true);
        $live_video_url = get_post_meta($post->ID, 'live_video_url', true);
        $live_api_key = get_post_meta($post->ID, 'live_api_key', true);
      
        ?>
        <div class="coventi-api-metaboxes-wrapper">
            <div class="coventi-api-metaboxes-row">
                
                <div class="coventi-api-metaboxes-col">
                    <label for="live_streaming_key">
                        <?php _e('Live Streaming Key', 'coventi-streaming'); ?>
                    </label>
                    <input type="text" name="live_streaming_key" id="live_streaming_key" readonly value="<?php echo $live_streaming_key; ?>" />
                    <p>
                        <?php _e('After Saving Your post, copy the live streaming key generated to OBS studio.', 'coventi-streaming'); ?>
                    </p>
                </div>
                <div class="coventi-api-metaboxes-col">
                    <label for="video_url">
                        <?php _e('Video URl', 'coventi-streaming'); ?>
                    </label>
                    <input type="text" readonly name="video_url" id="video_url" value="<?php echo $video_url; ?>" />
                </div>
               
            </div>
          

            <?php
    }
	
}
add_action('add_meta_boxes', 'coventi_api_metaboxes');