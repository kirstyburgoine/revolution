<?php if ( is_sidebar_active('single-bottom') ) {
	echo '<div id="single-bottom" class="aside">'. "\n";
		dynamic_sidebar('single-bottom');
	echo '</div><!-- END #SINGLE-BOTTOM .ASIDE -->'. "\n";
} ?>