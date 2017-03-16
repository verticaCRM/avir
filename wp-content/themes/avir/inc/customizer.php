<?php
/**
 * Avir Theme Customizer
 *
 * @package Avir
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'avir_textarea_register' ) ) :
 
 function avir_textarea_register($wp_customize){
	class avir_Customize_avir_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
        
      
        <h1><?php _e( 'Get Avir PRO Theme!  Just $19', 'bbcrm' ); ?></h1>
		<div class="theme-info"> 
			<a title="<?php esc_attr_e( 'Upgrade to Avir PRO Theme', 'bbcrm' ); ?>" href="<?php echo esc_url( 'http://arinio.com/avir-responsive-multipurpose-wordpress-theme/' ); ?>" target="_blank">
			<?php _e( 'Upgrade to Avir PRO Theme', 'bbcrm' ); ?>
			</a>
			<a title="<?php esc_attr_e( 'View More our themes', 'bbcrm' ); ?>" href="<?php echo esc_url( 'http://arinio.com/' ); ?>" target="_blank">
			<?php _e( 'View More our themes', 'bbcrm' ); ?>
			</a>
			 
			<a href="<?php echo esc_url( 'http://arinio.com/support/' ); ?>" title="<?php esc_attr_e( 'Free Support', 'bbcrm' ); ?>" target="_blank">
			<?php _e( 'Free Support', 'bbcrm' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://arinio.com/avir-responsive-multipurpose-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'View Demo', 'bbcrm' ); ?>" target="_blank">
			<?php _e( 'View Demo', 'bbcrm' ); ?>
			</a>
           <a href="<?php echo esc_url( 'http://arinio.com/get-free-our-theme/' ); ?>" title="<?php esc_attr_e( 'Get Free Pro Version', 'bbcrm' ); ?>" target="_blank">
			<?php _e( 'Get Free Pro Version', 'bbcrm' ); ?>
			</a>
		</div>
		<?php
		}
	}
 
}



add_action('customize_register', 'avir_textarea_register');
endif;

 
if ( ! function_exists( 'avir_customize_register' ) ) : 
function avir_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	 
	 
	 
	 
	 $wp_customize->add_section('avir_upgrade', array(
		'title'					=> __('Avir Support', 'bbcrm'),
		'description'			=> __('You are using the Avir, Free Version of Avir Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work ,Gallery, Team section, Client Section ,Social Link Section and  Life time theme support and much more. ','bbcrm'),
		'priority'				=> 1,
	));
	$wp_customize->add_setting( 'avir_theme_settings[avir_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new avir_Customize_avir_upgrade(
		$wp_customize,
		'avir_upgrade',
			array(
				'label'					=> __('Avir Upgrade','bbcrm'),
				'section'				=> 'avir_upgrade',
				'settings'				=> 'avir_theme_settings[avir_upgrade]',
			)
		)
	);
	
}
add_action( 'customize_register', 'avir_customize_register' );
endif;

if ( ! function_exists( 'avir_customize_preview_js' ) ) :
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since avir 1.0
 */
function avir_customize_preview_js() {
	wp_enqueue_script( 'avir_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), rand(),  true );
}
add_action( 'customize_preview_init', 'avir_customize_preview_js' );
endif;
 

if ( ! function_exists( 'avir_theme_customizer' ) ) :
/**
 * Implement the Custom Logo feature
 */
function avir_theme_customizer( $wp_customize ) {
   
   $wp_customize->add_section( 'avir_logo_section' , array(
    'title'       => __( 'Basic Setting', 'bbcrm' ),
    'description' => __( 'This Is a Basic Setting Section For Frontpage', 'bbcrm' ),
) );
   $wp_customize->add_setting( 'avir_logo', array(
        'sanitize_callback' => 'avir_sanitize_upload',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avir_logo', array(
    'label'    => __( 'Site Logo', 'bbcrm' ),
    'section'  => 'avir_logo_section',
    'settings' => 'avir_logo',
	)));
	
	
	
	 $wp_customize->add_setting( 'avir_logo2', array(
        'sanitize_callback' => 'avir_sanitize_upload',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avir_logo2', array(
    'label'    => __( 'Favicon', 'bbcrm' ),
    'section'  => 'avir_logo_section',
    'settings' => 'avir_logo2',
	)));
	
	
	 
	$wp_customize->add_setting(
	    'avir_copyright_text', array(
		    'default' => __( 'Copyright', 'bbcrm' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'avir_sanitize_text',
	    )
	);
	
	$wp_customize->add_control(
		'avir_copyright_text', array(
			'label'    => __( 'Copyright Text', 'bbcrm' ),
			'section' => 'avir_logo_section',
			'type' => 'text',
		)
	);
	
		$wp_customize->add_setting(
	    'avir_custom_css', array(
		    'default' => __( '', 'bbcrm' ),
			'capability' => 'edit_theme_options', 
		    'sanitize_callback' => 'wp_filter_nohtml_kses',
	    )
	);
	
	$wp_customize->add_control(
		'avir_custom_css', array(
			'label'    => __( 'Custom CSS', 'bbcrm' ),
			'section' => 'avir_logo_section',
			'type' => 'textarea',
		)
	);
	
	
}
add_action('customize_register', 'avir_theme_customizer');
endif; 
 
