<?php get_header(); ?>

<div id="content" class="column grid-1 alpha">

<?php get_sidebar('page-top'); ?>

<?php delicate_entry_title(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>>">

	<div class="entry-content">
		<?php the_content(''); ?>
		<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>') . '&after=</div>') ?>
	</div><!-- END .ENTRY-CONTENT -->

<?php // Buy now button 	
/*    
<div id="blog-category-link">
	<a class="view-portfolio" href="http://shropgeek.eventbrite.com" rel="external" <?php if(is_page('16')) {?> style="float:left;"<? } ?>>But Tickets NOW! &raquo;</a>
</div><!-- END #BLOG-CATEGORY-LINK -->
*/
?>

<br clear="all" />

<?php if(is_page('16')) {?>
<div class="clear">&nbsp;</div>
<? } ?>

</div><!-- END #POST -->

<?php comments_template(); ?>

<?php get_sidebar('page-bottom'); ?>

<?php endwhile; ?>

<?php else : ?>

<div id="post-0" class="<?php delicate_entry_class(); ?>">

	<?php get_search_form(); ?>

	<p class="no-data">
		<?php _e('Sorry, but you are looking for something that is not here.'); ?>
	</p><!-- END .NO-DATA -->

</div><!-- END #POST-0 -->

<?php endif; ?>

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>