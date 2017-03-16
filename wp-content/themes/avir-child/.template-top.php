<?php

$settings  = sh_set(sh_set(get_post_meta(get_the_ID(), 'sh_page_meta', true) , 'sh_page_options') , 0);
//$settings  = _WSH()->option();
$meta = _WSH()->get_meta('_sh_layout_settings');
$meta1 = _WSH()->get_meta('_sh_header_settings');
$meta2 = _WSH()->get_meta();
//printr($meta); 
_WSH()->page_settings = $meta;
$layout = sh_set( $meta, 'layout', 'full' );
//if( !$layout || $layout == 'full' || sh_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
$sidebar = sh_set( $meta, 'sidebar', 'product-sidebar' );

$classes = ( !$layout || $layout == 'full' || sh_set($_GET, 'layout_style')=='full' ) ? ' col-md-12 col-sm-12 col-xs-12' : ' col-md-8 col-sm-8 col-xs-12';
$bg = sh_set( $meta1, 'bg_image' );
$title = sh_set( $meta1, 'header_title' );

$bg = wp_get_attachment_url(200);


global $wp_query;

//print_r($wp_query);

global $pagetitle,$sidebar;

if(is_home()){
$title = $pagetitle;
}
if(is_page()){
$title = get_the_title();
}

if(is_front_page()){
$title = get_bloginfo("description");
}


if(isset($pagetitle)){
  $title = $pagetitle;
}

if(get_query_var('listing') || is_search()){
global $listing;
//echo "!!LISTING";
$title = $listing->c_name_generic_c;
$bg = wp_get_attachment_url(200);
}
get_header(); 

/** Update the post views counter */
//_WSH()->post_views( true );?>

<!--======= BANNER =========-->
<div class="sub-banner" <?php if($bg):?>style="background-image: url('<?php echo esc_url($bg); ?>');"<?php endif;?>>
<div class="overlay">
  <div class="container">
	<h1><?php echo $title;?></h1>
	
  </div>
</div>
</div>

<section class="row contentRowPad">
<div class="container">
	<div class="row">
		
		<?php if( $layout == 'left' ): ?>
		
                <div class="col-md-4 col-sm-4 col-xs-12">
                        <div id="sidebar" class="clearfix">        
							<?php dynamic_sidebar( $sidebar ); ?>
                		</div>
                </div>
		
		<?php endif; ?><!-- end sidebar -->	
