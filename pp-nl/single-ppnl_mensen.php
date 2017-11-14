<?php
/**
 * Piratenpartij Nederland.
 *
 * This file adds changes to ppnl_mensen single layout of the Piratenpartij Nederland Theme.
 *
 * @package Piratenpartij Nederland
 * @author  Forsite 
 * @license GPL-2.0+
 * @link    https://piratenpartij.nl/
 */

//* Remove the post info function
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_entry_content', 'ppnl_social_profiles', 99 );
/**
 * Output Social Profiles when available
 * @return [type] [description]
 */
function ppnl_social_profiles() {
	$title = get_the_title();
	echo '<div class="social-profiles">'; 

		echo '<h3>Contact met ' . $title . '</h3>'; 
		if ( $ppnl_twitter_profile = get_post_meta( get_the_ID(), '_ppnl_twitter_profile', true ) ) {
			// if we're good to go print!
			echo '<a target="_blank" class="social-profile twitter icon-twitter" href="' . $ppnl_twitter_profile . '" rel="nofollow">twitter</a>';
		}
		if ( $ppnl_facebook_profile = get_post_meta( get_the_ID(), '_ppnl_facebook_profile', true ) ) {
			// if we're good to go print!
			echo '<a target="_blank" class="social-profile facebook icon-facebook" href="' . $ppnl_facebook_profile . '"  rel="nofollow">facebook</a>';
		}
		if ( $ppnl_linkedin_profile = get_post_meta( get_the_ID(), '_ppnl_linkedin_profile', true ) ) {
			// if we're good to go print!
			echo '<a target="_blank" class="social-profile linkedin icon-linkedin" href="' . $ppnl_linkedin_profile . '"  rel="nofollow">linkedin</a>';
		}
	echo '</div>';
}

genesis();
