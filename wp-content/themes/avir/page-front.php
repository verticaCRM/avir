<?php
/*
	Template Name: Front Page
	Design Theme's Front Page to Display the Home Page if Selected
	
*/
global $wp_query,$bbcrm_option;
//ini_set('display_errors',true);
//error_reporting(E_ALL);

$pagetitle = get_bloginfo('name');
get_header(); ?>

<div class="" style="">
		<?php 
		while(have_posts()):
		the_post();
		the_content();
		endwhile;
		?>
</div>
<div style="height:2em;"></div>
<div class="container">
	<div class="divPanel page-content" >
	<!--++++++++++++++ Service Section Start +++++++++++++++++++++++++-->
		<?php
			$list_featureboxes2 = array(
				'one' 		=> __('Icon 1', 'bbcrm'),
				'two'		=> __( 'Icon 2', 'bbcrm' ),
				'three'		=> __( 'Icon 3', 'bbcrm' ),
				'four'		=> __( 'Icon 4', 'bbcrm' ),
			);
		?>
		<div class="row" style="height:83px;">
			<?php foreach($list_featureboxes2 as $key => $value){ ?>
			<div class="col-md-3 ">
				<div class="menu12 theme-service-background-<?php echo $key;?>" >
					<?php if(get_theme_mod('avir_header_serviceslink_'.$key.'_url')): echo '<a href="'.esc_html( get_theme_mod( 'avir_header_serviceslink_'.$key.'_url' ) ).'">'; else: echo '';  endif; ?>
					<div>
						<i class="fa <?php if(get_theme_mod('avir_header_servicesicon_'.$key.'_url')): echo esc_html( get_theme_mod( 'avir_header_servicesicon_'.$key.'_url' ) ); else: echo "fa-desktop";  endif;?> main-color"  ></i>
					</div>
					<?php if(get_theme_mod('avir_header_serviceslink_'.$key.'_url')): echo '</a>'; else: echo '';  endif; ?>
				</div>
				<h3 style="text-align:center;"><?php if(get_theme_mod('avir_header_services_'.$key.'_url')): _e( get_theme_mod( 'avir_header_services_'.$key.'_url' ),'bbcrm' ); else: echo __('TITLE', 'bbcrm');  endif;?></h3>
				<p style="text-align:center;" >
					<?php if(get_theme_mod('avir_featured_textbox_header_services_'.$key)): echo esc_html( get_theme_mod( 'avir_featured_textbox_header_services_'.$key ) ); else: echo __('Description', 'bbcrm');  endif;?>
				</p>
			</div>
			<?php } ?>
		</div> 
    <!--++++++++++++++ Service Section End +++++++++++++++++++++++++-->
<div style="clear:both">
<h2 style="text-align:center !important">Businesses for Sale</h2>
</div>
            <?php echo do_shortcode('[featuredlistings]');?>
<div style='clear:both'></div>
</div></div>

</div>

<div class="container">
<p id="back-top" style="display: block;">
		<a href="#top"><span><i class="fa fa-arrow-up main-arrow"></i> </span></a>
</p>
</div>

  

 
<?php get_footer();
