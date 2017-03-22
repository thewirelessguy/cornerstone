jQuery(function($) {
	// Add Responsive Embed to YouTube and Vimeo Embeds
	$('iframe[src*="youtube.com"], iframe[src*="vimeo.com"], iframe[src*="facebook.com"]').each(function() {
    	if ( $(this).innerWidth() / $(this).innerHeight() > 1.5 ) {
    		$(this).wrap('<div class="responsive-embed widescreen"/>');
    	} else {
    		$(this).wrap('<div class="responsive-embed"/>');
    	}
    });
});