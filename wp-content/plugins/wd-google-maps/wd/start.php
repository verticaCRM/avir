<?php	
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }	


    // load files
    require_once dirname( __FILE__ ) . '/require.php';   
    
    /**
     * @param options for Plugin details.
     * prefix; 
     * wd_plugin_id; 
     * plugin_title; 
     * plugin_dir; 
     * plugin_url; 
     * wd_plugin_name_personal; 
     * wd_plugin_name_business; 
     * wd_plugin_name_developer;  
     * description; 
     * addons; 
     * plugin_features; 
     * user_guide; 
     */       
            
    function wd_init( $options ) {
        $wd = WD::get_instance();
        $wd->wd_init( $options );

    }
    
    

        
