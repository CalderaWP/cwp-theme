<?php
/**
 * Single post (not download or free_plugin) view
 *
 * @package   cwp-them
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */
get_header();
$data = cwp_theme_data();

if ( ! is_front_page() ) {
	setup_postdata( $data->post );
	get_template_part( 'content' );
}else{
	echo CWP_Theme_Front_Page::front_page_features();
}

if ( is_front_page() || is_page( 'about-calderawp' ) ) {
	echo $data->contact_section();
}

get_footer();
