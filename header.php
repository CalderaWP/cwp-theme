<?php
	$data =  cwp_theme_data();
	$atts = $data->header_atts;

	$header_style = 'height: 0;';
	if( !empty( $atts[ 'header_bg' ] ) ){
		$header_style = 'background-image: url( ' . esc_url( $atts[ 'header_bg' ] ) . ' );background-repeat: no-repeat; background-position: 50% bottom;';
	}

	if ( is_front_page() ) {
		$header_style = '';
	}

 ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >

		<title><?php wp_title('|', true, 'right'); ?></title>
				
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		<link rel="shortcut icon" href="<?php echo esc_url( trailingslashit( get_stylesheet_directory_uri() ) . 'favicon.png' ); ?>/" />
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<div class="big-wrapper">
	<?php if ( ! is_front_page() ) : ?>
			<div class="header-cover section bg-dark-light no-padding" style="<?php echo $header_style; ?>">

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


			</div> <!-- /bg-dark -->

			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="product-description">
					<?php
					if (  ! is_home() || is_archive() ) {
						echo sprintf( '<h2>%2s</h2>', $atts['tagline'] );
					}
					?>
				</div>
			</div>
		<?php endif; ?>

				

