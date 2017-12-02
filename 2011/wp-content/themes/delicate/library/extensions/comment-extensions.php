<?php // COMMENTS CALLBACK ALLOWS FOR MORE CONTROL OVER THE WAY COMMENTS ARE DISPLAYED

// PRODUCES AN AVATAR IMAGE WITH THE HCARD-COMPLIANT PHOTO CLASS
function delicate_commenter_link() {
	$commenter = get_comment_author_link();
	if ( ereg('<a[^>]* class=[^>]+>', $commenter) ) {
		$commenter = ereg_replace('(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter);
	} else {
		$commenter = ereg_replace('(<a )/', '\\1class="url "' , $commenter);
	}
	$avatar_email = get_comment_author_email();
	$avatar_size = apply_filters('avatar_size', '80');
	$avatar = str_replace("class='avatar", "class='photo avatar", get_avatar( $avatar_email, $avatar_size ) );
	echo $avatar . ' <span class="comment-author-name">' . $commenter . '</span>';
}

// REMOVES THE NUMBER OF TRACKBACKS FROM THE COMMENT COUNT
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	global $id;
	$comments = get_approved_comments($id);
	$comment_count = 0;
	foreach($comments as $comment){
		if($comment->comment_type == ""){
			$comment_count++;
		}
	}
	return $comment_count;
}

// CREATES A DELETE COMMENT/SPAM LINK
function delete_comment_link($id) {
	if (current_user_can('edit_post')) {
		echo ' | <span class="delete-comment-button"><a href="'.admin_url("comment.php?action=cdc&c=$id").'">Delete</a></span> ';
		echo ' | <span class="spam-comment-button"><a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Spam</a></span>';
	}
}

// CUSTOM COMMENTS CALLBACK
function delicate_comments($comment, $args, $depth) { $GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth; ?>

<li id="comment-<?php comment_ID(); ?>" class="<?php delicate_comment_class(); ?>">

<div class="comment-author vcard">
	<?php delicate_commenter_link(); ?>
</div><!-- END .COMMENT-AUTHOR VCARD -->

<div class="comment-meta">
	<?php printf(__('%1$s at %2$s <span class="meta-sep">|</span> <span class="comment-permalink"><a href="%3$s" title="Permalink to this comment">Permalink</a></span> '),
	get_comment_date(),
	get_comment_time(),
	'#comment-' . get_comment_ID() );
	edit_comment_link(__('Edit'), '<span class="meta-sep">|</span> <span class="edit-comment-button">', '</span>');
	delete_comment_link(get_comment_ID()); ?>
</div><!-- END .COMMENT-META -->

<?php if ( $comment->comment_approved == '0' ) _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n") ?>

<div class="comment-content">
	<?php comment_text(); ?>
</div><!-- END .COMMENT-CONTENT -->

<?php if( $args['type'] == 'all' || get_comment_type() == 'comment' ) :
	comment_reply_link(array_merge($args, array(
		'reply_text' => __('Reply'), 
		'login_text' => __('Log in to reply.'),
		'depth' => $depth,
		'before' => '<div class="comment-reply-button">', 
		'after' => '</div>' ))); endif; ?>

<?php }

// CUSTOM PINGS CALLBACK
function delicate_pings( $comment, $args, $depth ) { $GLOBALS['comment'] = $comment; ?>

<li id="comment-<?php comment_ID(); ?>" class="<?php delicate_comment_class() ?>">

<?php printf(__('%1$s on %2$s at %3$s' ),
	get_comment_author_link(),
	get_comment_date('n/j/Y'),
	get_comment_time() );
	edit_comment_link(__('Edit'), ' <span class="meta-sep">|</span> <span class="edit-trackback-button">', '</span>');
	delete_comment_link(get_comment_ID()); ?>

<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n') ?>

<div class="comment-content">
	<?php comment_text(); ?>
</div><!-- END .COMMENT-CONTENT -->

<?php } ?>