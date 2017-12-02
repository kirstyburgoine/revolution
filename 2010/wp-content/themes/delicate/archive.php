<?php get_header(); ?>

<div id="content" class="column grid-1 alpha">

	<?php get_sidebar('page-top'); ?>

	<?php if ( is_day() ) : ?>
		<h1 class="page-title" id="daily-archives"><?php printf(__('Daily Archives: <span class="archive-date">%s</span>'), get_the_time(get_option('date_format'))) ?></h1>
	<?php elseif ( is_month() ) : ?>
		<h1 class="page-title" id="monthly-archives"><?php printf(__('Monthly Archives: <span class="archive-date">%s</span>'), get_the_time('F Y')) ?></h1>
	<?php elseif ( is_year() ) : ?>
		<h1 class="page-title" id="yearly-archives"><?php printf(__('Yearly Archives: <span class="archive-date">%s</span>'), get_the_time( 'Y' )) ?></h1>
	<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
		<h1 class="page-title"><?php _e('Blog Archives') ?></h1>
	<?php endif; ?>

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
		<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>') . '&after=</div>') ?>
	</div><!-- END .ENTRY-CONTENT -->

	<!-- THIS CLEARS ALL FLOATS -->
	<div class="clear">&nbsp;</div>

</div><!-- END #POST -->

<?php endwhile; ?>

<?php delicate_pagination(); ?>

<?php else : endif; get_sidebar('page-bottom'); ?>

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>