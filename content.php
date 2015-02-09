<section class="container" id="single-post">
	<div class="post-header content <?php post_class(); ?>" id="post-<?php the_ID(); ?>">


    <h2 class="post-title"><?php the_title(); ?></h2>

    <div class="post-meta">
		<?php if ( is_singular( 'post' ) ) : ?>
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

	<div class="container">
		<div class="post-content col-lg-12 col-sm-12">
			<?php the_content(); ?>

			<?php wp_link_pages(); ?>

		</div> <!-- /post-content -->
	</div>
</section>
            
<div class="clear"></div>