if ( ! function_exists( 'avir_add_customizer_custom_controls' ) ) :
/* 
 * USE TO divide a section in to smaller sections
 */
function avir_add_customizer_custom_controls( $wp_customize ) {
	//  Add Custom Subtitle
	//  =============================================================================
	class avir_sub_title extends WP_Customize_Control {
		public $type = 'sub-title';
		public function render_content() {
		?>
			<h2 class="avir-custom-sub-title"><?php echo esc_html( $this->label ); ?></h2>
		<?php
		}
	}
	//  Add Custom Description
	//  =============================================================================
	class avir_description extends WP_Customize_Control {
		public $type = 'description';
		public function render_content() {
		?>
			<p class="avir-custom-description"><?php echo esc_html( $this->label ); ?></p>
		<?php
		}
	}
	
	class avir_footer extends WP_Customize_Control {
		public $type = 'footer';
		public function render_content() {
		?>
			<hr />
		<?php
		}
	}
}
add_action( 'customize_register', 'avir_add_customizer_custom_controls' );
endif;



 







if ( ! function_exists( 'avir_slider_text_boxes_options' ) ) :
function avir_slider_text_boxes_options( $wp_customize ){
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Slider 1', 'bbcrm' ),
		'two'		=> __( 'Slider 2', 'bbcrm' ),
		 
	);
	$wp_customize->add_section( 'avir_customizer_slider_text_boxes', array(
		'title'    => __( 'Slider Setting', 'bbcrm' ),
		'description'    => __( 'You can upload here images for slider', 'bbcrm' ),
		
	));
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'avir_slider_' . $key . '_sub_title', array(
            'sanitize_callback' => 'avir_sanitize_text',
        ));
		$wp_customize->add_control( 
			new avir_sub_title( $wp_customize, 'avir_slider_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'avir_customizer_slider_text_boxes',
					'settings'  => 'avir_slider_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
		/* File Upload */
		$wp_customize->add_setting( 'avir_header_slider-'.$key.'-file-upload', array(
            'sanitize_callback' => 'avir_sanitize_upload',
        ) );
		$wp_customize->add_control(
		    new WP_Customize_Upload_Control($wp_customize, 'avir_header_slider-'.$key.'-file-upload', array(
		            'label' => __( 'File Upload', 'bbcrm' ),
		            'section' => 'avir_customizer_slider_text_boxes',
		            'settings' => 'avir_header_slider-'.$key.'-file-upload',
		            'priority' => $i_priority++
		        )
		    )
		);
		
		/* URL */
		$wp_customize->add_setting( 'avir_header_slider_'.$key.'_url', array(
		        'default' => __( 'Title', 'bbcrm' ),
				'sanitize_callback' => 'avir_sanitize_text',
			) 
		);
		$wp_customize->add_control('avir_header_slider_'.$key.'_url', array(
				'label'    => __( 'Slider Title', 'bbcrm' ),
				'section' => 'avir_customizer_slider_text_boxes',
				'settings' => 'avir_header_slider_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
		
		
		/* URL */
		$wp_customize->add_setting( 'avir_header_slider_'.$key.'_subtitle', array(
		        'default' => __( 'Sub Title', 'bbcrm' ),
				'sanitize_callback' => 'avir_sanitize_text',
			) 
		);
		$wp_customize->add_control('avir_header_slider_'.$key.'_subtitle', array(
				'label'    => __( 'Slider Sub Title', 'bbcrm' ),
				'section' => 'avir_customizer_slider_text_boxes',
				'settings' => 'avir_header_slider_'.$key.'_subtitle',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
		
		
		
		
		
		
		
		
		
		
	
		/* Featured Header Text */
		$wp_customize->add_setting('avir_featured_textbox_header_slider_'.$key, array(
		        'default' => __( 'Description', 'bbcrm' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'avir_sanitize_text',
		    )
		);
		$wp_customize->add_control('avir_featured_textbox_header_slider_'.$key, array(
				'label' => __( 'Slider Description', 'bbcrm' ),
				'section' => 'avir_customizer_slider_text_boxes',
				'settings' => 'avir_featured_textbox_header_slider_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'avir_slider_' . $key . '_footer', array(
            'sanitize_callback' => 'avir_sanitize_text',
        ));
		$wp_customize->add_control( 
			new avir_footer( $wp_customize, 'avir_slider_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'avir_customizer_slider_text_boxes',
			'settings'  => 'avir_slider_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
}
add_action( 'customize_register', 'avir_slider_text_boxes_options' );
endif;




if ( ! function_exists( 'servicesText_customizer' ) ) :
function servicesText_customizer( $wp_customize ) {
	
	$list_feature_modules = array( // 1
		'one'		=> __( 'Icon 1', 'bbcrm' ),
		'two'		=> __( 'Icon 2', 'bbcrm' ),
		'three'		=> __( 'Icon 3', 'bbcrm' ),
		'four'		=> __( 'Icon 4', 'bbcrm' ),
	);
	
	
    $wp_customize->add_section( 'avir_servicesText_section_contact', array(
	     'title'       => __( 'Services Setting', 'bbcrm' ),
	     'description' => __( 'This is a Services settings section to change the servise section Details.', 'bbcrm' ),
        )
    );
	
	
	
	
	$i_priority = 1;
	
	foreach ($list_feature_modules as $key => $value) {
	
		/* Add sub title */
		$wp_customize->add_setting( 'avir_services_' . $key . '_sub_title', array(
            'sanitize_callback' => 'avir_sanitize_text',
        ));
		$wp_customize->add_control( 
			new avir_sub_title( $wp_customize, 'avir_services_' . $key . '_sub_title', array(
					'label'		=> $value,
					'section'   => 'avir_servicesText_section_contact',
					'settings'  => 'avir_services_' . $key . '_sub_title',
					'priority' 	=> $i_priority++ 
				) 
			) 
		);
	 
		
		/* Class */
		$wp_customize->add_setting( 'avir_header_servicesicon_'.$key.'_url', array(
		        'default' => __( 'Font class Name', 'bbcrm' ),
				'sanitize_callback' => 'avir_sanitize_text',
			) 
		);
		$wp_customize->add_control('avir_header_servicesicon_'.$key.'_url', array(
				'label'    => __( 'Class Name', 'bbcrm' ),
				'section' => 'avir_servicesText_section_contact',
				'settings' => 'avir_header_servicesicon_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Title */
		$wp_customize->add_setting( 'avir_header_services_'.$key.'_url', array(
		        'default' => __( 'Title', 'bbcrm' ),
				'sanitize_callback' => 'avir_sanitize_text',
			) 
		);
		$wp_customize->add_control('avir_header_services_'.$key.'_url', array(
				'label'    => __( 'Title', 'bbcrm' ),
				'section' => 'avir_servicesText_section_contact',
				'settings' => 'avir_header_services_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
		/* Link */
		$wp_customize->add_setting( 'avir_header_serviceslink_'.$key.'_url', array(
		        'default' => __( '', 'bbcrm' ),
				'sanitize_callback' => 'avir_sanitize_text',
			) 
		);
		$wp_customize->add_control('avir_header_serviceslink_'.$key.'_url', array(
				'label'    => __( 'Link', 'bbcrm' ),
				'section' => 'avir_servicesText_section_contact',
				'settings' => 'avir_header_serviceslink_'.$key.'_url',
				'type' => 'text',
				'priority' => $i_priority++
			)
		);
	
	
	
		/* Featured Header Text */
		$wp_customize->add_setting('avir_featured_textbox_header_services_'.$key, array(
		        'default' => __( 'Description', 'bbcrm' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'avir_sanitize_text',
		    )
		);
		$wp_customize->add_control('avir_featured_textbox_header_services_'.$key, array(
				'label' => __( 'Services Description', 'bbcrm' ),
				'section' => 'avir_servicesText_section_contact',
				'settings' => 'avir_featured_textbox_header_services_'.$key,
				'type' => 'textarea',
				'priority' => $i_priority++
			)
		);
		
		 
		/* Add footer bar */
		$wp_customize->add_setting( 'avir_services_' . $key . '_footer', array(
            'sanitize_callback' => 'avir_sanitize_text',
        ));
		$wp_customize->add_control( 
			new avir_footer( $wp_customize, 'avir_services_' . $key . '_footer', array(
			'label'		=> $value,
			'section'   => 'avir_servicesText_section_contact',
			'settings'  => 'avir_services_' . $key . '_footer',
			'priority' 	=> $i_priority++
		) ) );
	}// end foreach	
	
	$wp_customize->add_setting(
	    'avir_maiN_heading', array(
		    'default' => __( 'Heading', 'bbcrm' ),
			'transport' => 'postMessage',
		    'sanitize_callback' => 'avir_sanitize_text',
	    )
	);
	
	
	$wp_customize->add_control(
		'avir_maiN_heading', array(
			'label'    => __( 'Main Heading', 'bbcrm' ),
			'section' => 'avir_servicesText_section_contact',
			'type' => 'text',
			'priority' => '19',
		)
	);
	
	
	
	 
	
	
	
	
	
	
	
	
	
}
add_action( 'customize_register', 'servicesText_customizer' );
endif;



 

















 






 
if ( ! function_exists( 'avir_sanitize_text' ) ): 
// SANITIZATION
// ==============================
// Sanitize Text
function avir_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
endif;

if ( ! function_exists( 'avir_sanitize_textarea' ) ) :
// Sanitize Textarea
function avir_sanitize_textarea($input) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}
endif;

if ( ! function_exists( 'avir_sanitize_checkbox' ) ) :
// Sanitize Checkbox
function avir_sanitize_checkbox( $input ) {
	if( $input ):
		$output = '1';
	else:
		$output = false;
	endif;
	return $output;
}
endif;

if ( ! function_exists( 'avir_sanitize_integer' ) ) :
// Sanitize Numbers
function avir_sanitize_integer( $input ) {
	$value = (int) $input; // Force the value into integer type.
    return ( 0 < $input ) ? $input : null;
}
endif;

if ( ! function_exists( 'avir_sanitize_float' ) ) :
function avir_sanitize_float( $input ) {
	return floatval( $input );
}
endif;

if ( ! function_exists( 'avir_sanitize_upload' ) ) :
// Sanitize Uploads
function avir_sanitize_upload($input){
	return esc_url_raw($input);	
}
endif;

if ( ! function_exists( 'avir_sanitize_hex' ) ) :
// Sanitize Colors
function avir_sanitize_hex($input){
	return maybe_hash_hex_color($input);
}
endif;

if ( ! function_exists( 'customize_styles_avir_upgrade' ) ) :
function customize_styles_avir_upgrade( $input ) { ?>
	   <style type="text/css">
		#customize-theme-controls #accordion-section-avir_upgrade .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-avir_upgrade .accordion-section-title {
			background-color: rgba(113, 176, 47, 0.9);
			color: #fff;
		}
		#customize-theme-controls #accordion-section-avir_upgrade .accordion-section-title:hover {
			background-color: rgba(113, 176, 47, 1);
		}
		#customize-theme-controls #accordion-section-avir_upgrade .theme-info a {
			padding: 10px 8px;
			display: block;
			border-bottom: 1px solid #eee;
			color: #555;
		}
		#customize-theme-controls #accordion-section-avir_upgrade .theme-info a:hover {
			color: #222;
			background-color: #f5f5f5;
		}
		h1 {
		line-height: 25px;
		}
	</style>
<?php }
 
add_action( 'customize_controls_print_styles', 'customize_styles_avir_upgrade');
endif;






if ( ! function_exists( 'avir_reorder_sections_theme_customizer' ) ) :
/* Wait until all sections are created then re-order them */
function avir_reorder_sections_theme_customizer($wp_customize){
	
	$wp_customize->get_section('title_tagline')->priority = 2;
	$wp_customize->get_section('avir_logo_section')->priority = 3;
	$wp_customize->get_section('nav')->priority = 4;
	$wp_customize->get_section('header_image')->priority = 6;
	$wp_customize->get_section('colors')->priority = 7;
	 
	
	$wp_customize->get_section('static_front_page')->priority = 11;
	$wp_customize->get_section('avir_customizer_slider_text_boxes')->priority = 14;
	$wp_customize->get_section('avir_logo_section')->priority = 15;
$wp_customize->get_section('avir_servicesText_section_contact')->priority = 16;
 
}
add_action('customize_register', 'avir_reorder_sections_theme_customizer');
endif;

