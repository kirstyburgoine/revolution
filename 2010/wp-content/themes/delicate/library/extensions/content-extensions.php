<?php

// BEGIN ENTRY TITLE
function delicate_entry_title() {
	if ( is_attachment() )
		$title = the_title('<h1 class="attachment-title entry-title">', '</h1>', false);

	elseif( is_front_page() && !is_home() )
		$title = the_title('<h3 class="page-title entry-title">', '</a>', false);

	elseif ( is_page() )
		$title = the_title('<h1 class="page-title entry-title">', '</h1>', false);

	elseif ( is_single() )
		$title = the_title('<h1 class="single-title entry-title">', '</h1>', false);

	elseif ('link_category' == get_query_var('taxonomy'))
		$title = false;

	else
		$title = the_title('<h3 class="post-title entry-title">', '</h3>', false);

	echo apply_filters('delicate_entry_title', $title);
} // END ENTRY TITLE

// BEGIN BYLINE
function delicate_byline() { global $post;
	if ( !is_page() && !is_attachment() && 'link_category' !== get_query_var( 'taxonomy' ) ) :
		$byline = '<p class="byline">';
		$byline .= sprintf( __('<span class="byline-prep byline-prep-author text">Written by</span> %1$s <span class="byline-prep byline-prep-published text">on</span> %2$s'), '<span class="author vcard"><a class="author-name" href="' . get_author_posts_url( get_the_author_meta('ID') ) . '" title="' . get_the_author_meta('display_name') . '">' . get_the_author_meta('display_name') . '</a></span>', '<abbr class="published" title="' . sprintf( get_the_time( __('l, F jS, Y &#64; g:i a') ) ) . '">' . sprintf( get_the_time( ('m/d/Y') ) ) . '</abbr>');
		$byline .= get_the_term_list($post->ID, 'category', '<span class="categories"><span class="meta-prep meta-prep-categories text">' . __(' in') . '</span> ', ', ', '</span>');
	if ( current_user_can('edit_posts') )
		$byline .= ' <span class="byline-sep byline-sep-edit separator">|</span> <span class="edit"><a href="' . get_edit_post_link($post->ID) . '" title="' . __('Edit Post') . '">' . __('Edit') . '</a></span>';
		$byline .= '</p>'; endif;
	echo apply_filters('delicate_byline', $byline);
} // END BYLINE

// BEGIN ENTRY META
function delicate_entry_meta() { global $post;
	if ( !is_singular() && comments_open() ) :
		$number = get_comments_number();
	if ( $number == 0 )
		$comments_link = ' <span class="meta-sep meta-sep-comments separator">|</span> <a class="comments-link" href="' . get_permalink() . '#respond" title="' . sprintf( __('Comment on %1$s'), the_title_attribute('echo=0') ) . '">' . __('Leave A Comment') . '</a>';
	elseif ( $number == 1 )
		$comments_link = ' <span class="meta-sep meta-sep-comments separator">|</span> <a class="comments-link" href="' . get_comments_link() . '" title="' . sprintf( __('Comment on %1$s'), the_title_attribute('echo=0') ) . '">' . __('1 Comment') . '</a>';
	else
		$comments_link = ' <span class="meta-sep meta-sep-comments separator">|</span> <a class="comments-link" href="' . get_comments_link() . '" title="' . sprintf( __('Comment on %1$s'), the_title_attribute('echo=0') ) . '">' . sprintf( __('%1$s Comments'), $number) . '</a>';
	endif;

	if ( !is_page() && !is_attachment() && 'link_category' !== get_query_var('taxonomy') ) :
		$metadata = '<p class="entry-meta post-meta-data">';
		$metadata .= get_the_term_list($post->ID, 'category', '<span class="categories"><span class="meta-prep meta-prep-categories text">' . __('Posted in') . '</span> ', ', ', '</span>');
		$metadata .= get_the_term_list($post->ID, 'post_tag', '<span class="tags"> <span class="meta-sep meta-sep-tags separator">|</span> <span class="meta-prep meta-prep-tags text">' . __('Tagged') . '</span> ', ', ', '</span>');
		$metadata .= $comments_link;
		$metadata .= '</p>';
	elseif ( is_page() ) :
	if ( current_user_can('edit_pages') ) :
		$metadata = '<p class="entry-meta post-meta-data">';
		$metadata .= '<span class="edit"><a href="' . get_edit_post_link($post->ID) . '" title="' . __('Edit Page') . '">' . __('Edit') . '</a></span>';
		$metadata .= '</p>';
		endif;
	endif;

	echo apply_filters('delicate_entry_meta', $metadata);
} // END ENTRY META

