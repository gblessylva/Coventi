<?php 

    // function coventi_events_setup(){
            
        // Add all theme's core function here
        
        // 1. Require Autoload from Vendor Folder

        

        // /require_once get_template_directory() . '/vendor/autoload.php';
        // require_once  realpath(__DIR__ . '/..').'/vendor/autoload.php';
        
        // use Coventi\Theme\Core\Coventi;
        
        
        // $google_client = new Google_Client();

        // add_action('wp_footer', function(){
        //     echo $google_client;
        // });


    // };

    

 
// // add_action('init', 'coventi_events_setup');

// include setup files
require_once get_template_directory() . '/core/pages-setup.php';
//  Inlcude the settings page files
require_once get_template_directory() . '/core/coventi-settings-page.php';
// Include API.Video files
require_once get_template_directory() . '/core/api.video.php';

// Require Metaboxes
require_once get_template_directory() . '/core/register-metaboxes.php';
// Require Custom Columns   
require_once get_template_directory() . '/core/event-custom-columns.php';
require_once get_template_directory() . '/core/register-widgets.php';
require_once get_template_directory() . '/core/function-create-pages.php';
require_once get_template_directory() . '/core/function-update-event-status.php';

