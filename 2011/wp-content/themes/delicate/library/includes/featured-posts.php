<?php if ( is_home() || is_page('465') ) { ?>


<div id="portfolio-wrapper">

<div class="portfolio-entry">



<div class="portfolio-inside">

<?php 
query_posts('cat=7&posts_per_page=-1');
if (have_posts()) : ?> 

<div id="homeimage">

<?php while (have_posts()) : the_post(); ?>

	<?php if ( get_post_meta($post->ID, 'Portfolio', true) ) { ?>
    <div class="slide">
         <img src="<?php echo bloginfo('template_url'); ?>/library/thumb.php?src=<?php $Portfolio = get_post_meta($post->ID, "Portfolio", true); echo $Portfolio; ?>&amp;w=480&amp;h=450&amp;zc=1&amp;q=100" class="portfolio-image" alt="<?php the_title_attribute(); ?>" />  
         <?php the_content(); ?>
	</div>
    
	<?php } else { ?>
	
    	<img src="<?php bloginfo('template_url'); ?>/images/featured-img.png" class="portfolio-image" alt="<?php the_title_attribute(); ?>" />
	
	<?php } ?>

<?php endwhile; ?>

</div>

<?php endif; wp_reset_query(); ?>

<?php 

if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="home-content">

	<?php //delicate_entry_title(); ?>
    <h2 class="entry-title"><?php the_title(); ?></h2>

	<div class="entry-content">
	
    	<?php if (!empty($post->post_excerpt)) : ?>
		<div class="entry-excerpt"><?php the_content(); ?></div>
		<?php else : ?>
		<?php //$excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?>
        <div class="entry-excerpt"><?php the_content(); ?></div>
		<?php endif; ?>
        
        <div class="controls">
            
            <a class="find-out-more" href="<?php bloginfo('url'); ?>/the-event">Find Out More</a>
            
          <?php /*  <a class="view-portfolio" href="<?php bloginfo('url'); ?>/tickets">Buy Tickets NOW! &raquo;</a> */ ?>
            
        </div><!-- END .CONTROLS -->
        
	</div><!-- END .ENTRY-CONTENT -->
    
</div>

<?php endwhile; endif; wp_reset_query(); ?>

<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

</div><!-- END .PORTFOLIO-INSIDE -->





</div><!-- END .PORTFOLIO-ENTRY -->

</div><!-- END #PORTFOLIO-WRAPPER -->

<?php } ?>


<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>