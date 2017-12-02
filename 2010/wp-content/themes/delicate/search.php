<?php get_header(); ?>

<div id="content" class="column grid-1 alpha">

<?php get_sidebar('page-top'); ?>

	<h1 class="page-title">
		<?php _e('Search Results for:') ?> 
		<span id="search-terms"><?php echo wp_specialchars(stripslashes($_GET['s']), true); ?></span>
	</h1><!-- END .PAGE-TITLE -->

<?php if ( have_posts() ) : ?>

<div id="search-query">

	<?php while ( have_posts() ) : the_post(); ?>

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

</div><!-- END #SEARCH-QUERY -->

<?php get_sidebar('page-bottom'); ?>

<?php delicate_pagination(); ?>

<?php else : ?>

<div id="post-0" class="<?php delicate_entry_class(); ?>">

	<h3 class="entry-title">
		Your search did not match any entries.
	</h3><!-- END .ENTRY-TITLE -->

	<?php get_search_form(); ?>

	<div class="entry-content">
	<strong>Suggestions:</strong>
	<ul>
		<li>Make sure all words are spelled correctly.</li>
		<li>Try different keywords.</li>
		<li>Try more general keywords.</li>
	</ul>
	</div><!-- END .ENTRY-CONTENT -->

</div><!-- END #POST-0 -->

<?php endif; ?>

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>