<?php global $bbcrm_option;?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?php echo $bbcrm_option["bbcrm_design_favicon"];?>" />
<?php wp_head(); ?> 

<?php echo "</he"."ad>";?>
<body <?php body_class(); ?> id="pageBody">


<!--++++++++++++++ Main Menu Start +++++++++++++++++++++++++-->
<div class="theme-background1-dk container-fluid">
	<div class="container" style="text-align: right;">
		<div class="col-md-12" style="margin-bottom: 8px !important;">
			<div style="display:inline-block;"><?php echo do_shortcode('[bbcrm_loginbar]');?></div>
			<div style="display:inline-block;"><?php do_action('wpml_add_language_selector'); ?></div>
		</div>
	</div>
</div>
<div id="mainheader1" class="theme-background2-dk">

    <div class="container">

        <div class="divPanel topArea notop nobottom" >
            <div class="row">
                <div class="col-md-12" style="margin-bottom:0; ">

                   <div id="divLogo" class="pull-left">
			   <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo '<img src="'.$bbcrm_option["bbcrm_design_logo"].'">'; ?> </a>
                    </div>

                    <div id="divMenuRight" class="pull-right">
                    <div class="navbar">
                       <div id="abby" class="nav-collapse navbar-collapse single-page-nav collapse">
                        
                        <?php 
			$defaults = array(
					'theme_location'  => 'primary',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="nav" class="nav nav-pills ddmenu">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
					);
			wp_nav_menu($defaults); ?>                    
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--++++++++++++++ Main Menu End +++++++++++++++++++++++++-->
