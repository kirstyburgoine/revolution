<?php

// BEGIN POPULAR POSTS
function delicate_popular_posts() {

// POPULAR POSTS FUNCTION
function popular_posts ($no_posts = 5, $before = '<li>', $after = '</li>', $show_pass_post = false, $duration='') {
global $wpdb; $request = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'comment_count' FROM $wpdb->posts, $wpdb->comments"; $request .= " WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish'"; if(!$show_pass_post) $request .= " AND post_password =''"; if($duration !="") { $request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date "; } $request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts"; $posts = $wpdb->get_results($request); $output = ''; if ($posts) { foreach ($posts as $post) { $post_title = stripslashes($post->post_title); $comment_count = $post->comment_count; $permalink = get_permalink($post->ID); $output .= $before . '<a href="' . $permalink . '" title="' . $post_title.'">' . $post_title . '</a> ' . /*$comment_count .*/ '' . $after; } } else { $output .= $before . "No Popular Posts" . $after; } echo $output; }

?>

	<div id="popular-wrapper">
		<div class="popular-title">
			<h3>Popular Posts</h3>
		</div><!-- END .POPULAR-TITLE -->

		<ul>
			<?php popular_posts(); ?>
		</ul>
	</div><!-- END #POPULAR-WRAPPER -->

<?php } add_action('delicate_popular_posts', 'delicate_popular_posts'); // END POPULAR POSTS

// BEGIN SOCIAL BOOKMARKS
function delicate_social_bookmarks() { ?>

<div id="social-wrapper">

	<div class="social-title">
		<h3>Share/Bookmark</h3>
	</div><!-- END .SOCIAL-TITLE -->

	<div id="social-bookmarks">

		<a rel="nofollow" href="http://blinklist.com/index.php?Action=Blink/addblink.php&amp;url=<?php the_permalink(); ?>&amp;Title=<?php echo urlencode(get_the_title($id)); ?>" title="Share this post on Blinklist" class="blinklist">Blinklist</a>

		<a rel="nofollow" href="http://del.icio.us/post?url=<?php the_permalink() ?>&amp;title=<?php echo wp_kses_normalize_entities(get_the_title($id)); ?>" title="Bookmark this post on Delicious" class="delicious">Delicious</a>

		<a rel="nofollow" href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>" title="Submit this post to Digg" class="digg">Digg</a>

		<a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo urlencode(get_the_title($id)); ?>" title="Share this post on Facebook" class="facebook">Facebook</a>

		<a rel="nofollow" href="http://www.google.com/bookmarks/mark?op=add&amp;bkmk=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Bookmark this post on Google Bookmarks" class="google">Google</a>

		<a rel="nofollow" href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode(get_the_title($id)); ?>" title="Share this post on Reddit" class="reddit">Reddit</a>

		<?php printf( __('<a rel="nofollow" href="%5$s" title="Comments RSS to %4$s" type="application/rss+xml" class="rss">RSS</a>'), get_the_category_list(), get_the_tag_list(), get_permalink(), the_title_attribute('echo=0'), comments_rss() ) ?>

		<a rel="nofollow" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode(get_the_title($id)); ?>" title="Share this post on StumbleUpon" class="stumbleupon">StumbleUpon</a>

		<a rel="nofollow" href="http://technorati.com/faves?add=<?php bloginfo('url'); ?>" title="Add <?php bloginfo('name'); ?> to your Technorati favorites" class="technorati">Technorati</a>

		<a rel="nofollow" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php echo get_tiny_url( get_permalink($post->ID) ); ?>" title="Share <?php the_title('&quot;', '&quot;'); ?> with your followers" class="twitter">Twitter</a>

	</div><!-- END #SOCIAL-BOOKMARKS -->

</div><!-- END #SOCIAL-WRAPPER -->

<?php } add_action('delicate_social_bookmarks', 'delicate_social_bookmarks'); // END SOCIAL BOOKMARKS

// BEGIN POST LINKS BELOW
function delicate_post_links_below() { ?>

	<div id="nav-below" class="post-navigation">
		<div class="previous-post alignleft"><?php previous_post_link('<span class="nav-arrow left-arrow">&lsaquo;</span> %link'); ?></div>
		<div class="next-post alignright"><?php next_post_link('%link <span class="nav-arrow right-arrow">&rsaquo;</span>') ?></div>
	</div><!-- END #NAV-BELOW .POST-NAVIGATION -->

<?php } add_action('delicate_post_links_below', 'delicate_post_links_below'); // END POST LINKS BELOW

?>