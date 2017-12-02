<?php

/*
 *
 * Template Name: Sitemap
 * CREATES AN XHTML SITEMAP FOR YOUR SITE, LISTING EVERYTHING.
 * THIS TEMPLATE DISPLAYS YOUR FEEDS, PAGES, ARCHIVES, AND POSTS.
 *
 */

get_header(); ?>

<div id="content" class="column grid-1 alpha">

<?php get_sidebar('page-top'); ?>

<div id="sitemap">

<?php delicate_entry_title(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="<?php delicate_entry_class(); ?>">

	<div class="entry-content">
		<h2 class="entry-title">
			<?php _e('Feeds'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<ul class="xoxo feeds">
			<li><a href="<?php bloginfo('rdf_url'); ?>" title="<?php _e('RDF/RSS 1.0 Feed'); ?>"><?php _e('<acronym title="Resource Description Framework">RDF</acronym> <acronym title="Really Simple Syndication">RSS</acronym> 1.0 Feed'); ?></a></li>
			<li><a href="<?php bloginfo('rss_url'); ?>" title="<?php _e('RSS 0.92 Feed'); ?>"><?php _e('<acronym title="Really Simple Syndication">RSS</acronym> 0.92 Feed'); ?></a></li>
			<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('RSS 2.0 Feed'); ?>"><?php _e('<acronym title="Really Simple Syndication">RSS</acronym> 2.0 Feed'); ?></a></li>
			<li><a href="<?php bloginfo('atom_url'); ?>" title="<?php _e('Atom Feed'); ?>"><?php _e('Atom Feed'); ?></a></li>
			<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Comments RSS 2.0 Feed' ); ?>"><?php _e( 'Comments <acronym title="Really Simple Syndication">RSS</acronym> 2.0 Feed'); ?></a></li>
		</ul><!-- END .XOXO FEEDS -->

		<h2 class="entry-title">
			<?php _e('Pages'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<ul class="xoxo pages">
			<li><a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('name'); ?>"><?php _e('Home'); ?></a></li>
			<?php wp_list_pages('title_li='); ?>
		</ul><!-- END .XOXO PAGES -->

		<h2 class="entry-title">
			<?php _e('Category Archives'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<ul class="xoxo category-archives">
			<?php wp_list_categories('feed=RSS&show_count=1&use_desc_for_title=0&title_li='); ?>
		</ul><!-- END .XOXO CATEGORY-ARCHIVES -->

		<h2 class="entry-title">
			<?php _e('Author Archives'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<ul class="xoxo author-archives">
			<?php wp_list_authors('exclude_admin=0&show_fullname=1&feed=RSS&optioncount=1&title_li='); ?>
		</ul><!-- END .XOXO AUTHOR-ARCHIVES -->

		<h2 class="entry-title">
			<?php _e('Yearly Archives'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<ul class="xoxo yearly-archives">
			<?php wp_get_archives('type=yearly&show_post_count=1'); ?>
		</ul><!-- END .XOXO YEARLY-ARCHIVES -->

		<h2 class="entry-title">
			<?php _e('Monthly Archives'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<ul class="xoxo monthly-archives">
			<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
		</ul><!-- END .XOXO MONTHLY-ARCHIVES -->

		<h2 class="entry-title">
			<?php _e('Weekly Archives'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<ul class="xoxo weekly-archives">
			<?php wp_get_archives('type=weekly&show_post_count=1'); ?>
		</ul><!-- END .XOXO WEEKLY-ARCHIVES -->

		<h2 class="entry-title">
			<?php _e('Daily Archives'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<ul class="xoxo daily-archives">
			<?php wp_get_archives('type=daily&show_post_count=1'); ?>
		</ul><!-- END .XOXO DAILY-ARCHIVES -->

		<h2 class="entry-title">
			<?php _e('Tag Archives'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<p class="tag-cloud">
			<?php wp_tag_cloud('number=0&smallest=14&largest=18&unit=px'); ?>
		</p><!-- END .TAG-CLOUD -->

		<h2 class="entry-title">
			<?php _e('Blog Entries'); ?>
		</h2><!-- END .ENTRY-TITLE -->

		<ul class="xoxo post-archives">
			<?php wp_get_archives('type=postbypost'); ?>
		</ul><!-- END .XOXO POST-ARCHIVES -->
	</div><!-- END .ENTRY-CONTENT -->

</div><!-- END #POST -->

<?php endwhile; else: ?>

	<p class="no-data">
		<?php _e('Sorry, no page matched your criteria.'); ?>
	</p><!-- END .NO-DATA -->

<?php endif; ?>

<?php get_sidebar('page-bottom'); ?>

</div><!-- END #SITEMAP -->

</div><!-- END #CONTENT -->

<?php get_sidebar(); get_footer(); ?>