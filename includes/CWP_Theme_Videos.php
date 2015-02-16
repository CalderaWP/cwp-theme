<?php
/**
 * Show Videos
 *
 * @package   @cwp-themes
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

class CWP_Theme_Videos {

	public static function gallery( $urls, $carousel = false ) {
		$out[] = '<section class="video-gallery container">';
		if ( ! empty( $urls ) && is_array( $urls ) ){
			$total = count( $urls );
			if ( 1 == $total ) {
				$width = 12;
			}elseif ( 2 == $total ) {
				$width = 6;
			}else{
				$width = 3;
			}
			foreach( $urls  as $url ) {
				$out[] = sprintf( '<div class="col-lg-%1s col-md-%2s col-sm-12 col-xs-12 video-gallery-item">', $width, $width );
				//$out[] = wp_oembed_get( $url );
				$out[] = self::html5_video( $url );
				$out[] = '</div>';

			}

			$out[] = '</section>';

		}

		$out[] = '</div>';

		return implode( '', $out );

	}

	static public function html5_video( $url = false ) {

		return sprintf( '<script>jQuery(document).ready(function($) {
    $(".cwp-video-player").mediaelementplayer();
});</script><video width="640" height="360" class="cwp-video-player" preload="none" id="youtube1">
 			 <source class="video-player" src="%1s" type="video/youtube">

			Your browser does not support the video tag.
			</video>', esc_url( $url ) );
	}


}
