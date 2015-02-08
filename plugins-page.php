<?php
/**
 * Template used for
 *
 * @package   @cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock
 */
get_header( 'plugin' );
$data = cwp_theme_plugin_data();
echo $data->page();
?>

<!--Docs Links -->
<section id="docs">
	<div class="container">
		<h1>Documentation</h1>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php echo cep_render_easy_pod( 'auto_docs_list' ); ?>
		</div>
	</div>
</section>



