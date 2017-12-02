<?php

/*
 *
 * BLOG TEMPLATE
 * THIS TEMPLATE DISPLAYS YOUR LATEST BLOG ENTRIES, CATEGORY IS CONTROLLED IN THIS THEMES OPTIONS
 *
 */

get_header(); require ( DELICATE_INCLUDES . "/variables.php" ); ?>

<div id="content" class="column grid-1 alpha">

	<?php get_sidebar('page-top'); ?>

	<h1 class="page-title blog-title">
		<?php echo get_setting('blog_page_title'); ?>
	</h1><!-- END .PAGE-TITLE -->	

	<?php // BEGIN BLOG LOOP ?>
	<?php $temp = $wp_query; $wp_query= null; $wp_query = new WP_Query(); $wp_query->query('paged='.$paged); ?>
	<?php $blogEntries = new WP_Query(); ?>
	<?php $blogEntries->query( ('cat='.get_setting('blog_category'). '&showposts='.get_setting('post_count'). '&paged='.$paged) ); ?>
	<?php while ($blogEntries->have_posts()) : $blogEntries->the_post(); ?>

	<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

		<?php delicate_entry_title(); ?>

		<?php if ( get_post_meta($post->ID, 'Thumbnail', true) ) { ?>
		<img src="<?php echo bloginfo('template_url'); ?>/library/thumb.php?src=<?php $Thumbnail = get_post_meta($post->ID, "Thumbnail", true); echo $Thumbnail; ?>&amp;w=200&amp;h=200&amp;zc=1&amp;q=100" alt="<?php the_title_attribute(); ?>" class="thumb" />
		<?php } ?>

		<?php delicate_byline(); ?>

		<?php if ( get_post_meta($post->ID, 'YouTube', true) ) { $values = get_post_custom_values("YouTube"); $YouTube = $values[0]; ?>
		<!-- THIS CLEARS ALL FLOATS -->
		<div class="clear">&nbsp;</div>
		<div class="youtube-embed">
			<object type="application/x-shockwave-flash" style="height: 302px; width: 625px;" data="http://www.youtube.com/v/<?php echo $YouTube; ?>">
			<param name="movie" value="http://www.youtube.com/v/<?php echo $YouTube; ?>" />
			</object>
		</div><!-- END .YOUTUBE-EMBED -->
		<?php } ?>

		<?php if ( get_post_meta($post->ID, 'Vimeo', true) ) { $values = get_post_custom_values("Vimeo"); $Vimeo = $values[0]; ?>
		<!-- THIS CLEARS ALL FLOATS -->
		<div class="clear">&nbsp;</div>
		<div class="vimeo-embed">
			<object height="302" width="625px" data="http://www.vimeo.com/moogaloop.swf?clip_id=<?php echo $Vimeo; ?>&amp;server=www.vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash">
			<param name="allowfullscreen" value="true" />
			<param name="allowscriptaccess" value="always" />
			<param name="movie" value="http://www.vimeo.com/moogaloop.swf?clip_id=<?php echo $Vimeo; ?>&amp;server=www.vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /></object>
		</div><!-- END .VIMEO-EMBED -->
		<?php } ?>

		<div class="entry-content">
			<?php if (!empty($post->post_excerpt)) : ?>
			<div class="entry-excerpt"><?php the_excerpt(); ?></div>
			<?php else : ?>
			<?php the_content(''); ?>
			<?php endif; ?>
			<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>') . '&after=</div>') ?>
		</div><!-- END .ENTRY-CONTENT -->

		<!-- THIS CLEARS ALL FLOATS -->
		<div class="clear">&nbsp;</div>

	</div><!-- END #POST -->

<?php $wp_query = null; $wp_query = $temp; // END BLOG LOOP ?>

<?php endwhile; ?>

<?php delicate_pagination(); ?>

<?php get_sidebar('page-bottom'); ?>

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>