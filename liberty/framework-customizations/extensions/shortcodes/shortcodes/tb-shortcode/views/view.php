<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>



<?php
if (isset($atts['shortcode']) && $atts['shortcode']) {
	echo do_shortcode($atts['shortcode']);
}
?>