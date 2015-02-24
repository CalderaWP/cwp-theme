<section class="container single-post" >
	<div class="post-header content <?php post_class(); ?>" id="post-<?php the_ID(); ?>">


		<header class="entry-header">
			<?php
			if ( is_single() ) :
				the_title( '<h2 class="post-title">', '</h2>' );
			else :
				the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
			?>
		</header><!-- .entry-header -->

    <div class="post-meta">
		<?php if ( is_single() ) : ?>
		    <span class="post-date"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_time(get_option('date_format')); ?></a></span>

		    <span class="date-sep"> / </span>

		    <span class="post-author"><?php the_author_posts_link(); ?></span>

		    <span class="date-sep"> / </span>

		    <?php comments_popup_link( '<span class="comment">' . __( '0 Comments', 'theme' ) . '</span>', __( '1 Comment', 'theme' ), __( '% Comments', 'theme' ) ); ?>

		    <?php if ( current_user_can( 'manage_options' ) ) { ?>

			    <span class="date-sep"> / </span>

			    <?php edit_post_link(__('Edit', 'cwp-theme')); ?>

		    <?php } ?>

		<?php endif;
			if ( is_page( 'plugins' ) ) : ?>
			    <!--Navigation-->
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				    <div class="nav">
					    <?php echo cwp_theme_data()->menu( 'plugins' ); ?>
				    </div>
			    </div>
	     <?php endif;
		if ( CWP_Theme_EDD::is_checkout() ) : ?>
			<!--Navigation-->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="nav">
					<?php echo cwp_theme_data()->menu( 'cart' ); ?>
				</div>
			</div>
		<?php endif; ?>


	</div>

	</div> <!-- /post-header -->


		<?php
			if ( is_single() || is_page() ) {
				echo '<div class="post-content col-lg-12 col-sm-12">';
					the_content();
					wp_link_pages();
					if ( 'doc' == get_post_type() ) {
						echo CWP_Docs::link_box( get_the_ID() );
					}

				echo '</div> <!-- /post-content -->';
			} else { ?>

		<div class="post-excerpt col-lg-12 col-sm-12">
			<div class="col-lg-3 col-sm-12">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="col-lg-9 col-sm-12">
				<?php the_excerpt(); ?>
				<?php printf( '<p class="read-more"><a href="%s" rel="bookmark">Read More</a></p>', esc_url( get_permalink() ) ); ?>
			</div>
		</div><!--/post-excerpt-->

			
		<?php }
		if ( ! is_front_page() || ! is_page( 'about-calderawp' ) ) {
			if ( 'doc' !== get_post_type() ) {
				echo cwp_theme_featured_plugins();
			}
		} ?>


</section>
<div class="clear"></div>
<?php
if ( ! is_front_page() || ! is_page( 'about-calderawp' ) ) {
	if ( 'doc' !== get_post_type() ) {
		echo cwp_theme_featured_plugins();
	}
}
?>
            
<div class="clear"></div>
