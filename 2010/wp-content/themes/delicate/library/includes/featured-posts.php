<?php if ( is_front_page() ) : ?>

<div id="portfolio-wrapper">

<div class="portfolio-entry">

<?php // BEGIN PORTFOLIO LOOP ?>
<?php $portfolioEntries = new WP_Query(); ?>
<?php //$portfolioEntries->query( ('cat='.get_setting('portfolio_category'). '&showposts='.get_setting('slider_count')) ); ?>

<?php $portfolioEntries->query( 'p=4' ); ?>
<?php while ($portfolioEntries->have_posts()) : $portfolioEntries->the_post(); if(is_sticky()) continue; ?>

<div class="portfolio-inside">

	<?php if ( get_post_meta($post->ID, 'Portfolio', true) ) { ?>
 <img src="<?php echo bloginfo('template_url'); ?>/library/thumb.php?src=<?php $Portfolio = get_post_meta($post->ID, "Portfolio", true); echo $Portfolio; ?>&amp;w=500&amp;h=400&amp;zc=1&amp;q=100" class="portfolio-image" alt="<?php the_title_attribute(); ?>" />  



	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/featured-img.png" class="portfolio-image" alt="<?php the_title_attribute(); ?>" />
	<?php } ?>

	<?php //delicate_entry_title(); ?>
    <h2 class="entry-title"><?php the_title(); ?></h2>

	<div class="entry-content">
		<?php if (!empty($post->post_excerpt)) : ?>
		<div class="entry-excerpt"><?php the_excerpt(); ?></div>
		<?php else : ?>
		<?php //$excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?>
        <div class="entry-excerpt"><?php the_excerpt(); ?>
        
        
        
        
        <h4>The Theory of (R)Evolution is an event, run by <a href="http://www.shropgeek.co.uk">Shropgeek</a>, showcasing some of the most forward thinking ideas on the web today.</h4>
        </div>
		<?php endif; ?>
	</div><!-- END .ENTRY-CONTENT -->

	<div class="controls">
		<?php //<a class="previous-button" href="#">Previous</a> ?>
        <a class="find-out-more" href="http://www.shropgeek-revolution.co.uk/the-event">Find Out More</a>
        <?php /*
		<a class="view-portfolio" href="http://shropgeek.eventbrite.com" rel="external">But Tickets NOW! &raquo;</a>
		*/ ?>
		<? // <a class="next-button" href="#">Next</a> ?>
	</div><!-- END .CONTROLS -->

<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

</div><!-- END .PORTFOLIO-INSIDE -->

<?php endwhile; ?>

</div><!-- END .PORTFOLIO-ENTRY -->

</div><!-- END #PORTFOLIO-WRAPPER -->

<?php endif ?>