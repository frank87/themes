<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$custom_class = (isset($atts['class']) && $atts['class']) ? $atts['class'] : '';

if (function_exists('yoast_breadcrumb')) {
	?>
	
	<div id="breadcrumbs">
		<div class="container">
		<?php
		yoast_breadcrumb('<nav class="breadcrumbs alignleft ' . $custom_class . '" itemprop="breadcrumb">', '</nav>');
		?>
		</div>
	</div>

	<?php

}
?>