<?php
// Api.Video integration

function video_api_check($post_id){
// check if stream key exists
    $stream_key = get_post_meta($post_id, 'liveStreamKey', true);
if( !$stream_key){
$url = 'https://sandbox.api.video/auth/api-key';
$stream_url = 'https://ws.api.video/live-streams';
$key = 'Qa93QLhTw65NeHAEYrgA2mn9KFojchxUFcyVCKjAqxK';
$response = wp_remote_request($url, array(
    'method' => 'POST',
    'headers' => array(
        'Authorization' => 'Bearer ' . $key,
        'Content-Type' => 'application/json',
    
    ),
    'body' => json_encode(array(
        'apiKey' => $key,
    )),
));

$body = json_decode(wp_remote_retrieve_body($response));

    $stream_response = wp_remote_request($stream_url, array(
        'method' => 'POST',
        'headers' => array(
            'Authorization' => 'Bearer ' . $body->access_token,
            'Content-Type' => 'application/json',
        
        ),
        'body' => json_encode(array(
            'name' => get_the_title($post_id),
            'record' => false,
            'public' => true,
    
    
          
        )),
    ));
    $stream_body = json_decode(wp_remote_retrieve_body($stream_response));
    
    // var_dump($stream_body);
    $liveStreamID = $stream_body->liveStreamId;
    $liveStreamKey = $stream_body->streamKey;
    $liveStreamUrl = $stream_body->assets->player;
    $iframe = $stream_body->assets->iframe;
    $hls = $stream_body->assets->hls;
    $thumbnail = $stream_body->assets->thumbnail;

    update_post_meta($post_id, 'liveStreamID', $liveStreamID);
    update_post_meta($post_id, 'liveStreamKey', $liveStreamKey);
    update_post_meta($post_id, 'liveStreamUrl', $liveStreamUrl);
    update_post_meta($post_id, 'iframe', $iframe);
    update_post_meta($post_id, 'hls', $hls);
    update_post_meta($post_id, 'thumbnail', $thumbnail);
}
}

// add_action('init', 'video_api_check');



