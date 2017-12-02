<?php

// BEGIN DOCUMENT TYPE
function delicate_doctype() {
	$content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">' . "\n";
	echo apply_filters('delicate_doctype', $content);
} // END DOCUMENT TYPE

// BEGIN DOCUMENT TITLE
function delicate_doc_title() {
	$site_name = get_bloginfo('name');
	$separator = '-';

	if ( is_single() ) {
		$content = single_post_title('', FALSE);
	}
	elseif ( is_home() || is_front_page() ) { 
		$content = get_bloginfo('description');
	}
	elseif ( is_page() ) { 
		$content = single_post_title('', FALSE); 
	}
	elseif ( is_search() ) { 
		$content = __('Search Results for:'); 
		$content .= ' ' . wp_specialchars(stripslashes(get_search_query()), true);
	}
	elseif ( is_category() ) {
		$content = __( 'Category Archives:' );
		$content .= ' ' . single_cat_title("", false);
	}
	elseif ( is_tag() ) { 
		$content = __('Tag Archives:');
		$content .= ' ' . delicate_tag_query();
	}
	elseif ( is_404() ) { 
		$content = __('Not Found'); 
	}
	else { 
		$content = get_bloginfo('description');
	}

	if (get_query_var('paged')) {
		$content .= ' ' .$separator. ' ';
		$content .= 'Page';
		$content .= ' ';
		$content .= get_query_var('paged');
	}

	if($content) {
	if ( is_home() || is_front_page() ) {
		$elements = array(
			'site_name' => $site_name,
			'separator' => $separator,
			'content' => $content
		);
	}
	else { $elements = array('content' => $content);
	}  
}
	else { $elements = array('site_name' => $site_name);
}

$elements = apply_filters('delicate_doc_title', $elements);

if(is_array($elements)) { $doctitle = implode(' ', $elements); }
else { $doctitle = $elements; }

$doctitle = "<title>" . $doctitle . "</title>" . "\n\n"; echo $doctitle;
} // END DOCUMENT TITLE

// BEGIN CONTENT TYPE
function delicate_content_type() {
	$content_type = "\n" . '<meta http-equiv="Content-Type" content="' . get_bloginfo('html_type') . ' charset=' . get_bloginfo( 'charset' ) . '" />' . "\n";
	echo apply_filters('delicate_content_type', $content_type);
} // END CONTENT TYPE

// BEGIN META DESCRIPTION
function delicate_meta_description() {

// GET THE META DESCRIPTION ACCORDING TO THE CURRENT PAGE.
if ( is_home() )
	$meta_desc = get_bloginfo('description');

elseif ( is_singular() && !is_attachment() )
	$meta_desc = get_post_meta( $post->ID, 'Description', true );

elseif ( is_author() )
	$meta_desc = get_the_author_meta('description', get_query_var('author') );

elseif ( is_category() )
	$meta_desc = stripslashes( strip_tags( category_description() ) );

elseif ( is_tag() )
	$meta_desc = stripslashes( strip_tags( tag_description() ) );

elseif ( is_tax() )
	$meta_desc = stripslashes( strip_tags( term_description( '', get_query_var('taxonomy') ) ) );

// IF NOTHING FOR THE FRONT PAGE OR SINGLE POST, GRAB THE DEFAULTS
if ( is_single() && !$meta_desc )
	$meta_desc = get_the_excerpt();

elseif ( is_front_page() && !$meta_desc )
	$meta_desc = get_bloginfo('description');

// FORMAT THE META DESCRIPTION
if ( $meta_desc || strlen( $meta_desc ) >= 1 )
	$meta_desc = '<meta name="description" content="' . str_replace( array( "\r", "\n", "\t" ), '', wp_specialchars( strip_tags( $meta_desc ), 1 ) ) . '" />' . "\n";
	echo apply_filters('delicate_meta_description', $meta_desc);
} // END META DESCRIPTION

