<?php
/**
 * Main index
 *
 * @package   cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					get_template_part( 'content' );

					// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'cwp-theme' ),
					'next_text'          => __( 'Next page', 'cwp-theme' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cwp-theme' ) . ' </span>',
				) );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );

			endif;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php
	echo cwp_theme_featuted_plugins_once();
	get_footer();
?>
