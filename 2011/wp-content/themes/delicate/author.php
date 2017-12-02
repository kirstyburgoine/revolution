<?php get_header(); the_post(); require ( DELICATE_INCLUDES . "/variables.php" ); ?>

<div id="content" class="column grid-1 alpha">

	<?php get_sidebar('page-top'); ?>

	<h2 class="page-title">
	<?php $author = get_the_author(); ?>
		<?php _e('Author Archives:'); ?> <span><?php echo $author ?></span>
	</h2><!-- END .PAGE-TITLE -->

	<?php if ( get_setting('author_hcard') & !is_paged() ) { ?>
	<div id="author-info" class="vcard clearfix">
		<div id="author-header">
			<h3 class="author-title">
				<?php echo $authordata->first_name; ?>
				<?php echo $authordata->last_name; ?>
			</h3><!-- END .AUTHOR-TITLE -->
		</div><!-- END #AUTHOR-HEADER -->

		<?php delicate_author_avatar(); ?>

		<span class="author-bio">
			<?php if ( !(''== $authordata->user_description) ) : echo apply_filters('archive_meta', $authordata->user_description); endif; ?>
		</span><!-- END .AUTHOR-BIO -->

		<div id="author-footer">
			<span class="author-email">

				<a href="mailto:<?php echo antispambot($authordata->user_email); ?>" title="<?php echo antispambot($authordata->user_email); ?>"><?php _e('Email'); ?></a>

			</span><!-- END .AUTHOR-EMAIL -->   

			<span class="author-website">
				<a href="<?php the_author_meta('user_url'); ?>" title="Visit <?php echo $authordata->first_name; ?>'s Website.">Visit Website</a>
			</span><!-- END .AUTHOR-WEBSITE -->
		</div><!-- END #AUTHOR-FOOTER -->
	</div><!-- END #AUTHOR-INFO .VCARD -->
	<?php } ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<?php delicate_entry_title(); ?>

	<?php if ( get_post_meta($post->ID, 'Thumbnail', true) ) { ?>
	<img src="<?php echo bloginfo('template_url'); ?>/library/thumb.php?src=<?php $Thumbnail = get_post_meta($post->ID, "Thumbnail", true); echo $Thumbnail; ?>&amp;w=200&amp;h=200&amp;zc=1&amp;q=100" alt="<?php the_title_attribute(); ?>" class="thumb" />
	<?php } ?>

	<?php delicate_byline(); ?>

	<div class="entry-content">
		<?php if (!empty($post->post_excerpt)) : ?>
		<div class="entry-excerpt"><?php the_excerpt(); ?></div>
		<?php else : ?>
		<?php the_content(''); ?>
		<?php endif; ?>
		<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>' ) . '&after=</div>') ?>
	</div><!-- END .ENTRY-CONTENT -->

	<!-- THIS CLEARS ALL FLOATS -->
	<div class="clear">&nbsp;</div>

</div><!-- END #POST -->

<?php endwhile; ?>

<?php delicate_pagination(); ?>

<?php else : endif; get_sidebar('page-bottom'); ?>

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>