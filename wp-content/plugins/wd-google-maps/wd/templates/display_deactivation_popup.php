	<div class="wd-opacity wd-<?php echo $wd_options->prefix; ?>-opacity"></div>
	<div class="wd-deactivate-popup wd-<?php echo $wd_options->prefix; ?>-deactivate-popup">
		<form method="post" id="<?php echo $wd_options->prefix; ?>_deactivate_form">
			<div class="wd-deactivate-popup-header">
				<?php _e( "If you have a moment, please let us know why you are deactivating", $wd_options->prefix ); ?>:
			</div>
			
			<div class="wd-deactivate-popup-body">
				<?php foreach( $deactivate_reasons as $deactivate_reason_slug => $deactivate_reason ) { ?>
					<div class="wd-<?php echo $wd_options->prefix; ?>-reasons">
						<input type="radio" value="<?php echo $deactivate_reason["id"];?>" id="<?php echo $wd_options->prefix . "-" .$deactivate_reason["id"]; ?>" name="<?php echo $wd_options->prefix; ?>_reasons" >
						<label for="<?php echo $wd_options->prefix . "-" . $deactivate_reason["id"]; ?>"><?php echo $deactivate_reason["text"];?></label>
					</div>
				<?php } ?>
				<div class="additional_details_wrap">
					<label for="additional_details"><?php echo __( "Additional details", $wd_options->prefix );?></label><br>
					<textarea id="additional_details" cols="70" rows="4" name="<?php echo $wd_options->prefix; ?>_additional_details"></textarea>
				</div>
			</div>		
			<div class="wd-btns">
				<a href="#" class="button button-secondary  wd-<?php echo $wd_options->prefix; ?>-cancel"><?php _e( "Cancel" , $wd_options->prefix ); ?></a>
				<a href="#" data-val="1" class="button button-primary button-close wd-<?php echo $wd_options->prefix; ?>-deactivate" id="wd-<?php echo $wd_options->prefix; ?>-deactivate"><?php _e( "Deactivate" , $wd_options->prefix ); ?></a>
				<a href="#" data-val="2" class="button button-primary button-close wd-<?php echo $wd_options->prefix; ?>-deactivate" id="wd-<?php echo $wd_options->prefix; ?>-submit-and-deactivate" style="display:none;"><?php _e( "Submit and deactivate" , $wd_options->prefix ); ?></a>			
			</div>
			<input type="hidden" name="<?php echo $wd_options->prefix . "_submit_and_deactivate"; ?>" value="" >	
		</form>
	</div>