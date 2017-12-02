<?php header("HTTP/1.1 404 Not found", true, 404); get_header(); ?>

<div id="content" class="column grid-1 alpha">

	<h2 class="page-title">
		<?php _e('404: Page Not Found'); ?>
	</h2><!-- END .PAGE-TITLE -->

<div id="post-0" class="<?php delicate_entry_class(); ?>">

	<?php get_search_form(); ?>

	<p class="no-data">
		<?php _e('Sorry, but you are looking for something that is not here.'); ?>
	</p><!-- END .NO-DATA -->

</div><!-- END #POST-0 -->

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>