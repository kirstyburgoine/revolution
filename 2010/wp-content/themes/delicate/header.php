<?php delicate_doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11">

<?php delicate_doc_title(); ?>
<?php delicate_stylesheet(); ?>
<?php delicate_canonical(); ?>
<?php delicate_rss_feed_link(); ?>
<?php delicate_comments_rss(); ?>
<?php delicate_pingback(); ?>
<?php delicate_favicon(); ?>
<?php delicate_content_type(); ?>
<?php delicate_meta_description(); ?>
<?php delicate_comment_reply(); ?>

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/styles/<?php echo get_setting('color_schemes'); ?>.css" media="screen" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/Geomancy_400.font.js"></script>   
    
    <script type="text/javascript">
			Cufon.replace('h1,h2,h3');
		</script>


    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/galleria.js"></script> 

<?php wp_head(); ?>


</head><!-- END HEAD -->

<body class="<?php delicate_body_class(); ?>" <?php if ( !is_home() ) { echo ' id="alt" '; } ?>>

<div id="header">

<div class="container">
	<?php delicate_header(); ?>
	<div id="page-menu">
		<ul class="sf-menu">
			<li<?php if ( is_home() ) { ?> class="current_page_item"<?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
			<? /*<li<?php if(is_single() && in_category(get_setting('blog_category')) || is_archive() && in_category(get_setting('blog_category')) || is_category() && in_category(get_setting('blog_category'))) { echo ' class="current_page_item"'; } ?>><a href="<?php echo get_category_link(get_setting('blog_category')); ?>">Blog</a></li>
			<li<?php if(is_single() && in_category(get_setting('portfolio_category')) || is_archive() && in_category(get_setting('portfolio_category')) || is_category() && in_category(get_setting('portfolio_category'))) { echo ' class="current_page_item"'; } ?>><a href="<?php echo get_category_link(get_setting('portfolio_category')); ?>">Portfolio</a></li> */ ?>
			<?php delicate_page_nav(); ?>
		</ul><!-- END .SF-MENU -->
	</div><!-- END #PAGE-MENU -->
</div><!-- END .CONTAINER -->

</div><!-- END #HEADER -->

<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

<div id="wrapper" class="container">

<?php require ( DELICATE_INCLUDES . '/featured-posts.php' ); ?>