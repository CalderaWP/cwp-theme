<?php
/**
 * Template used for download and free_plugin CPT single view.
 *
 * @package   @cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */
get_header();
$data = cwp_theme_data();

echo $data->page();
get_footer();
