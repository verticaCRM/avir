////////////////////////////////////////////////////////////////////////////////////////
// Events                                                                             //
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// Constants                                                                          //
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// Variables                                                                          //
////////////////////////////////////////////////////////////////////////////////////////
var deactivated = false;
////////////////////////////////////////////////////////////////////////////////////////
// Constructor & Destructor                                                           //
////////////////////////////////////////////////////////////////////////////////////////	
jQuery(document).ready(function () {
	jQuery(document).on("click", "." + WDDeactivateVars.deactivate_class, function(){
		jQuery(".wd-" + WDDeactivateVars.prefix + "-opacity").show();
		jQuery(".wd-" + WDDeactivateVars.prefix  + "-deactivate-popup").show();
		return false;
	});
	
	jQuery(document).on("change", "[name=" + WDDeactivateVars.prefix + "_reasons]", function(){	
		jQuery("#wd-" + WDDeactivateVars.prefix + "-deactivate").hide();
		jQuery("#wd-" + WDDeactivateVars.prefix + "-submit-and-deactivate").show();

	});
	jQuery(document).on("keyup", "[name=" + WDDeactivateVars.prefix + "_additional_details]", function(){		
		if(jQuery(this).val().trim() || jQuery("[name=" + WDDeactivateVars.prefix + "_reasons]:checked").length > 0){
			jQuery("#wd-" + WDDeactivateVars.prefix + "-deactivate").hide();
			jQuery("#wd-" + WDDeactivateVars.prefix + "-submit-and-deactivate").show();			
		}
		else{
			jQuery("#wd-" + WDDeactivateVars.prefix + "-deactivate").show();
			jQuery("#wd-" + WDDeactivateVars.prefix + "-submit-and-deactivate").hide();			
		}

	});
	jQuery(document).on("click", ".wd-" + WDDeactivateVars.prefix + "-deactivate", function(){
		jQuery("[name=" + WDDeactivateVars.prefix + "_submit_and_deactivate]").val(jQuery(this).attr("data-val"));
		jQuery("#" + WDDeactivateVars.prefix + "_deactivate_form").submit();
 		return false;
	});	

	jQuery(document).on("click", ".wd-" + WDDeactivateVars.prefix + "-cancel, .wd-opacity", function(){
		jQuery(".wd-" + WDDeactivateVars.prefix + "-opacity").hide();
		jQuery(".wd-" + WDDeactivateVars.prefix  + "-deactivate-popup").hide();
		return false;		
	});
});

////////////////////////////////////////////////////////////////////////////////////////
// Public Methods                                                                     //
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// Getters & Setters                                                                  //
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// Private Methods                                                                    //
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// Listeners                                                                          //
////////////////////////////////////////////////////////////////////////////////////////