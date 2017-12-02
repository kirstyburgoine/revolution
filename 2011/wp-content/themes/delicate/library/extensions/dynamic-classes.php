<?php

// GENERATES SEMANTIC CLASSES FOR THE BODY
function delicate_body_class( $print = true ) {
	global $wp_query, $current_user;

// CHECK TO SEE IF IT'S A WORDPRESS BLOG
$classes = array('wordpress');

// APPLIES THE TIME AND DATE BASED CLASSES TO THE BODY ELEMENT
delicate_date_classes( time(), $classes );

// GENERATE SEMANTIC CLASSES FOR WHAT TYPE OF CONTENT IS DISPLAYED
is_front_page()  ? $classes[] = 'home'				: null;
is_home()        ? $classes[] = 'blog'				: null;
is_archive()     ? $classes[] = 'archive'			: null;
is_date()        ? $classes[] = 'date'				: null;
is_search()      ? $classes[] = 'search'			: null;
is_paged()       ? $classes[] = 'paged'				: null;
is_attachment()  ? $classes[] = 'attachment'		: null;
is_404()         ? $classes[] = 'four-zero-four'	: null;

// SPECIAL CLASSES FOR THE BODY ELEMENT WHEN A SINGLE ENTRY
if ( is_single() ) { $postID = $wp_query->post->ID; the_post();

// ADDS POST SLUG CLASS
$classes[] = 'slug-' . $wp_query->post->post_name;

// ADDS 'SINGLE' CLASS AND CLASS WITH THE POST ID
$classes[] = 'single postid-' . $postID;

// ADDS CLASSES FOR MONTH, DAY, AND HOUR WHEN THE POST WAS PUBLISHED
if ( isset( $wp_query->post->post_date ) )
	delicate_date_classes( mysql2date( 'U', $wp_query->post->post_date ), $classes, 's-' );

// ADDS CATEGORY CLASSES FOR EACH CATEGORY ON SINGLE ENTRIES
if ( $cats = get_the_category() )
	foreach ( $cats as $cat )
	$classes[] = 's-category-' . $cat->slug;

// ADDS TAG CLASSES FOR EACH TAG ON SINGLE ENTRIES
if ( $tags = get_the_tags() )
	foreach ( $tags as $tag )
	$classes[] = 's-tag-' . $tag->slug;

// ADDS MIME-SPECIFIC CLASSES FOR ATTACHMENTS
if ( is_attachment() ) {
	$mime_type = get_post_mime_type();
	$mime_prefix = array('application/', 'image/', 'text/', 'audio/', 'video/', 'music/');
	$classes[] = 'attachmentid-' . $postID . ' attachment-' . str_replace( $mime_prefix, "", "$mime_type" ); }

// ADDS AUTHOR CLASS FOR THE POST AUTHOR
$classes[] = 's-author-' . sanitize_title_with_dashes(strtolower(get_the_author_login())); rewind_posts(); }

// AUTHOR NAME CLASSES FOR BODY ON AUTHOR ARCHIVES
elseif ( is_author() ) {
	$author = $wp_query->get_queried_object();
	$classes[] = 'author';
	$classes[] = 'author-' . $author->user_nicename; }

// CATEGORY NAME CLASSES FOR THE BODY ON CATEGORY ARCHIVES
elseif ( is_category() ) {
	$cat = $wp_query->get_queried_object();
	$classes[] = 'category';
	$classes[] = 'category-' . $cat->slug; }

// TAG NAME CLASSES FOR BODY ON TAG ARCHIVES
elseif ( is_tag() ) {
$tags = $wp_query->get_queried_object();
	$classes[] = 'tag';
	$classes[] = 'tag-' . $tags->slug; }

// PAGE AUTHOR FOR BODY ON PAGES
elseif ( is_page() ) {
$pageID = $wp_query->post->ID;
$page_children = wp_list_pages("child_of=$pageID&echo=0");
the_post();

// ADDS POST SLUG CLASS
$classes[] = 'slug-' . $wp_query->post->post_name;
$classes[] = 'page pageid-' . $pageID;
$classes[] = 'page-author-' . sanitize_title_with_dashes(strtolower(get_the_author('login')));

// CHECKS TO SEE IF THE PAGE HAS CHILDREN AND/OR IS A CHILD PAGE
if ( $page_children )
	$classes[] = 'page-parent';
if ( $wp_query->post->post_parent )
	$classes[] = 'page-child parent-pageid-' . $wp_query->post->post_parent;
if ( is_page_template() ) // Hat tip to Ian, themeshaper.com
	$classes[] = 'page-template page-template-' . str_replace( '.php', '-php', get_post_meta( $pageID, '_wp_page_template', true ) ); rewind_posts();
}

// SEARCH CLASSES FOR RESULTS OR NO RESULTS
elseif ( is_search() ) {
	the_post();
if ( have_posts() ) {
	$classes[] = 'search-results';
} else {
	$classes[] = 'search-no-results';
} rewind_posts(); }

// FOR WHEN A VISITOR IS LOGGED IN WHILE BROWSING
if ( $current_user->ID )
	$classes[] = 'logged-in';

// PAGED CLASSES FOR 'PAGE X' CLASSES OF INDEX, SINGLE, ETC
if ( ( ( $page = $wp_query->get('paged') ) || ( $page = $wp_query->get('page') ) ) && $page > 1 ) {
	$classes[] = 'paged-' . $page;
if ( is_single() ) {
	$classes[] = 'single-paged-' . $page;
} elseif ( is_page() ) {
	$classes[] = 'page-paged-' . $page;
} elseif ( is_category() ) {
	$classes[] = 'category-paged-' . $page;
} elseif ( is_tag() ) {
	$classes[] = 'tag-paged-' . $page;
} elseif ( is_date() ) {
	$classes[] = 'date-paged-' . $page;
} elseif ( is_author() ) {
	$classes[] = 'author-paged-' . $page;
} elseif ( is_search() ) {
	$classes[] = 'search-paged-' . $page;
	}
}

// BROWSER DECTECTION
$browser = $_SERVER[ 'HTTP_USER_AGENT' ];

// MAC, PC, OR LINUX
if ( preg_match( "/Mac/", $browser ) ){
	$classes[] = 'mac';

} elseif ( preg_match( "/Windows/", $browser ) ){
	$classes[] = 'windows';

} elseif ( preg_match( "/Linux/", $browser ) ) {
	$classes[] = 'linux';

} else {
	$classes[] = 'unknown-os';
}

// CHECKS BROWSERS IN THIS ORDER: CHROME, SAFARI, OPERA, MSIE, FF
if ( preg_match( "/Chrome/", $browser ) ) {
	$classes[] = 'chrome';

preg_match( "/Chrome\/(\d.\d)/si", $browser, $matches);
	$ch_version = 'ch' . str_replace( '.', '-', $matches[1] );      
	$classes[] = $ch_version;

} elseif ( preg_match( "/Safari/", $browser ) ) {
	$classes[] = 'safari';

preg_match( "/Version\/(\d.\d)/si", $browser, $matches);
$sf_version = 'sf' . str_replace( '.', '-', $matches[1] );      
	$classes[] = $sf_version;

} elseif ( preg_match( "/Opera/", $browser ) ) {
	$classes[] = 'opera';

preg_match( "/Opera\/(\d.\d)/si", $browser, $matches);
$op_version = 'op' . str_replace( '.', '-', $matches[1] );      
	$classes[] = $op_version;

} elseif ( preg_match( "/MSIE/", $browser ) ) {
	$classes[] = 'msie';

if( preg_match( "/MSIE 6.0/", $browser ) ) {
	$classes[] = 'ie6';
} elseif ( preg_match( "/MSIE 7.0/", $browser ) ){
	$classes[] = 'ie7';
} elseif ( preg_match( "/MSIE 8.0/", $browser ) ){
	$classes[] = 'ie8';
}

} elseif ( preg_match( "/Firefox/", $browser ) && preg_match( "/Gecko/", $browser ) ) {
	$classes[] = 'firefox';

preg_match( "/Firefox\/(\d)/si", $browser, $matches);
	$ff_version = 'ff' . str_replace('.', '-', $matches[1]);      
	$classes[] = $ff_version;

} else {
	$classes[] = 'unknown-browser';
}

$classes = join( ' ', apply_filters('body_class',  $classes) );
return $print ? print($classes) : $classes; }

