<?php

// DEFINE PATH CONSTANTS
define ( DELICATE_ADMIN, TEMPLATEPATH . '/library/admin');
define ( DELICATE_EXTENSIONS, TEMPLATEPATH . '/library/extensions');
define ( DELICATE_INCLUDES, TEMPLATEPATH . '/library/includes');
define ( DELICATE_WIDGETS, TEMPLATEPATH . '/library/widgets');

// LOAD ADMIN FILES
require_once ( DELICATE_ADMIN . '/theme-settings.php');
require_once ( DELICATE_ADMIN . '/admin-functions.php');
if ( is_admin() ) :
	require_once ( DELICATE_ADMIN . '/admin-interface.php');
	require_once ( DELICATE_ADMIN . '/meta-box.php');
endif;

// LOAD EXTENSION FILES
require_once ( DELICATE_EXTENSIONS . '/comment-extensions.php');
require_once ( DELICATE_EXTENSIONS . '/content-extensions.php');
require_once ( DELICATE_EXTENSIONS . '/dynamic-classes.php');
require_once ( DELICATE_EXTENSIONS . '/footer-extensions.php');
require_once ( DELICATE_EXTENSIONS . '/header-extensions.php');
require_once ( DELICATE_EXTENSIONS . '/shortcode-extensions.php');
require_once ( DELICATE_EXTENSIONS . '/single-extensions.php');
require_once ( DELICATE_EXTENSIONS . '/widget-extensions.php');



// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );


// -----------------------------------------------------------------------------------------------------------------------------
// Pull through all thumbnails,  

function get_gallery_thumbnails() { 
 
    // Get the post ID 
	$iPostID = get_the_ID(); 
 
    // Get images for this post 
    $Images = get_children('post_type=attachment&post_mime_type=image&orderby=menu_order&order=ASC&post_parent=' . $iPostID ); 
	
	
 
    // If images exist for this page 
    if($Images) { 
 
        $Keys = array_keys($Images); 
		
		
		$url = get_bloginfo('url');
		$filepath = get_bloginfo('template_directory');
		
		//echo "number = " .$number. "<br />";
		//echo $style;
		
		$reverse = array_reverse($Keys);
		
		foreach ($Images as $post) {

			$iN = $post->ID; 
				
				
			$sTUrl = wp_get_attachment_url($iN); 
			
			$fileName = end(explode(''.$url.'/', $sTUrl));
			$title = the_title_attribute('echo=0');
			$content = $post->post_content;
			
			if ($content == '') {
			$content = $title;
			}
			
			
			$sImg = '<div><a href="' . $sTUrl.'" title="' . $content . '">' .
								'<img src="' . $filepath . '/timthumb.php?src=/'.$fileName.'&amp;w=80&amp;h=80&amp;q=100" alt="' . $title . '" />' . 
							'</a>
							<strong>Photograph taken by <a href="http://www.stonehousephotographic.com/" target="_blank">Stonehouse Photographic</a></strong>
							<span>' . $content . '</span></div>'; 
							
			echo $sImg;
		
		}
						
         
    } 
}


function get_2011_thumbnails() { 
 
    // Get the post ID 
	$iPostID = get_the_ID(); 
 
    // Get images for this post 
    $Images = get_children('post_type=attachment&post_mime_type=image&orderby=menu_order&order=ASC&post_parent=' . $iPostID ); 
	
	
 
    // If images exist for this page 
    if($Images) { 
 
        $Keys = array_keys($Images); 
		
		
		$url = get_bloginfo('url');
		$filepath = get_bloginfo('template_directory');
		
		//echo "number = " .$number. "<br />";
		//echo $style;
		
		$reverse = array_reverse($Keys);
		
		foreach ($Images as $post) {

			$iN = $post->ID; 
				
				
			$sTUrl = wp_get_attachment_url($iN); 
			
			$fileName = end(explode(''.$url.'/', $sTUrl));
			$title = the_title_attribute('echo=0');
			$content = $post->post_content;
			
			if ($content == '') {
			$content = $title;
			}
			
			
			$sImg = '<div><a href="' . $sTUrl.'" title="' . $content . '">' .
								'<img src="' . $filepath . '/timthumb.php?src=/'.$fileName.'&amp;w=80&amp;h=80&amp;q=100" alt="' . $title . '" />' . 
							'</a>
							<strong>2011 Photography by <br /><a href="http://www.orlylyndon.com//" target="_blank">Orly Lyndon - The Boutique Photographer</a></strong>
							<span>' . $content . '</span></div>'; 
							
			echo $sImg;
		
		}
						
         
    } 
}


add_action('init', 'remheadlink');
function remheadlink() {
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
}

?>