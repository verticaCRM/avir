<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Avir
 * @since Avir
 */
get_header();
?>
<!--Start Content Grid-->
<div class="mainblogwrapper">
    <div class="container">
        <div class="row">
            <div class="mainblogcontent">
            <div class="col-md-12  col-sm-12 ">
       <ol class="breadcrumb theme-background1-dk theme-color2-lt">
          <?php avir_breadcrumbs(); ?>
        </ol>
      </div>
                <div class="col-md-9">
                <div class="article-page">
            
             
            <h1> <?php _e( 'Not Found', 'bbcrm' ); ?> </h1>
            <p> <?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'bbcrm' ); ?> </p>
            <?php get_search_form(); ?>
            <?php the_widget('WP_Widget_Recent_Posts', array('number' => 10), array('widget_id' => '404')); ?>
        
         </div>
        
        <div class="clearfix"></div>
                    <!-- *** Post1 Starts Ends *** -->
                    <!-- *** Post loop ends*** -->
                    <div class="clearfix"></div>
                    <!-- ***Comment Template *** -->
<?php comments_template(); ?>
                    <!-- ***Comment Template *** -->
                </div>
                <div class="col-md-3">
                    <!-- *** Sidebar Starts *** -->
<?php get_sidebar(); ?>
                    <!-- *** Sidebar Ends *** -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
