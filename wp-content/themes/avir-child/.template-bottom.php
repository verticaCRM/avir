<?php
global $layout, $sidebar;
echo $sidebar;
echo $layout;		
///echo "!!!!!!";			
		if( $layout == 'right' ): ?>	
                <div class="pull-right col-md-4 col-sm-4 col-xs-12">
                        <div id="sidebar" class="clearfix">        
							<?php dynamic_sidebar( $sidebar ); ?>
                		</div>
                </div>
		
		<?php endif; ?><!-- end sidebar -->

	</div>
</div>
</section>
	<section id="featured">
		<div class="hpsection">	
<?php get_sidebar('featured'); ?>
</div>
	</section>
		<?php if( $layout == 'full' ):

		 ?>
<section>		
                <div class="col-md-4 col-sm-4 col-xs-12">
                        <div id="sidebar" class="clearfix">        
							<?php dynamic_sidebar( $sidebar ); ?>
                		</div>
                </div>
</section>		
		<?php endif; ?><!-- end sidebar -->	
		
<?php get_footer(); ?>