// BEGIN STYLESHEET
function delicate_stylesheet() {
	$content .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
	$content .= get_bloginfo('stylesheet_url');
	$content .= "\" />";
	$content .= "\n";
	echo apply_filters('delicate_stylesheet', $content);
} // END STYLESHEET
?>


<?php
// BEGIN CANONICAL URL
function delicate_canonical() {
	if ( is_singular() )
		$canonical = '<link rel="canonical" href="' . get_permalink() . '" />' . "\n";
	echo apply_filters('delicate_head_canonical', $canonical);
} // END CANONICAL URL

// BEGIN PINGBACK
function delicate_pingback() {
	$pingback = '<link rel="pingback" href="' . get_bloginfo('pingback_url') . '" />';
	echo apply_filters('delicate_head_pingback', $pingback) . "\n";
} // END PINGBACK

// BEGIN COMMENTS RSS
function delicate_comments_rss() {
	$display = TRUE;
	apply_filters('delicate_comments_rss', $display);
	if ($display) {
		$content .= "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"";
		$content .= get_bloginfo('comments_rss2_url');
		$content .= "\" title=\"";
		$content .= wp_specialchars(get_bloginfo('name'), 1);
		$content .= " " . __('Comments RSS feed');
		$content .= "\" />";
		$content .= "\n";
		echo apply_filters('delicate_comments_rss', $content);
	}
} // END COMMENTS RSS

// BEGIN COMMENT REPLY
function delicate_comment_reply() {
	$display = TRUE;
	apply_filters('delicate_comment_reply', $display);
	if ($display)
		if ( is_singular() ) 
			wp_enqueue_script('comment-reply');
} // END COMMENT REPLY

// BEGIN SITE DESCRIPTION
function delicate_site_description() {
	$tag = ( is_home() || is_front_page() ) ? 'h2' : 'div';
	$desc = get_bloginfo('description');
	if ($desc)
		$desc = "\n" . '<' . $tag . ' id="site-description"><span>' . $desc . '</span></' . $tag . '>' . "\n";
	echo apply_filters('delicate_site_description', $desc);
} // END SITE DESCRIPTION

// BEGIN FAVICON
function delicate_favicon() { ?>
<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/library/media/images/favicon.ico" />
<?php } add_action('delicate_favicon', 'delicate_favicon'); // END FAVICON

// BEGIN RSS FEED LINK
function delicate_rss_feed_link() { ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('delicate_feedburner_url') <> "" ) { echo get_option('delicate_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<?php } add_action('delicate_rss_feed_link', 'delicate_rss_feed_link'); // END RSS FEED LINK



// BEGIN HEADER
function delicate_header() { ?>

<?php /*

<div id="site-email">
	<a href="mailto:info@kirstyburgoine.co.uk">Email</a>
</div><!-- END #SITE-EMAIL -->

<div id="site-feed">
	<a href="http://www.twitter.com/shropgeek">Twitter</a>
</div><!-- END #SITE-FEED -->

*/ ?>

<div class="container"><?php show_social_widgets(); ?></div>

<div id="site-title">
	<h1><a href="<?php echo get_option('home' ) ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('description'); ?> </a><br />
<span style="float: right; margin-right: 135px;">... A Web Event from Shropshire</span></h1>    
</div><!-- END #SITE-TITLE -->

<?php //delicate_site_description(); ?>

<!-- THIS CLEARS ALL FLOATS -->
<div class="clear">&nbsp;</div>

<?php } add_action('delicate_header', 'delicate_header'); // END HEADER

// REMOVE WP & PLUGIN FUNCTIONS
remove_action('wp_print_styles', 'pagenavi_stylesheets');
remove_action('wp_head', 'wp_generator');

// PAGE MENU FUNCTION
function delicate_page_nav() {
	$pages = wp_list_pages('title_li=&echo=0&sort_column=menu_order');
	$pages = preg_replace('%<a ([^>]+)>%U','<a $1><span>', $pages);
	$pages = str_replace('</a>','</span></a>', $pages);
	echo $pages; }

?>