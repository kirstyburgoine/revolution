<?php get_header(); require ( DELICATE_INCLUDES . "/variables.php" ); ?>

<div id="content" class="column grid-1 alpha">

<?php get_sidebar('single-top'); ?>

<?php delicate_entry_title(); ?>

<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<?php if ( get_post_meta($post->ID, 'Portfolio', true) ) { ?>
	<a rel="prettyPhoto" href="<?php $Lightbox = get_post_meta($post->ID, "Lightbox", true); echo $Lightbox; ?>"><img src="<?php echo bloginfo('template_url'); ?>/library/thumb.php?src=<?php $Portfolio = get_post_meta($post->ID, "Portfolio", true); echo $Portfolio; ?>&amp;w=615&amp;h=300&amp;zc=1&amp;q=100" class="screen" alt="<?php the_title_attribute(); ?>" /></a>

	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/portfolio-img.png" class="portfolio-image" alt="<?php the_title_attribute(); ?>" />
	<?php } ?>

	<div id="post-details">
		<?php if ( get_post_meta($post->ID, 'Date', true) ) { ?>
			<span class="post-date">
				<strong>DATE:</strong> <?php $Date = get_post_meta($post->ID, "Date", true); echo $Date; ?>
			</span><!-- END .POST-DATE -->
		<?php } ?>
		<?php if ( get_post_meta($post->ID, 'Price', true) ) { ?>
			<span class="price">
				<strong>PRICE:</strong> <?php $Price = get_post_meta($post->ID, "Price", true); echo $Price; ?>
			</span><!-- END .PRICE -->
		<?php } ?>
		<?php if ( get_post_meta($post->ID, 'Purchase', true) ) { ?>
			<span class="purchase-link">
				(<a href="<?php $Purchase = get_post_meta($post->ID, "Purchase", true); echo $Purchase; ?>">PURCHASE</a>)
			</span><!-- END .PURCHASE-LINK -->
		<?php } ?>
		<?php if ( get_post_meta($post->ID, 'Preview', true) ) { ?>
			<span class="preview-link">
				(<a href="<?php $Preview = get_post_meta($post->ID, "Preview", true); echo $Preview; ?>">PREVIEW</a>)
			</span><!-- END .PREVIEW-LINK -->
		<?php } ?>
		<?php if ( get_post_meta($post->ID, 'Project', true) ) { ?>
			<span class="project-type">
				<strong>TYPE:</strong> <?php $Project = get_post_meta($post->ID, "Project", true); echo $Project; ?>
			</span><!-- END .PROJECT-TYPE -->
		<?php } ?>
	</div><!-- END #POST-DETAILS -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>') . '&after=</div>') ?>
	</div><!-- END .ENTRY-CONTENT -->

	<div class="entry-meta post-meta-data">
		<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // COMMENTS/TRACKBACKS ARE OPEN ?>
		<?php printf( __('<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a href="%s" title="Trackback URL for your post" rel="trackback" class="trackback-link">Trackback URL</a>.'), get_trackback_url() ) ?>

		<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // TRACKBACKS ARE OPEN ?>
		<?php printf( __('Comments are closed, but you can leave a trackback: <a href="%s" title="Trackback URL for your post" rel="trackback" class="trackback-link">Trackback URL</a>.'), get_trackback_url() ) ?>

		<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // COMMENTS ARE OPEN ?>
		<?php _e('Trackbacks are closed, but you can <a href="#respond" title="Post a comment" class="comment-link">post a comment</a>.') ?>

		<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // COMMENTS/TRACKBACKS ARE CLOSED ?>
		<?php _e ('Both comments and trackbacks are currently closed.') ?>
		<?php endif; ?>
	</div><!-- END .ENTRY-META .POST-META-DATA -->

</div><!-- END #POST -->

	<?php delicate_social_bookmarks(); ?>

	<?php require ( DELICATE_INCLUDES . '/related-posts.php' ); ?>

	<?php delicate_popular_posts(); ?>

	<!-- THIS CLEARS ALL FLOATS -->
	<div class="clear">&nbsp;</div>

	<?php get_sidebar('single-bottom'); ?>

	<?php comments_template('', 'true'); ?>

	<?php endwhile; else : ?>
	
	<h2 class="page-title">
		<?php _e('404: Page Not Found'); ?>
	</h2><!-- END .PAGE-TITLE -->

	<div id="post-0" class="<?php delicate_entry_class(); ?>">

		<?php get_search_form(); ?>

		<p class="no-data">
			<?php _e('Sorry, but you are looking for something that is not here.'); ?>
		</p><!-- END .NO-DATA -->

	</div><!-- END #POST-0 -->

	<?php endif; ?>

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>