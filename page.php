<?php
/**
 * Single page template
 *
 * @package   @cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */
get_header();
global $post;
setup_postdata( $post );
get_template_part( 'content' );
get_footer();
