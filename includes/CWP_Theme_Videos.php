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
				$video_width = '100%';
			}elseif ( 2 == $total ) {
				$width = 6;
				$video_width = '50%';
			}else{
				$width = 3;
				$video_width = '33%';
			}
			foreach( $urls  as $url ) {
				$out[] = sprintf( '<div class="col-lg-%1s col-md-%2s col-sm-12 col-xs-12 video-gallery-item">', $width, $width );
				//$out[] = wp_oembed_get( $url );
				$out[] = self::html5_video( $url, $video_width );
				$out[] = '</div>';

			}

			$out[] = '</section>';

		}

		$out[] = '</div>';

		return implode( '', $out );

	}

	static public function html5_video( $url = false, $width ) {

		return sprintf( '<script>jQuery(document).ready(function($) {
    $(".cwp-video-player").mediaelementplayer();
});</script><video width="%1s" height="100%" class="cwp-video-player" preload="none" id="youtube1" style="width: %2s;height: 100%;">
 			 <source class="video-player" src="%3s" type="video/youtube">

			Your browser does not support the video tag.
			</video>' ,$width, $width, esc_url( $url ) );
	}


}
