<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    class WDDeactivate{
        ////////////////////////////////////////////////////////////////////////////////////////
        // Events                                                                             //
        ////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////
        // Constants                                                                          //
        ////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////
        // Variables                                                                          //
        ////////////////////////////////////////////////////////////////////////////////////////
		public $deactivate_reasons = array();
		// Reason IDs
		const REASON_PLUGIN_IS_HARD_TO_USE_TECHNICAL_PROBLEMS = "reason_plugin_is_hard_to_use_technical_problems";
		const REASON_FREE_VERSION_IS_LIMITED_PRO_EXPENSIVE = "reason_free_version_limited_premium_expensive";	
		const REASON_UPGRADING_TO_PAID_VERSION = "reason_upgrading_to_paid_version";		
		const REASON_TEMPORARY_DEACTIVATION = "reason_temporary_deactivation";

        ////////////////////////////////////////////////////////////////////////////////////////
        // Constructor & Destructor                                                           //
        ////////////////////////////////////////////////////////////////////////////////////////
        public function __construct() {
			global $wd_options;

			$this->deactivate_reasons = array(
				1 => array(
					'id'    => self::REASON_PLUGIN_IS_HARD_TO_USE_TECHNICAL_PROBLEMS,
					'text'  => __( 'Technical problems / hard to use', $wd_options->prefix ),	
				),
				2 => array(
					'id'    => self::REASON_FREE_VERSION_IS_LIMITED_PRO_EXPENSIVE,
					'text'  => __( 'Free version is limited / premium is expensive', $wd_options->prefix ),	
				),				
				3 => array(
					'id'    => self::REASON_UPGRADING_TO_PAID_VERSION,
					'text'  => __( 'Upgrading to paid version', $wd_options->prefix ),	
				),
				4 => array(
					'id'    => self::REASON_TEMPORARY_DEACTIVATION,
					'text'  => __( 'Temporary deactivation', $wd_options->prefix ),	
				),					
			);
			
			add_action( 'admin_footer', array( $this, 'add_deactivation_feedback_dialog_box' ) );	
			add_action( 'admin_init', array( $this, 'submit_and_deactivate' ) );	
			
			add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );			

        }
        ////////////////////////////////////////////////////////////////////////////////////////
        // Public Methods                                                                     //
        ////////////////////////////////////////////////////////////////////////////////////////
        public function add_deactivation_feedback_dialog_box(){
			$deactivate_reasons = $this->deactivate_reasons;
			global $wd_options;
			require_once( WD_DIR_TEMPLATES . '/display_deactivation_popup.php' );
		}

		public function scripts(){
			global $wd_options;
			wp_enqueue_style( $wd_options->prefix . '-deactivate-popup', WD_URL_CSS . '/deactivate_popup.css', array(), get_option($wd_options->prefix . "_version" ) );
			wp_enqueue_script( $wd_options->prefix . '-deactivate-popup', WD_URL_JS . '/deactivate_popup.js');

		    wp_localize_script( $wd_options->prefix . '-deactivate-popup', 'WDDeactivateVars', array(
				"prefix" => $wd_options->prefix ,
				"deactivate_class" => $wd_options->prefix . '_deactivate_link'
			));
			 
		}
		public function submit_and_deactivate(){
			global $wd_options;
			if( isset( $_POST[$wd_options->prefix . "_submit_and_deactivate"] ) ){
				
				if( $_POST[$wd_options->prefix . "_submit_and_deactivate"] == 2 ){
					$api = new WDApi();	
					$hash = $api->get_hash();
					if($hash != null){
						$data = array();
						
						$data["reason"] = isset($_POST[$wd_options->prefix . "_reasons"]) ? $_POST[$wd_options->prefix . "_reasons"] : "";
						$data["site_url"] = site_url();
						$data["plugin_slug"] = $wd_options->plugin_wordpress_slug;
						$data["additional_details"] = isset($_POST[$wd_options->prefix . "_additional_details"]) ? $_POST[$wd_options->prefix . "_additional_details"] : "";
						$data["hash"] = $hash;
						$response = wp_remote_post( "http://api.web-dorado.com/deactivatereasons", array(
							'method' => 'POST',
							'timeout' => 45,
							'redirection' => 5,
							'httpversion' => '1.0',
							'blocking' => true,
							'headers' => array(),
							'body' => json_encode($data),
							'cookies' => array()
							)
						);
						
						$response_body = isset( $response["body"] ) ? json_decode( $response["body"], true ) : null;
						if( is_array( $response_body ) && $response_body["body"]["msg"] == "Access" )	{
							 
						}						
					}	
				} 
				
				$deactivate_url = 
					add_query_arg(
						array(
							'action' => 'deactivate',
							'plugin' => $wd_options->plugin_wordpress_slug . '/' . $wd_options->plugin_wordpress_slug . '.php',		
							'_wpnonce' => wp_create_nonce( 'deactivate-plugin_' . $wd_options->plugin_wordpress_slug. '/' . $wd_options->plugin_wordpress_slug . '.php')
						),
						admin_url( 'plugins.php' )
					);  
			   wp_redirect( $deactivate_url ); 

			}
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
	new WDDeactivate();
	
