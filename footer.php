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
		&copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
	</div>
</section>


</div> <!-- /big-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
