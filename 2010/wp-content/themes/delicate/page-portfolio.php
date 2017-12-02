<?php

/*
 *
 * PORTFOLIO TEMPLATE
 * THIS TEMPLATE DISPLAYS YOUR LATEST PORTFOLIO ENTRIES, CATEGORY IS CONTROLLED IN THIS THEMES OPTIONS
 *
 */

get_header(); require ( DELICATE_INCLUDES . "/variables.php" ); ?>

<div id="content" class="column grid-1 alpha">

	<?php get_sidebar('page-top'); ?>

	<h1 class="page-title portfolio-title">
		<?php echo get_setting('portfolio_page_title'); ?>
	</h1><!-- END .PAGE-TITLE -->	

	<?php // BEGIN FEATURED LOOP ?>
	<?php $temp = $wp_query; $wp_query= null; $wp_query = new WP_Query(); $wp_query->query('paged='.$paged); ?>
	<?php $portfolioEntries = new WP_Query(); ?>
	<?php $portfolioEntries->query( ('cat='.get_setting('portfolio_category'). '&showposts='.get_setting('slider_count')) ); ?>
	<?php while ($portfolioEntries->have_posts()) : $portfolioEntries->the_post(); if(is_sticky()) continue; ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<?php delicate_entry_title(); ?>

	<?php if ( get_post_meta($post->ID, 'Portfolio', true) ) { ?>
	<a rel="prettyPhoto" href="<?php $Lightbox = get_post_meta($post->ID, "Lightbox", true); echo $Lightbox; ?>"><img src="<?php echo bloginfo('template_url'); ?>/library/thumb.php?src=<?php $Portfolio = get_post_meta($post->ID, "Portfolio", true); echo $Portfolio; ?>&amp;w=615&amp;h=300&amp;zc=1&amp;q=100" class="screen" alt="<?php the_title_attribute(); ?>" /></a>

	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/portfolio-img.png" class="portfolio-image" alt="<?php the_title_attribute(); ?>" />
	<?php } ?>

	<div id="post-details">
		<?php if ( get_post_meta($post->ID, 'Date', true) ) { ?>
			<span class="post-date">
				<strong>DATE:</strong> <?php $Date = get_post_meta($post->ID, "Date", true); echo $Date; ?>
			</span><!-- END .POST-DATE -->
		<?php } ?>
		<?php if ( get_post_meta($post->ID, 'Price', true) ) { ?>
			<span class="price">
				<strong>PRICE:</strong> <?php $Price = get_post_meta($post->ID, "Price", true); echo $Price; ?>
			</span><!-- END .PRICE -->
		<?php } ?>
		<?php if ( get_post_meta($post->ID, 'Purchase', true) ) { ?>
			<span class="purchase-link">
				(<a href="<?php $Purchase = get_post_meta($post->ID, "Purchase", true); echo $Purchase; ?>">PURCHASE</a>)
			</span><!-- END .PURCHASE-LINK -->
		<?php } ?>
		<?php if ( get_post_meta($post->ID, 'Preview', true) ) { ?>
			<span class="preview-link">
				(<a href="<?php $Preview = get_post_meta($post->ID, "Preview", true); echo $Preview; ?>">PREVIEW</a>)
			</span><!-- END .PREVIEW-LINK -->
		<?php } ?>
		<?php if ( get_post_meta($post->ID, 'Project', true) ) { ?>
			<span class="project-type">
				<strong>TYPE:</strong> <?php $Project = get_post_meta($post->ID, "Project", true); echo $Project; ?>
			</span><!-- END .PROJECT-TYPE -->
		<?php } ?>
	</div><!-- END #POST-DETAILS -->

</div><!-- END #POST -->

<?php $wp_query = null; $wp_query = $temp; // END FEATURED LOOP ?>

<?php endwhile; ?>

<?php delicate_pagination(); ?>

<?php get_sidebar('page-bottom'); ?>

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>