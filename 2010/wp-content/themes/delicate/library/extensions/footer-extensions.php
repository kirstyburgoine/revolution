<?php

// BEGIN FOOTER CONTENT
function delicate_footer_content($delicate_footer_content) {
	$delicate_footer_content = apply_filters('delicate_footer_content', $delicate_footer_content);
	return $delicate_footer_content;
} // END FOOTER CONTENT

// BEGIN GOOGLE ANALYTICS
function delicate_analytics() { ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11291544-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php } add_action('delicate_analytics', 'delicate_analytics'); // END GOOGLE ANALYTICS

?>