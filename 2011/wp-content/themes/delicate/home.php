<?php

/*
 *
 * HOME TEMPLATE
 * THIS TEMPLATE IS LOADED WHEN ON THE HOME PAGE
 *	Template Name: Home
 */

get_header(); require ( DELICATE_INCLUDES . "/variables.php" ); ?>
<?php /*
<script src="DWConfiguration/ActiveContent/IncludeFiles/AC_RunActiveContent.js" type="text/javascript"></script>
*/ ?>


<div id="content" class="grid-1 sigma">

<?php get_sidebar('index-top'); ?>

<?php 
query_posts('cat=6');

if (have_posts()) : ?>

<h2 class="page-title entry-title">2011 Line Up</h2>

<?php while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<?php delicate_entry_title(); ?>

	<?php if ( get_post_meta($post->ID, 'Thumbnail', true) ) { ?>
	<img src="<?php echo bloginfo('template_url'); ?>/library/thumb.php?src=<?php $Thumbnail = get_post_meta($post->ID, "Thumbnail", true); echo $Thumbnail; ?>&amp;w=200&amp;h=200&amp;zc=1&amp;q=100" alt="<?php the_title_attribute(); ?>" class="thumb" />
	<?php } ?>

	<?php //delicate_byline(); ?>

	<?php if ( get_post_meta($post->ID, 'YouTube', true) ) { $values = get_post_custom_values("YouTube"); $YouTube = $values[0]; ?>
	<!-- THIS CLEARS ALL FLOATS -->
	<div class="clear">&nbsp;</div>
	<div class="youtube-embed">
		<script type="text/javascript">
AC_FL_RunContent( 'type','application/x-shockwave-flash','style','height: 302px; width: 625px;','data','http://www.youtube.com/v/<?php echo $YouTube; ?>','movie','http://www.youtube.com/v/<?php echo $YouTube; ?>' ); //end AC code
</script><noscript><object type="application/x-shockwave-flash" style="height: 302px; width: 625px;" data="http://www.youtube.com/v/<?php echo $YouTube; ?>">
		<param name="movie" value="http://www.youtube.com/v/<?php echo $YouTube; ?>" />
		</object></noscript>
	</div><!-- END .YOUTUBE-EMBED -->
	<?php } ?>

	<?php if ( get_post_meta($post->ID, 'Vimeo', true) ) { $values = get_post_custom_values("Vimeo"); $Vimeo = $values[0]; ?>
	<!-- THIS CLEARS ALL FLOATS -->
	<div class="clear">&nbsp;</div>
	<div class="vimeo-embed">
		<script type="text/javascript">
AC_FL_RunContent( 'height','302','width','625px','data','http://www.vimeo.com/moogaloop.swf?clip_id=<?php echo $Vimeo; ?>&server=www.vimeo.com&show_title=1&show_byline=1&show_portrait=0&color=00ADEF&fullscreen=1','type','application/x-shockwave-flash','allowfullscreen','true','allowscriptaccess','always','movie','http://www.vimeo.com/moogaloop?clip_id=<?php echo $Vimeo; ?>&server=www.vimeo.com&show_title=1&show_byline=1&show_portrait=0&color=00ADEF&fullscreen=1' ); //end AC code
</script><noscript><object height="302" width="625px" data="http://www.vimeo.com/moogaloop.swf?clip_id=<?php echo $Vimeo; ?>&amp;server=www.vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash">
		<param name="allowfullscreen" value="true" />
		<param name="allowscriptaccess" value="always" />
		<param name="movie" value="http://www.vimeo.com/moogaloop.swf?clip_id=<?php echo $Vimeo; ?>&amp;server=www.vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /></object></noscript>
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

<?php endwhile; endif; wp_reset_query(); // END BLOG LOOP ?>

<?php get_sidebar('index-insert'); ?>

<?php //endwhile; ?>

<?php  // Buy now button
/*
?>
<div id="blog-category-link">
	<a class="view-portfolio" href="<?php bloginfo('url'); ?>/tickets">But Tickets NOW! &raquo;</a>
</div><!-- END #BLOG-CATEGORY-LINK -->

<?php */ ?>


<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

<?php get_sidebar('index-bottom'); ?>

</div><!-- END #CONTENT .GRID -->

<?php get_sidebar(); get_footer(); ?>