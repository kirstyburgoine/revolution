<?php

// BEGIN FOOTER CONTENT
function delicate_footer_content($delicate_footer_content) {
	$delicate_footer_content = apply_filters('delicate_footer_content', $delicate_footer_content);
	return $delicate_footer_content;
} // END FOOTER CONTENT

// BEGIN GOOGLE ANALYTICS
function delicate_analytics() { ?>



<?php } add_action('delicate_analytics', 'delicate_analytics'); // END GOOGLE ANALYTICS

?>