// BEGIN PAGINATION
function delicate_pagination() { ?>

<?php if(function_exists('wp_pagenavi')) { // IF PAGENAVI IS ACTIVATED ?>
<?php wp_pagenavi(); // USE PAGENAVI ?>
<?php } else { // OTHERWISE, USE TRADITIONAL NAVIGATION ?>
	<div class="navigation">
		<div class="nav-previous">
			<?php next_posts_link('Older Entries'); ?>
		</div><!-- END .NAV-PREVIOUS -->

		<div class="nav-newer">
			<?php previous_posts_link('Newer Entries'); ?>
		</div><!-- END .NAV-NEWER -->
	</div><!-- END .NAVIGATION -->
<?php } // END IF-ELSE STATEMENT ?>

<?php } add_action('delicate_pagination', 'delicate_pagination'); // END PAGINATION

// IMPROVE THE_EXCERPT
function wp_improved_trim_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
		$excerpt_length = 200;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words,'...');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_improved_trim_excerpt');

// PRODUCES AN AVATAR IMAGE WITH THE HCARD-COMPLIANT PHOTO CLASS FOR AUTHOR INFO
function delicate_author_avatar() {
	global $wp_query; $curauth = $wp_query->get_queried_object();
	$email = $curauth->user_email;
	$avatar = str_replace("class='avatar", "class='photo avatar", get_avatar("$email") );
	echo $avatar;
}

// CREATES NICE TAGS
function delicate_tag_query() {
	$nice_tag_query = get_query_var('tag');
	$nice_tag_query = str_replace(' ', '+', $nice_tag_query);
	$tag_slugs = preg_split('%[,+]%', $nice_tag_query, -1, PREG_SPLIT_NO_EMPTY);
	$tag_ops = preg_split('%[^,+]*%', $nice_tag_query, -1, PREG_SPLIT_NO_EMPTY);
	$tag_ops_counter = 0;
	$nice_tag_query = '';

foreach ($tag_slugs as $tag_slug) { 
	$tag = get_term_by('slug', $tag_slug ,'post_tag');

if ($tag_ops[$tag_ops_counter] == ',') {
	$tag_ops[$tag_ops_counter] = ', ';

} elseif ($tag_ops[$tag_ops_counter] == '+') {
	$tag_ops[$tag_ops_counter] = ' + '; }
	$nice_tag_query = $nice_tag_query.$tag->name.$tag_ops[$tag_ops_counter];
	$tag_ops_counter += 1; }
	return $nice_tag_query; }

// REMOVES CURLY QUOTES FROM THE_CONTENT
remove_filter('the_content', 'wptexturize');

/* Shorten the URL using TinyURL. */
function get_tiny_url($url) {
	if ( function_exists('curl_init') ) {
		$url = 'http://tinyurl.com/api-create.php?url=' . $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		$tinyurl = curl_exec($ch);
		curl_close($ch);
	return $tinyurl;
	} else {
		/* if cURL is disabled, and can't shorten the URL. Return the long URL instead. */
		return $url;
	}
}


// -----------------------------------------------------------------------------------------------------------
// Adds formatting to the excerpt

function improved_trim_excerpt($text) { // Fakes an excerpt if needed
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text, '<p>');
		$excerpt_length = 200;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, '[...]');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');


function featured_content($num) { 
	$theContent = get_the_content();  
	$output = preg_replace('/<img[^>]+./','', $theContent);  
	$limit = $num+1;  
	$content = explode(' ', $output, $limit);  
	array_pop($content);  
	$content = implode(" ",$content);  
	echo nl2br($content);  
}



?>