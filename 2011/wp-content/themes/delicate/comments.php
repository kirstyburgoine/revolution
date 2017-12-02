<div id="comments">

<?php $req = get_option('require_name_email');
if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
die ('Please do not load this page directly. Thanks!');
if ( ! empty($post->post_password) ) :
if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) : ?>

<div class="password-protected">
	<?php _e('This post is password protected. Enter the password to view any comments.') ?>
</div><!-- END .PASSWORD-PROTECTED -->

</div><!-- END #COMMENTS -->

<?php return; endif; endif; ?>

<?php if ( have_comments() ) : ?>

<?php // NUMBER OF PINGS AND COMMENTS
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
get_comment_type() == "comment" ? ++$comment_count : ++$ping_count; ?>

<?php if ( ! empty($comments_by_type['comment']) ) : ?>

<div id="comments-list" class="comments">

<h3 id="comments-number" class="comments-header">
	<?php printf ( $comment_count > 1 ? __('%d Comments') : __('One Comment'), $comment_count ); ?>
</h3><!-- END #COMMENTS-NUMBER .COMMENTS-HEADER -->

<ol>
	<?php wp_list_comments('type=comment&callback=delicate_comments'); ?>
</ol><!-- END ORDERED LIST FOR COMMENTS -->

<div class="paginated-comment-links">
	<?php paginate_comments_links(); ?>
</div><!-- END .PAGINATED-COMMENT-LINKS -->

</div><!-- END #COMMENTS-LIST .COMMENTS -->

<?php endif; /* IF ( $COMMENT_COUNT ) */ ?>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>

<div id="trackback-list" class="comments">

<h3 id="pings-number" class="comments-header">
	<?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks') : __('<span>One</span> Trackback'), $ping_count) ?>
</h3><!-- END #PINGS-NUMBER .COMMENTS-HEADER -->

<ol>
	<?php wp_list_comments('type=pings&callback=delicate_pings'); ?>
</ol><!-- END ORDERED LIST FOR PINGS -->

</div><!-- END #TRACKBACK-LIST .COMMENTS -->

<?php endif /* IF ( $PING_COUNT ) */ ?>
<?php endif /* IF ( $COMMENTS ) */ ?>
<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<div id="respond-inside">

<h3 class="comment-form-title">
	<?php comment_form_title( __('Leave a Comment'), __('Reply to %s') ); ?>
</h3><!-- END .COMMENT-FORM-TITLE -->

<div id="cancel-comment-reply">
	<?php cancel_comment_reply_link('Cancel Reply' ) ?>
</div><!-- END #CANCEL-COMMENT-REPLY -->

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p id="login-req">
	<?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.'), get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?>
</p><!-- END #LOGIN-REQ -->

<?php else : ?>

<div class="form-wrapper">

<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

<?php if ( $user_ID ) : ?>

<p id="login">
	<?php printf(__('<span class="logged-in">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Logout?</a></span>'),
get_option('siteurl') . '/wp-admin/profile.php', wp_specialchars($user_identity, true), wp_logout_url(get_permalink()) ) ?>
</p><!-- END #LOGIN -->

<?php else : ?>

<p id="comment-notes">
	<?php _e('Your email is <em>never</em> published nor shared.') ?>
	<?php if ($req) _e('Required fields are marked <span class="required">*</span>') ?>
</p><!-- END #COMMENT-NOTES -->

<div id="form-section-author" class="form-section">

	<div class="form-label">
		<label for="author">
			<?php _e('Name') ?>
		</label>
		<?php if ($req) _e('<span class="required">*</span>') ?>
	</div><!-- END .FORM-LABEL -->

	<div class="form-input">
		<input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" />
	</div><!-- END .FORM-INPUT -->

</div><!-- END #FORM-SECTION-AUTHOR .FORM-SECTION -->

<div id="form-section-email" class="form-section">

	<div class="form-label">
		<label for="email">
			<?php _e('Email') ?>
		</label><!-- END EMAIL LABEL -->
		<?php if ($req) _e('<span class="required">*</span>') ?>
	</div><!-- END .FORM-LABEL -->

	<div class="form-input">
		<input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" />
	</div><!-- END .FORM-INPUT -->

</div><!-- END #FORM-SECTION-EMAIL .FORM-SECTION -->

<div id="form-section-url" class="form-section">

	<div class="form-label">
		<label for="url">
			<?php _e('Website') ?>
		</label><!-- END URL LABEL -->
	</div><!-- END .FORM-LABEL -->

	<div class="form-input">
		<input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" />
	</div><!-- END .FORM-INPUT -->

</div><!-- END #FORM-SECTION-URL .FORM SECTION -->

<?php endif /* IF ( $USER_ID ) */ ?>

<div id="form-section-comment" class="form-section">

	<div class="form-label">
		<label for="comment">
			<?php _e('Comment') ?>
		</label><!-- END COMMENT LABEL -->
	</div><!-- END .FORM-LABEL -->

	<div class="form-textarea">
		<textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea>
	</div><!-- END .FORM-TEXTAREA -->

</div><!-- END #FORM-SECTION-COMMENT .FORM-SECTION -->

<div class="form-submit">
	<input class="submit-comment button" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e(''); ?>" />
	<input class="reset-comment button" name="reset" type="reset" id="reset" tabindex="6" value="<?php _e(''); ?>" />
</div><!-- END .FORM-SUBMIT -->

	<p><?php comment_id_fields(); ?></p>

	<p><?php do_action('comment_form', $post->ID); ?></p>

</form><!-- END #COMMENTFORM -->

</div><!-- END .FORM-WRAPPER -->

	<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>

</div><!-- END #RESPOND-INSIDE -->

</div><!-- END #RESPOND -->

	<?php endif /* if ( 'open' == $post->comment_status ) */ ?>

</div><!-- END #COMMENTS -->