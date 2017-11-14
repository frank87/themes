<?php
/**
 * Piratenpartij Nederland.
 *
 * This file contains changes to the default ppnl_mensen archive in Piratenpartij Nederland Theme.
 *
 * @package Piratenpartij Nederland
 * @author  Forsite 
 * @license GPL-2.0+
 * @link    https://piratenpartij.nl/
 */

//* Remove the post info function
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_filter( 'post_class', 'ppnl_archive_post_class' );
/**
 * Add one-half class to entries, .first to first position
 * @param  [type] $classes [description]
 * @return [type]          [description]
 */
function ppnl_archive_post_class( $classes ) {
	global $wp_query;
	if( ! $wp_query->is_main_query() )
		return $classes;
		
	$classes[] = 'one-half';
	if( 0 == $wp_query->current_post % 2 )
		$classes[] = 'first';
	return $classes;
}


genesis();