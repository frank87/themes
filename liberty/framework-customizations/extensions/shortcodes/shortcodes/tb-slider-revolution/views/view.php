<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>



<?php
if (isset($atts['slider']) && $atts['slider']) {
	echo do_shortcode('[rev_slider alias="' . $atts['slider'] . '"]');
}
?>