<?php if ( is_sidebar_active('single-top') ) {
	echo '<div id="single-top" class="aside">'. "\n";
		dynamic_sidebar('single-top');
	echo '</div><!-- END #SINGLE-TOP .ASIDE -->'. "\n";
} ?>