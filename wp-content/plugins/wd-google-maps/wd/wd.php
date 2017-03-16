<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    class WD{
        ////////////////////////////////////////////////////////////////////////////////////////
        // Events                                                                             //
        ////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////
        // Constants                                                                          //
        ////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////
        // Variables                                                                          //
        ////////////////////////////////////////////////////////////////////////////////////////
        public static $instance;          
        public $overview_instance;  
        public $subscribe_instance;  
				
        ////////////////////////////////////////////////////////////////////////////////////////
        // Constructor & Destructor                                                           //
        ////////////////////////////////////////////////////////////////////////////////////////
        protected function __construct() {
            // Add menu for Overview page
            add_action( 'admin_menu', array( $this, 'wd_overview_menu_page' ), 10 );

        }
        ////////////////////////////////////////////////////////////////////////////////////////
        // Public Methods                                                                     //
        ////////////////////////////////////////////////////////////////////////////////////////

        // Return an instance of this class.   
        public static function get_instance() {
            if ( null == self::$instance ) {
                self::$instance = new self;
            }
            return self::$instance;
        }
        
        // Init plugin data
        public function wd_init( $options ) {
            if(!is_array($options)){
                return false;
            }
            global $wd_options;

            if(isset( $options["prefix"] )) {
                $wd_options->prefix = $options["prefix"];
            }
            if(isset( $options["wd_plugin_id"] )) {
                $wd_options->wd_plugin_id =  $options["wd_plugin_id"];
            }
 
            if(isset( $options["plugin_title"] )) {
                $wd_options->plugin_title =  $options["plugin_title"];
            }  
            if(isset( $options["plugin_wordpress_slug"] )) {
                $wd_options->plugin_wordpress_slug =  $options["plugin_wordpress_slug"];
            } 
            if(isset( $options["plugin_dir"] )) {
                $wd_options->plugin_dir =  $options["plugin_dir"];
            }
            if(isset( $options["plugin_url"] )) {
                $wd_options->plugin_url =  $options["plugin_url"];
            }
            if(isset( $options["plugin_main_file"] )) {
                $wd_options->plugin_main_file =  $options["plugin_main_file"];
            }			

            if(isset( $options["wd_plugin_name_personal"] )) {
                $wd_options->wd_plugin_name_personal =  $options["wd_plugin_name_personal"];
            }            
            if(isset( $options["wd_plugin_name_business"] )) {
                $wd_options->wd_plugin_name_business =  $options["wd_plugin_name_business"];
            }  
            if(isset( $options["wd_plugin_name_developer"] )) {
                $wd_options->wd_plugin_name_developer =  $options["wd_plugin_name_developer"];
            } 
                        
            if(isset( $options["description"] )) {
                $wd_options->description =  $options["description"];
            } 
            if(isset( $options["addons"] )) {
                $wd_options->addons =  $options["addons"];
            } 
            if(isset( $options["plugin_features"] )) {
                $wd_options->plugin_features =  $options["plugin_features"];
            } 
            if(isset( $options["user_guide"] )) {
                $wd_options->user_guide =  $options["user_guide"];
            } 
            if(isset( $options["video_youtube_id"] )) {
                $wd_options->video_youtube_id =  $options["video_youtube_id"];
            } 
            if(isset( $options["plugin_wd_url"] )) {
                $wd_options->plugin_wd_url =  $options["plugin_wd_url"];
            } 
            if(isset( $options["plugin_wd_demo_link"] )) {
                $wd_options->plugin_wd_demo_link =  $options["plugin_wd_demo_link"];
            }            
            if(isset( $options["plugin_wd_forum_link"] )) {
                $wd_options->plugin_wd_forum_link =  $options["plugin_wd_forum_link"];
            } 
            if(isset( $options["plugin_wd_addons_link"] )) {
                $wd_options->plugin_wd_addons_link =  $options["plugin_wd_addons_link"];
            } 
            if(isset( $options["after_subscribe"] )) {
                $wd_options->after_subscribe =  $options["after_subscribe"];
            }			

			$this->wd_includes();
			$this->register_hooks();
        }

        // Create overview menu page
        public function wd_overview_menu_page() {
            global $wd_options;
			
			if( get_option( $wd_options->prefix . "_subscribe_done" ) == 1 ){
				$overview_page = add_menu_page( 'Google Maps WD', 'Google Maps WD', 'manage_options', 'overview_' . $wd_options->prefix , array( $this, 'display_overview_page' ), $wd_options->plugin_url . '/images/icon-map-20.png', 11 );
				$parent_slug = 'overview_' . $wd_options->prefix;
			}
			else{
				$subscribe_page = add_menu_page( 'Google Maps WD', 'Google Maps WD', 'manage_options', $wd_options->prefix . '_subscribe' , array( $this, 'display_subscribew_page' ), $wd_options->plugin_url . '/images/icon-map-20.png', 11 );

				require_once ( WD_DIR_INCLUDES . "/subscribe.php" );
				$subscribe_instance = new WDSubscribe(); 
				$this->subscribe_instance = $subscribe_instance;        
				add_action( 'admin_print_styles-' . $subscribe_page, array( $subscribe_instance, 'subscribe_styles' ) );
				add_action( 'admin_print_scripts-' . $subscribe_page, array( $subscribe_instance, 'subscribe_scripts' ) );
				
				$parent_slug = null;				
			}
			$overview_page = add_submenu_page( $parent_slug, __( 'Overview', $wd_options->prefix ), __( 'Overview', $wd_options->prefix ), 'manage_options', 'overview_' . $wd_options->prefix, array( $this, 'display_overview_page' )); 

			require_once ( WD_DIR_INCLUDES . "/overview.php" );
			$overview_instance = new WDOverview(); 
			$this->overview_instance = $overview_instance;        
			add_action( 'admin_print_styles-' . $overview_page, array( $overview_instance, 'overview_styles' ) );
			add_action( 'admin_print_scripts-' . $overview_page, array( $overview_instance, 'overview_scripts' ) ); 			
        }
		
		public function display_subscribew_page(){
			$this->subscribe_instance->subscribe_display_page();
		}
        
        // Display overview page
        public function display_overview_page() {
			$this->overview_instance->display_overview_page();
       }
       
       
	   // Includs
	    public function wd_includes(){
            global $wd_options;
			$current_url = 	$_SERVER['REQUEST_URI'];
			if(strpos( $current_url, "plugins.php" ) !== false ){	
				require_once( WD_DIR_INCLUDES . '/deactivate.php' );
			}
        }
		
		public function register_hooks(){
			global $wd_options;
		
			add_filter( 'plugin_action_links_' . plugin_basename( $wd_options->plugin_main_file ),  array( $this, 'change_deactivation_link' ) );
            		
		}


		public function change_deactivation_link ( $links ) {
			global $wd_options;
	
			$links["deactivate"] = '<a href="#" class="' . $wd_options->prefix . '_deactivate_link">Deactivate</a>';
			return  $links;
		}		
        ////////////////////////////////////////////////////////////////////////////////////////
        // Getters & Setters                                                                  //
        ////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////
        // Private Methods                                                                    //
        ////////////////////////////////////////////////////////////////////////////////////////
        
        ////////////////////////////////////////////////////////////////////////////////////////
        // Listeners                                                                          //
        ////////////////////////////////////////////////////////////////////////////////////////

    }



