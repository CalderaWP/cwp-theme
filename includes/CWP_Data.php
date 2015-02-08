<?php
/**
 * Class for single post data.
 *
 * @package   @cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */

class CWP_Data {
	/**
	 * @var object|\Pods
	 */
	protected $pod;

	/**
	 * @var object|\WP_Post
	 */
	protected $post;

	/**
	 * Attributes for use in header.
	 *
	 * @var array
	 */
	public $header_atts;


	/**
	 * CWP Logo HTML
	 *
	 * @var string
	 */
	public $logo;

	/**
	 * Whether we are using Pods data or not.
	 *
	 * @var bool
	 */
	protected $use_pods;

	/**
	 * Constructor for class
	 *
	 * @param WP_Post|object $post
	 * @param bool|int  $logo_id Optional. ID of logo for page. If false, it will set current post featured image, or CWP logo.
	 * @param bool||Pods $use_pods Optional. To use Pods or not. If is true, a Pods object will be created. If is a Pods object, that will be used.
	 */
	public function __construct( $post, $logo_id = false, $use_pods = false ) {
		$this->post = $post;
		$this->use_pods = $use_pods;

		if ( true === $use_pods ) {
			$this->pod = $this->pod();
			$this->use_pods = true;
		}elseif( is_a( $use_pods, 'Pods' ) ) {
			$this->pod = $use_pods;
			$this->use_pods = true;
		}else{
			$this->use_pods = false;
		}

		if ( $logo_id ) {
			$this->logo = wp_get_attachment_image( $logo_id );
		}else{
			$this->logo = $this->get_logo();
		}


		$this->header_atts = $this->header_atts();


	}

	/**
	 * Header attributes
	 *
	 * @return array
	 */
	protected function header_atts() {
		$atts = array();

		if (  $this->use_pods ) {
			$fields = array(
				'tagline' => 'product_tagline',
				'header_bg' => 'header_image',
				'title' => 'post_title',

			);
			foreach ( $fields as $key => $field ) {
				$atts[ $key ] = $this->pod()->display( $field );
			}
		}else{
			$atts = array(
				'tagline' => '',
				'header_bg' => $this->logo,
				'title' => $this->post->ID,
			);

		}

		return $atts;

	}

	/**
	 * Sets HTML for logo as the value for $this->logo if it wasn't set with class params.
	 *
	 * @return string
	 */
	protected function get_logo() {
		$logo = (int) get_post_thumbnail_id( $this->post->ID );
		if ( 0 > $logo ) {
			$logo = cwp_theme_cwp_logo_id();
		}

		return wp_get_attachment_image( $logo );
	}

	/**
	 * Data for testimonials
	 *
	 * @todo figure out how to handle this. Should be tweet IDs.
	 *
	 * @return array
	 */
	protected function testimonals_data() {
		return array();
	}

	/**
	 * Create HTML markup for testimonials section.
	 *
	 * @todo finish
	 *
	 * @return string
	 */
	public function testimonials_section() {
		if ( empty( $this->testimonals_data() ) ) {
			return;
		}

		$out[] = '<!--Testimonials Section--><section class=" testimonial-bg"><div id="testimonial" class="flexslider "><div class="container"><ul class="slides">';
		foreach( $this->testimonals_data() as $testimonial ) {
			$out[] = $this->testimonial( $testimonial );
		}

		return implode( '', $out );

	}

	/**
	 * Create HTML Markup for a single testimonial.
	 *
	 * @param array $data ?
	 *
	 * @todo finish
	 *
	 * @return string
	 */
	protected function testimonial( $data ) {
		return sprintf(
			'<li>

					<div class="testimonial-photo"><img src="images/body/testimonial-img.png" alt=""></div>
					<div class="container">
						<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 testimonial-content">
							%1s
							</p>
						</div>
					</div>
				</li>', wp_oembed_get( esc_url( $data[ 'tweet_url' ] ) )
		);

	}

	/**
	 * Get a pod object for this post.
	 *
	 * @return object|\Pods
	 */
	public function pod( ) {

		$this->pod = pods( $this->post->post_type, $this->post->ID );


		return $this->pod;

	}



}