// GENERATES SEMANTIC CLASSES FOR EACH POST DIV ELEMENT
function delicate_entry_class( $print = true ) {
	global $post, $delicate_post_alt;

// HENTRY GETS 'ALT' FOR EVERY OTHER POST DIV
$classes = array('hentry', "p$delicate_post_alt", $post->post_type, $post->post_status);

// AUTHOR FOR THE POST QUERIED
$classes[] = 'author-' . sanitize_title_with_dashes(strtolower(get_the_author('login')));

// CATEGORY FOR THE POST QUERIED
foreach ( (array) get_the_category() as $cat )
	$classes[] = 'category-' . $cat->slug;

// TAGS FOR THE POST QUERIED
if ( get_the_tags() == null ) {
	$classes[] = 'untagged';
} else {
foreach ( (array) get_the_tags() as $tag )
	$classes[] = 'tag-' . $tag->slug;
}

// FOR PASSWORD-PROTECTED ENTRIES
if ( $post->post_password )
	$classes[] = 'protected';

// FOR ENTRIES THAT ARE 'STICKY'
if( is_sticky() && is_home() )
	$classes[] = 'sticky';

// APPLIES THE TIME AND DATE BASED CLASSES TO THE POST DIV
delicate_date_classes( mysql2date('U', $post->post_date), $classes);

// ADDS 'ALT' CLASS TO EVERY OTHER DIV
if ( ++$delicate_post_alt % 2 )
	$classes[] = 'alt';

// ADDS POST SLUG CLASS
	$classes[] = 'slug-' . $post->post_name;

// DIVIDES CLASSES WITH A SINGLE SPACE
	$classes = join(' ', apply_filters('post_class', $classes) );
	return $print ? print($classes) : $classes;
}

