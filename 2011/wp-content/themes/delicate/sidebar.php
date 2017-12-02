<?php require ( DELICATE_INCLUDES . "/variables.php" ); ?>

<div id="sidebar" class="grid-4 delta">



<div id="primary" class="aside">



	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('primary') ) : ?>

		<?php /* <div id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</div><!-- END #SEARCH .WIDGET WIDGET_SEARCH-->

		<div id="authors" class="widget">
			<h3 class="widget-title">Authors</h3>
			<ul class="xoxo author-archives">
				<?php wp_list_authors('exclude_admin=0&show_fullname=1&feed=RSS&optioncount=1&title_li='); ?>
			</ul><!-- END .XOXO AUTHOR-ARCHIVES -->
		</div><!-- END #AUTHORS -->

		<div id="tag-cloud" class="widget widget_tag_cloud">
			<h3 class="widget-title">Tags</h3>
			<?php wp_tag_cloud('number=0&smallest=13&largest=18&unit=px'); ?>
		</div><!-- END #TAG-CLOUD .WIDGET WIDGET_TAG_CLOUD -->
		*/ ?>

	<?php endif; // END PRIMARY SIDEBAR WIDGETS  ?>
</div><!-- END #PRIMARY .ASIDE -->

<div id="secondary" class="aside">
	<?php // BEGIN SECONDARY SIDEBAR WIDGETS ?>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('secondary') ) : ?>
	<?php /*
	<div id="widget-meta" class="widget widget_meta">
		<h3 class="widget-title">Meta</h3>
		<ul class="xoxo">
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			<li><a href="http://validator.w3.org/check/referer" title="Validate this page as XHTML">Validate <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://jigsaw.w3.org/css-validator/check/referer" title="Validate this page as CSS">Validate <abbr title="Cascading Style Sheets">CSS</abbr></a></li>
		</ul>
	</div><!-- END #WIDGET-META .WIDGET WIDGET_META -->

	<div id="widget-pages" class="widget widget_pages">
		<h3 class="widget-title">Pages</h3>
		<ul class="xoxo pages">
			<li><a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('name'); ?>"><?php _e('Home'); ?></a></li>
			<?php wp_list_pages('title_li='); ?>
		</ul><!-- END .XOXO PAGES -->
	</div><!-- END #WIDGET-PAGES .WIDGET_PAGES -->

	<div id="widget-feeds" class="widget">
		<h3 class="widget-title">RSS Syndication</h3><ul class="xoxo">
		<li><a href="<?php bloginfo('rdf_url'); ?>" title="<?php _e('RDF/RSS 1.0 Feed'); ?>"><?php _e('<abbr title="Resource Description Framework">RDF</abbr> <abbr title="Really Simple Syndication">RSS</abbr> 1.0 Feed'); ?></a></li>
		<li><a href="<?php bloginfo('rss_url'); ?>" title="<?php _e('RSS 0.92 Feed'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr> 0.92 Feed'); ?></a></li>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('RSS 2.0 Feed'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr> 2.0 Feed'); ?></a></li>
		<li><a href="<?php bloginfo('atom_url'); ?>" title="<?php _e('Atom Feed'); ?>"><?php _e('Atom Feed'); ?></a></li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Comments RSS 2.0 Feed' ); ?>"><?php _e( 'Comments <abbr title="Really Simple Syndication">RSS</abbr> 2.0 Feed'); ?></a></li>
	</ul></div><!-- END #WIDGET-FEEDS -->
    
    */ ?>

	<?php endif; // END SECONDARY SIDEBAR WIDGETS  ?>
</div><!-- END #SECONDARY .ASIDE -->

</div><!-- END #SIDEBAR -->