<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>



<link rel="icon" 
      type="image/png" 
      href="<?php bloginfo('url'); ?>/favicon.png" />

<?php //delicate_stylesheet(); ?>
<?php //delicate_canonical(); ?>
<?php //delicate_rss_feed_link(); ?>
<?php //delicate_comments_rss(); ?>
<?php //delicate_pingback(); ?>
<?php //delicate_favicon(); ?>
<?php //delicate_content_type(); ?>
<?php //delicate_meta_description(); ?>
<?php //delicate_comment_reply(); ?>


<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/media/css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/media/css/grid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/media/css/base.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/media/css/plugins.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/media/css/prettyphoto.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/media/css/screen.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/media/css/widgets.css" media="screen" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/media/css/jquery.tweet.css" media="screen" />


	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/styles/<?php echo get_setting('color_schemes'); ?>.css" media="screen" />
    
    
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> 
    
    <script type="text/javascript" src="http://use.typekit.com/jnt0vsx.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
   
    <?php /*
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/Geomancy_400.font.js"></script>   
    
    <script type="text/javascript">
			Cufon.replace('h1,h2,h3');
		</script>

	*/ ?>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/jquery.tweet.js"></script> 
    
    <script type="text/javascript">
		jQuery(function($){
			$(".tweets").tweet({
				avatar_size: 32,
				count: 200,
				username: "shropgeek",
				favorites: true,
				loading_text: "loading list..."
			}).bind("loaded",function(){$(this).find("a").attr("target","_blank");});
		});
	</script>
    
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/scripts/galleria.js"></script> 

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );


	wp_head();
?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30752703-1']);
  _gaq.push(['_setDomainName', 'shropgeek-revolution.co.uk']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head><!-- END HEAD -->

<body class="<?php delicate_body_class(); ?>" <?php if ( !is_home() ) { echo ' id="alt" '; } ?>>


<div id="header">

<div class="container">
	<?php delicate_header(); ?>
	<div id="page-menu">
		
        
        <?php wp_nav_menu( array( 'container_class' => 'topnav', 'theme_location' => 'primary' ) ); ?>
        
	</div><!-- END #PAGE-MENU -->
</div><!-- END .CONTAINER -->

</div><!-- END #HEADER -->

<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

<div id="wrapper" class="container">

<?php require ( DELICATE_INCLUDES . '/featured-posts.php' ); ?>