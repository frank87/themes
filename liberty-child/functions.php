<?php
// Load custom JS
wp_enqueue_script( 'liberty-child', get_template_directory_uri() . '-child/js/functions.js', array( 'jquery' ), '20141212', true );

//function ppnl_deregister_google_maps() {
  // Dequeue Google Maps scripts
//  wp_dequeue_script('tribe_events_google_maps_api');
  wp_deregister_script('tribe_events_google_maps_api');
  wp_deregister_script('tribe_events_embedded_map');
  wp_deregister_script('feather-sharethis');

  wp_enqueue_script( 'tribe_events_google_maps_api', get_template_directory_uri() . '-child/js/dummy.js', array(), '20141212', true );
  wp_enqueue_script( 'tribe_events_embedded_map', get_template_directory_uri() . '-child/js/dummy.js', array(), '20141212', true );
  wp_enqueue_script( 'feather-sharethis', get_template_directory_uri() . '-child/js/dummy.js', array('notexisting'), '20161111', false );


//}
//add_action('wp_enqueue_scripts', 'ppnl_deregister_google_maps', 101);


// Dequeue Google Maps scripts
//wp_deregister_script('tribe_events_google_maps_api');
//wp_deregister_script('tribe_events_embedded_map');

// Set cookie for campagne redirect
setcookie("ppnlcampagne", "1", time()+3600, "/", "piratenpartij.nl");

wp_embed_register_handler(
  'yt_nocookie',
  '#https?://www\.youtube-nocookie\.com/embed/([^/]+)/?#i',
  'wp_embed_handler_yt_nocookie'
);

function wp_embed_handler_yt_nocookie( $matches, $attr, $url, $rawattr )
{

//  print_r($matches);
//  print_r($attr);

    $embed = sprintf('<iframe src="https://www.youtube-nocookie.com/embed/%1$s" width="100%%" height="480" allowfullscreen="allowfullscreen"></iframe>',
       esc_attr( $matches[1] ));

  return apply_filters( 'embed_yt_nocookie', $embed, $matches, $attr, $url, $rawattr );
}

add_filter('upload_mimes', 'pixert_upload_types');
function pixert_upload_types($existing_mimes=array()){
$existing_mimes['kml'] = 'application/kml';
return $existing_mimes;
}

?>
