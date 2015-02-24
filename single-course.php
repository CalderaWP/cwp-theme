<?php
/**
 * Single course
 *
 * @package   cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

get_header();

$data = cwp_theme_data();

$file = '/includes/metaplates/courses/top.html';
$template_data = $data->pod->export();
$template_data[ 'form' ] = $data->sign_up_form();
$template_data[ 'post_content' ] = wpautop( $data->post->post_content );

echo caldera_metaplate_from_file( $file, $data->post->ID, $template_data );
echo $data->testimonials_section();

$file = '/includes/metaplates/courses/body.html';
echo caldera_metaplate_from_file( $file, $data->post->ID );

get_footer();
