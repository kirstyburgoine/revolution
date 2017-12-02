<?php get_header(); ?>

<div id="content" class="column grid-1 alpha">

	<?php get_sidebar('page-top'); ?>

	<h2 class="page-title">
		<?php the_title(); ?>
	</h2><!-- END .PAGE-TITLE -->

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<div class="entry-content">

		<div class="attachment-image">
			<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" type="<?php echo get_post_mime_type(); ?>"><img class="aligncenter" src="<?php echo wp_get_attachment_url(); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
		</div><!-- END .ATTACHMENT-IMAGE -->

		<div class="caption">
			<?php the_excerpt(); ?>
		</div><!-- END .CAPTION -->

		<div class="description">
			<?php the_content(''); ?>
			<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>') . '&after=</div>') ?>
		</div><!-- END .DESCRIPTION -->

	</div><!-- END .ENTRY-CONTENT -->

</div><!-- END #POST -->

	<?php delicate_entry_meta(); ?>

	<?php get_sidebar('page-bottom'); ?>

	<?php comments_template('', 'true'); ?>

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>