<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }
    class WDSubscribe {
        // //////////////////////////////////////////////////////////////////////////////////////
        // Events                                                                              //
        // //////////////////////////////////////////////////////////////////////////////////////
        // //////////////////////////////////////////////////////////////////////////////////////
        // Constants //
        // //////////////////////////////////////////////////////////////////////////////////////
        // //////////////////////////////////////////////////////////////////////////////////////
        // Variables //
        // //////////////////////////////////////////////////////////////////////////////////////
        // //////////////////////////////////////////////////////////////////////////////////////
        // Constructor & Destructor //
        // //////////////////////////////////////////////////////////////////////////////////////
		public function __construct(){
			add_action( 'admin_init', array( $this, 'after_subscribe' ) );
		}
        // //////////////////////////////////////////////////////////////////////////////////////
        // Public Methods //
        // //////////////////////////////////////////////////////////////////////////////////////
        
        public function subscribe_scripts() {
            global $wd_options;
            wp_register_script ( 'subscribe_js', WD_URL_JS . '/subsribe.js' );
            wp_enqueue_script ( 'subscribe_js' ); 
			
        }
        public function subscribe_styles() {
            global $wd_options;			
            wp_enqueue_style( $wd_options->prefix . 'subscribe',  WD_URL_CSS . '/subscribe.css' );

        }	

        public function subscribe_display_page() {
            global $wd_options;
            $list = array(
                0 => array(
                    "title" => __( "Your name &", $wd_options->prefix ),
                    "small_text" => __( "Email address", $wd_options->prefix ),
                    "img" => WD_URL_IMG . '/sub_1.png',
                ),
                1 => array(
                    "title" => __( "Site URL", $wd_options->prefix ),
                    "small_text" => __( "Wordpress version", $wd_options->prefix ),
                    "img" => WD_URL_IMG . '/sub_2.png',
                ),
                2 => array(
                    "title" => __( "List of plugins", $wd_options->prefix ),
                    "small_text" => "",
                    "img" => WD_URL_IMG . '/sub_4.png',
                ), 				
            );

            require_once ( WD_DIR_TEMPLATES . "/display_subscribe.php" );
        }	
		public function after_subscribe(){
			if( isset( $_GET["sub_action"] ) ){
				global $wd_options;
				if( $_GET["sub_action"] == "allow" ){
					$api = new WDApi();	
					$hash = $api->get_hash();
					
					if( $hash != null ){
						$all_plugins = array();
						$plugins = get_plugins();
						foreach ( $plugins as $slug => $data ) {
							$plugin = array(
								"Name" => $data["Name"],
								"PluginURI" => $data["PluginURI"],
								"Author" => $data["Author"],
								"AuthorURI" => $data["AuthorURI"]
							);
							$all_plugins[$slug] = $plugin;
						}
						
						$data = array();
						$data["site_url"] = site_url();

						$admin_data = wp_get_current_user();

						$user_first_name = get_user_meta( $admin_data->ID, "first_name", true );
						$user_last_name = get_user_meta( $admin_data->ID, "last_name", true );
						
						$data["name"] = $user_first_name || $user_last_name ? $user_first_name . " " . $user_last_name : $admin_data->data->user_login;
				
						$data["email"] = $admin_data->data->user_email;
						$data["wp_version"] = get_bloginfo( 'version' );
						$data["plugin_id"] = $wd_options->wd_plugin_id;
						$data["hash"] = $hash;
						$data["all_plugins"] = $all_plugins;
		

						$response = wp_remote_post( "http://api.web-dorado.com/collectuserdata", array(
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
				if ( get_option( $wd_options->prefix . "_subscribe_done" ) != 1 ) {
					update_option( $wd_options->prefix . "_subscribe_done", 1 );
				}
				else {
					add_option( $wd_options->prefix . "_subscribe_done" , "1",  '',  'no');
				}				
				
				wp_safe_redirect( "admin.php?page=" . $wd_options->after_subscribe );
			}

		}			
        // //////////////////////////////////////////////////////////////////////////////////////
        // Getters & Setters //
        // //////////////////////////////////////////////////////////////////////////////////////
        // //////////////////////////////////////////////////////////////////////////////////////
        // Private Methods //
        // //////////////////////////////////////////////////////////////////////////////////////  
        // //////////////////////////////////////////////////////////////////////////////////////
        // Listeners //
        // //////////////////////////////////////////////////////////////////////////////////////    
    }
