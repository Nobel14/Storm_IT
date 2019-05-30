jQuery(function ($) {
    $(document).ajaxComplete(function (event, xhr, settings) {
        if (typeof settings.data === 'string' && /action=get-post-thumbnail-html/.test(settings.data) && xhr.responseJSON && typeof xhr.responseJSON.data === 'string') {
			$('#_FSMCFIC_featured_image_caption').val(window.FSMCFIC_caption);
			$('#_FSMCFIC_featured_image_nocaption').prop("checked", window.FSMCFIC_nocaption);
			$('#_FSMCFIC_featured_image_hide').prop("checked", window.FSMCFIC_hide);
		}

    });
	
	function save_current_cfic_info ()
	{		
		window.FSMCFIC_caption = $('#_FSMCFIC_featured_image_caption').val();
		window.FSMCFIC_nocaption = $('#_FSMCFIC_featured_image_nocaption').prop("checked");
		window.FSMCFIC_hide = $('#_FSMCFIC_featured_image_hide').prop("checked");		
	}
	
	save_current_cfic_info ();

	$('body').on('change','#FSMCFIC_box :input', save_current_cfic_info);
	
});






