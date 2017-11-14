<?php

/************************************************************************************/
/* REVOLUTION SLIDER
/************************************************************************************/




if (!function_exists('tb_get_rev_sliders')) :
function tb_get_rev_sliders() {

	$revSliders = array();

	$revSliders['0'] = __('No Slider', 'liberty');

	$slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();  

	foreach ($arrSliders as $slider) {
		$revSliders[$slider->getAlias()] = $slider->getTitle();
	}

	asort($revSliders);
	
	return $revSliders;
}
endif;

?>