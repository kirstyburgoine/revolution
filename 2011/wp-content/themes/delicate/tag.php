<?php get_header() ?>

<div id="content" class="column grid-1 alpha">

<?php get_sidebar('page-top'); ?>

<h1 class="page-title" id="tag-archive">
	<?php _e('Tag Archives:') ?> 
	<span><?php _e(delicate_tag_query()); ?></span>
</h1><!-- END .PAGE-TITLE -->

<?php while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<?php delicate_entry_title(); ?>

	<?php if ( get_post_meta($post->ID, 'Thumbnail', true) ) { ?>
	<img src="<?php echo bloginfo('template_url'); ?>/library/thumb.php?src=<?php $Thumbnail = get_post_meta($post->ID, "Thumbnail", true); echo $Thumbnail; ?>&amp;w=200&amp;h=200&amp;zc=1&amp;q=100" alt="<?php the_title_attribute(); ?>" class="thumb" />
	<?php } ?>

	<?php delicate_byline(); ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>') . '&after=</div>') ?>
	</div><!-- END .ENTRY-CONTENT -->

	<!-- THIS CLEARS ALL FLOATS -->
	<div class="clear">&nbsp;</div>

</div><!-- END #POST -->

<?php endwhile; ?>

<?php get_sidebar('page-bottom'); ?>

<?php delicate_pagination(); ?>

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>