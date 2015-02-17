<?php
/**
 * 404 Content part
 *
 * @package   cwp-theme
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 Josh Pollock
 */
?>
<section class="container single-post" >
	<div class="post-header content <?php post_class(); ?>" id="post-<?php the_ID(); ?>">


		<header class="entry-header">

				<h2 class="post-title">Oops, nothing was found...</h2>

		</header><!-- .entry-header -->

		<div class="post-meta">
				<!--Navigation-->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="nav">
						<?php echo cwp_theme_data()->menu( 'plugins' ); ?>
					</div>
				</div>

		</div>

		</div> <!-- /post-header -->

		<div class="post-content col-lg-12 col-sm-12">

			<img src="http://s.quickmeme.com/img/a8/a8022006b463b5ed9be5a62f1bdbac43b4f3dbd5c6b3bb44707fe5f5e26635b0.jpg" style="width:50%;margin:10% 25%;">

			<?php echo cwp_theme_featured_plugins(); ?>
			
		</div> <!-- /post-content -->

</section>

<div class="clear"></div>
