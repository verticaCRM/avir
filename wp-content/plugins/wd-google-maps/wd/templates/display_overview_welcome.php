<div id="welcome">
    <!-- display plugin video -->
    <?php if( $wd_options->video_youtube_id ){ ?>
        <iframe width="100%" height="400px" src="//www.youtube.com/embed/<?php echo $wd_options->video_youtube_id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
    <?php } ?>
    
    <!-- display plugin features -->
    <div class="plugin_features">
		<!-- if your plugin has a wizard-->
		<div class="wd-tour">
			<a class="wd-tour-btn" href="<?php echo admin_url( 'index.php?page=gmwd_setup' );?>"><?php _e( "Run Install Wizard ",$wd_options->prefix); ?></a>
		</div>
        <?php foreach( $wd_options->plugin_features as $feature ){ ?>
            <h2 class="plugin_feature_title"><?php echo $feature["title"]; ?></h2>
            <div class="plugin_feature_description"><?php echo $feature["description"]; ?></div>
        <?php } ?>
        <div class="more_features_wrap">
            <a href="<?php echo $wd_options->plugin_wd_url; ?>" class="more_features" target="_blank"><?php _e( "More features", $wd_options->prefix ); ?></a>
        </div>
    </div>
    
</div>

