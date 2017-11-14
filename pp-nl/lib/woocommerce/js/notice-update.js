/**
 * This script adds notice dismissal to the Piratenpartij Nederland theme.
 *
 * @package Piratenpartij Nederland\JS
 * @author Forsite 
 * @license GPL-2.0+
 */

jQuery(document).on( 'click', '.ppnl-woocommerce-notice .notice-dismiss', function() {

	jQuery.ajax({
		url: ajaxurl,
		data: {
			action: 'ppnl_dismiss_woocommerce_notice'
		}
	});

});