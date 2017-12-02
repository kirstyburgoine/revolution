<?php

$themename = "Delicate";
$theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
$version = $theme_data['Version'];

/* Creates a page called 'theme-settings.php' in the admin under the 'Comments' menu. */
function theme_page() { global $themename;
	add_object_page('Theme Settings', $themename, 10, 'theme-settings.php', theme_admin, get_bloginfo('template_url') . '/library/admin/media/images/favicon.png');
	add_submenu_page ('theme-settings.php', $themename, 'Theme Settings', 10, 'theme-settings.php', theme_admin);
	add_submenu_page('theme-settings.php', 'ThemeForest Portfolio', 'Buy More Themes', 10, 'more-themes.php', sub_pages);
}

/* Admin Actions */
if ( is_admin() ) :
	add_action('admin_menu', 'theme_page');
	add_action('admin_print_scripts', 'admin_scripts');
	add_action('admin_print_styles', 'admin_styles');
endif;

/* Displays the theme-settings.php content. */
function theme_admin() { global $theme_options, $themename, $version;

	/* Admin Title */
	echo '<div id="admin-title"><h2>' . $themename, '<span id="version-number">' . $version . '</h2></span></div>';


	if ( isset($_GET['page']) && $_GET['page'] == 'theme-settings.php' ) {

		if ( isset($_REQUEST['save']) ) {
			flush_theme_options(); $theme_options->save_options(); update_theme_options();
			echo '<div id="success" class="updated"><p><strong>' . $themename . '\'s settings have been successfully updated and saved to the database.</strong></p></div>';
		}
		
		if ( isset($_REQUEST['reset']) ) {
			/* The prefix of _options should vary by theme to prevent conflicts with the database. */
			delete_option('delicate_options'); flush_theme_options();
			echo '<div id="warning" class="updated"><p><strong>' . $themename . '\'s settings have been reset to their default values and deleted from the database.</strong></p></div>';
		}

?>

<div id="theme-options" class="wrap">
	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url') . '/library/media/images/favicon.ico' ?>" />
	<form id="settings-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
		<ul id="tabs" class="clearfix">
			<?php $tabs = array_merge( admin_tabs() ); foreach ( $tabs as $id => $name ) : ?>
				<li><a href="#<?php echo $id ?>"><?php echo $name ?></a></li>
			<?php endforeach ?>
		</ul><!-- #tabs .clearfix -->

		<?php
			foreach ( $tabs as $id => $name ) {
				echo '<div id="' . $id . '" class="option-wrap">';
					do_action("admin_{$id}");
				echo '</div>';
			}
		?>
	</form><!-- #settings-form -->
</div><!-- #theme-options .wrap -->

<?php } }

/* Load theme settings scripts. */
function admin_scripts() {
	wp_enqueue_script('theme-admin-js', get_bloginfo('template_url') . '/library/admin/media/scripts/initiate.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tabs'), null, false);
}

/* Load theme settings styles. */
function admin_styles() {
	wp_enqueue_style('structure', get_bloginfo('template_url') . '/library/admin/media/css/structure.css');
}

/* Tab Function */
function admin_tabs() {
	$default_tabs = array (
		'general'	=>	'General Settings',
		'header'	=>	'Header Settings',
		'post'		=>	'Post Settings',
		'page'		=>	'Page Settings',
		'foot'		=>	'Footer Settings'
	);
	return apply_filters('admin_tabs', $default_tabs);
}

/* Theme Setting Actions */
add_action('admin_general', 'general_settings');
add_action('admin_header', 'header_settings');
add_action('admin_post', 'post_settings');
add_action('admin_page', 'page_settings');
add_action('admin_foot', 'footer_settings');

/* Load General Settings */
require_once ( DELICATE_ADMIN . '/templates/general.php' );

/* Load Header Settings */
require_once ( DELICATE_ADMIN . '/templates/header.php' );

/* Load Post Settings */
require_once ( DELICATE_ADMIN . '/templates/post.php' );

/* Load Page Settings */
require_once ( DELICATE_ADMIN . '/templates/page.php' );

/* Load Footer Settings */
require_once ( DELICATE_ADMIN . '/templates/footer.php' );

/* Load Sub Pages */
function sub_pages() {
	require_once ( DELICATE_ADMIN . '/more-themes.php');
}

?>