<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }
    
	/**
	 * Directories
	 */

	define( 'WD_DIR', dirname( __FILE__ ) );
	define( 'WD_DIR_INCLUDES', WD_DIR . '/includes' );
	define( 'WD_DIR_TEMPLATES', WD_DIR . '/templates' );
	define( 'WD_DIR_ASSETS', WD_DIR . '/assets' );
	define( 'WD_URL_CSS', plugins_url( plugin_basename( dirname( __FILE__ ) ) ) . '/assets/css' );
	define( 'WD_URL_JS',  plugins_url( plugin_basename( dirname( __FILE__ ) ) ) .  '/assets/js' );
	define( 'WD_URL_IMG', plugins_url( plugin_basename( dirname( __FILE__ ) ) ) .  '/assets/img' );

	/**
	 * Domain / URL / Address
     */
     
	define( 'WD_API_PLUGIN_DATA_PATH', 'http://api.web-dorado.com/v2/_id_/plugindata' );
    
    // global options
    global $wd_options;
    $wd_options = new StdClass();
    $wd_options->prefix = null;
    $wd_options->wd_plugin_id = null;
    $wd_options->plugin_title = null;
    $wd_options->plugin_wordpress_slug = null;
    $wd_options->plugin_dir = null;
    $wd_options->plugin_url = null;
    $wd_options->plugin_main_file = null;
    $wd_options->wd_plugin_name_personal = null;
    $wd_options->wd_plugin_name_business = null;
    $wd_options->wd_plugin_name_developer = null;
    $wd_options->description = null;
    $wd_options->addons = null;
    $wd_options->plugin_features = null;
    $wd_options->user_guide = null;
    $wd_options->video_youtube_id = null;
    $wd_options->plugin_wd_url = null;
    $wd_options->plugin_wd_demo_link = null;
    $wd_options->plugin_wd_forum_link = null;
    $wd_options->plugin_wd_addons_link = null;
    $wd_options->after_subscribe = null;


