<?php
  
function delicate_blog_title() {
	return '<a class="blog-title" href="' . get_bloginfo('url') . '" title="' . get_bloginfo('name') . '" rel="home"><span>' . get_bloginfo('name') . '</span></a>'; }
	add_shortcode('blog-title', 'delicate_blog_title');

function delicate_copyright() {
	$themelink = '<span class="copyright">Copyright &#169;</span>';
	return apply_filters('delicate_copyright', $themelink); }
	add_shortcode('copyright', 'delicate_copyright');

function delicate_creator_link() {
	$themelink = '<span class="created-by">Created by <a href="http://itsmattadams.com/" rel="creator" class="theme-author">Matt Adams</a></span>.';
	return apply_filters('delicate_creator_link', $themelink); }
	add_shortcode('theme-creator', 'delicate_creator_link');

function delicate_login_link() { if ( ! is_user_logged_in() )
	$link = '<span class="login"><a href="' . get_settings('siteurl') . '/wp-login.php">' . __('Login') . '</a></span>';
	else // DISPLAY LOGOUT LINK IF LOGGED IN
	$link = '<span class="logout"><a href="' . wp_logout_url($redirect) . '">' . __('Logout') . '</a></span>';
	return apply_filters('loginout', $link); }
	add_shortcode('login-logout', 'delicate_login_link');

function delicate_scroll_to_top() {
	return '<span class="scroll-to-top"><a href="#header">Back to Top</a></span>'; }
	add_shortcode('scroll-to-top', 'delicate_scroll_to_top');

function delicate_wp_link() {
	return '<span class="powered-by">Powered by <a class="wp-link" href="http://WordPress.org/" title="The state-of-the-art semantic personal publishing platform." rel="generator">WordPress</a></span>'; }
	add_shortcode('wp-link', 'delicate_wp_link');

function delicate_year() {
	return '<span class="the-year">' . date('Y') . '</span>'; }
	add_shortcode('the-year', 'delicate_year');

?>