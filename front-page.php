<?php
/**
 * Front Page Template
 *
 * @package   cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 *
 */
get_header();
$data =  cwp_theme_data();
$atts = $data->header_atts;

?>
	<div id="home" class="top">
		<div class="container">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 logo">
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) );?>" ><?php echo $atts[ 'logo' ]; ?></a>
			</div>
			<!--Navigation-->
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right ">
				<div class="nav">
					<?php echo $data->menu(); ?>
				</div>
			</div>
		</div>
	</div>
	<!--Features Section-->
	<h2 class="post-title">Transform Your WordPress Experience</h2>
	<section class="feature-styles" id="features" >

		<div class="container feature-container" id="front-feature-plugins">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title-wrap">
				<h3>WordPress Shouldn't Be Hard</3>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
				<img src="<?php echo esc_url( wp_get_attachment_url( 459 ) ); ?>" alt="Caldera Easy Pods Query Builder" class="front-page-img" />
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

				<div class="txt">

					<p>WordPress makes very complex tasks possible. We chose WordPress because it was supposed to make our lives easier. At CalderaWP we create elegant solutions to complex problems to help you make beautiful sites faster and better.</p>

				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="txt">
					<p>We create plugins that are easy to use and provide an intuitive user experience in the back-end and front-end.</p>
				</div>
			</div>

			<?php echo cwp_theme_featured_plugins(); ?>

		</div><!--#front-feature-plugins-->

		<div class="container feature-container" id="front-feature-caldera-answers">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title-wrap ">
				<h3>Learn WordPress The Right Way</3>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-md-push-8 col-lg-push-8">
				<img src="<?php echo esc_url( wp_get_attachment_url( 775 ) ); ?>" alt="Caldera Answers Logo" class="front-page-img" />
			</div>

			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-md-pull-4 col-lg-pull-4">
				<div class="txt">
					<p><?php echo CWP_Theme_Caldera_Answers::parent_page_link(); ?> is a set of resources, and training tools for learning WordPress development the right way, by CalderaWP's Josh Pollock. Josh is contributor to the top WordPress news and tutorial sites, including <a href="http://jpwp.me/tutsplus">Tuts+</a>, <a href="http://torquemag.io/author/joshp/">Torque</a>, <a href="http://jpwp.me/wpmu">WPMUDEV</a>, <a href="http://jpwp.me/wpbeginner">WPBegginer</a>.</p>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="txt">
					<p>
						<?php
							printf( '%1s teach WordPress development using a project-oriented approach designed to give beginner and intermediate WordPress developers practical training using establish standards, the best tools and best practices.',
								CWP_Theme_Caldera_Answers::course_page_link( 'Caldera Answers Courses' )

							);

						?>
					</p>
				</div>
			</div>
		</div>
	</section>
<?php

$data =  cwp_theme_data();
echo $data->contact_section();

get_footer();
