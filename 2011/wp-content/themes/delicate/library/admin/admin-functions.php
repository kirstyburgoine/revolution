<?php

/* Actions */
add_action('wp_head', 'custom_wp_head');

/* Adds a custom header hook. */
function custom_wp_head() {

	/* Allows end users to input custom css. */
	$custom_css = get_setting('custom_css');
	if ( $custom_css != '' ) {
		$print = "" . '<style type="text/css">' . "\n";
		$print .= "\t" . $custom_css . "\n";
		$print .= "" . '</style>' . "\n";
		echo $print;
	}

	/* Allows end users to input customize the dimensions of the logo. */
	$logo_width = get_setting('logo_width');
	$logo_height = get_setting('logo_height');
	if ( $logo_width != '' ) {
		$print = "\n" . '<style type="text/css">' . "\n";
		$print .= "\t" . '#site-logo a { height: ' . $logo_height . 'px; width: ' . $logo_width . 'px; }' . "\n";
		$print .= "" . '</style>' . "\n";
		echo $print;
	}

}

?>