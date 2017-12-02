<?php 
/*
*
* Template Name: Twitter
*
*/

get_header(); ?>

<div id="content" class="column grid-1 alpha">

<?php get_sidebar('page-top'); ?>

<?php delicate_entry_title(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>>">

	<div class="entry-content">
		<?php the_content(''); ?>
        
        <br />
        
        <div class="tweets"></div>
        
        <br />
        
        <a href="http://twitter.com/shropgeek" class="twitter-follow-button" data-button="grey" data-text-color="#FFFFFF" data-link-color="#00AEFF" data-show-count="false">Follow @shropgeek</a>
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
        
        
        
        

		
        
        
		<?php wp_link_pages('before=<div class="page-link">' .__('<span class="page-link-title">Pages:</span>') . '&after=</div>') ?>
	</div><!-- END .ENTRY-CONTENT -->
    
    

<?php  // Buy now button 
/*	
?>   
 <?php if(!is_page('122')) {?>
<div id="blog-category-link">
	<a class="view-portfolio" href="<?php bloginfo('url'); ?>/tickets" <?php if(is_page('16')) {?> style="float:left;"<? } ?>>Buy Tickets NOW! &raquo;</a>
</div><!-- END #BLOG-CATEGORY-LINK -->

<?php } */ ?>

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