<?php

/*
 *
 * Template Name: Full Width
 * A TEMPLATE TO USE ON PAGES THAT SHOULD NOT HAVE WIDGETS.
 *
 */

get_header(); ?>

<div id="full-width" class="grid-0">

<?php get_sidebar('page-top'); ?>

<?php delicate_entry_title(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<div class="entry-content">
		<?php the_content(''); ?>
		<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>') . '&after=</div>') ?>
	</div><!-- END .ENTRY-CONTENT -->

	<?php edit_post_link( __('Edit'), "<span class=\"edit-page-link\">", "</span>") ?>

</div><!-- END #POST -->

<?php endwhile; ?>

<?php get_sidebar('page-bottom'); ?>

<?php comments_template(); ?>

<?php else: ?>

	<p class="no-data">
		<?php _e('Sorry, no page matched your criteria.'); ?>
	</p><!-- END .NO-DATA -->

<?php endif; ?>

</div><!-- END #FULL-WIDTH .GRID -->

<?php get_footer(); ?>