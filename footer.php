<?php
/**
 * Footer Template
 *
 * @package   @cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 Josh Pollock
 */

$data = cwp_theme_data();
?>

<section id="footer">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="nav">
				<?php echo $data->menu( 'Footer' ); ?>
			</div>
		</div>
		<div class="copy-notice">
			<img width="80" height="80" alt="CalderaWP_Logo_White_Text" class="attachment-thumbnail" src="<?php echo get_stylesheet_directory_uri() . '/images/cwp-logo-white.png'; ?>">
			<div>&copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - All Rights Reserved</div>
		</div>
	</div>
</section>


</div> <!-- /big-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