// DEFINE THE NUM VAL FOR THE 'ALT' CLASSES
$delicate_post_alt = 1;

// GENERATES SEMANTIC CLASSES FOR EACH COMMENT ELEMENT
function delicate_comment_class() {
	global $comment, $wpdb, $wp_roles;
	static $comment_alt;
	$classes = array();

// DEFAULT WORDPRESS COMMENT CLASSES
$classes = str_replace( array('byuser', 'bypostauthor'), '', get_comment_class() );

// USER CLASSES TO MATCH USER ROLE
if ( $comment->user_id > 0 && $user = get_userdata( $comment->user_id ) ) :

// SET A CLASS WITH THE COMMENTER'S ROLE
$capabilities = $user->{$wpdb->prefix . 'capabilities'};

if ( !isset( $wp_roles ) ) :
	$wp_roles = new WP_Roles();
endif;

foreach ( $wp_roles->role_names as $role => $name ) :
	if ( array_key_exists( $role, $capabilities ) ) :
		$classes[] = $role . ' ' . $role . '-' . sanitize_html_class( $user->user_nicename, $user->user_id );
endif; endforeach;

// COMMENT BY THE ENTRY/POST AUTHOR
if ( $post = get_post( $post_id ) ) :
	if ( $comment->user_id === $post->post_author )
		$classes[] = 'entry-author';
endif; else :

// IF NOT A REGISTERED USER
$classes[] = 'reader';

endif;

// JOIN ALL THE CLASSES INTO ONE STRING AND ECHO THEME
$class = join(' ', $classes);

echo apply_filters('delicate_comment_class', $class);
}

// GENERATES TIME AND DATE BASED CLASSES FOR BODY, POST DIVS AND COMMENTS: RELATIVE TO GMT (UTC)
function delicate_date_classes( $t, &$classes, $p = '' ) {
	$t = $t + ( get_option('gmt_offset') * 3600 );
	$classes[] = $p . 'y' . gmdate('Y', $t); // Year
	$classes[] = $p . 'm' . gmdate('m', $t); // Month
	$classes[] = $p . 'd' . gmdate('d', $t); // Day
	$classes[] = $p . 'h' . gmdate('H', $t); // Hour
}

?>