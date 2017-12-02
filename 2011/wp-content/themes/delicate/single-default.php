<?php get_header(); require ( DELICATE_INCLUDES . "/variables.php" ); ?>

<div id="content" class="column grid-1 alpha">

<?php get_sidebar('single-top'); ?>

<?php delicate_entry_title(); ?>

<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<?php if ( get_post_meta($post->ID, 'YouTube', true) ) { $values = get_post_custom_values("YouTube"); $YouTube = $values[0]; ?>
	<div class="youtube-embed">
		<object type="application/x-shockwave-flash" style="height: 302px; width: 615px;" data="http://www.youtube.com/v/<?php echo $YouTube; ?>">
		<param name="movie" value="http://www.youtube.com/v/<?php echo $YouTube; ?>" />
		</object>
	</div><!-- END .YOUTUBE-EMBED -->
	<?php } ?>

	<?php if ( get_post_meta($post->ID, 'Vimeo', true) ) { $values = get_post_custom_values("Vimeo"); $Vimeo = $values[0]; ?>
	<div class="vimeo-embed">
		<object height="302" width="615px" data="http://www.vimeo.com/moogaloop.swf?clip_id=<?php echo $Vimeo; ?>&amp;server=www.vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash">
		<param name="allowfullscreen" value="true" />
		<param name="allowscriptaccess" value="always" />
		<param name="movie" value="http://www.vimeo.com/moogaloop.swf?clip_id=<?php echo $Vimeo; ?>&amp;server=www.vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /></object>
	</div><!-- END .VIMEO-EMBED -->
	<?php } ?>

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

	<?php //delicate_social_bookmarks(); ?>

	<?php //require ( DELICATE_INCLUDES . '/related-posts.php' ); ?>

	<?php //delicate_popular_posts(); ?>

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