<?php if ( is_sidebar_active('index-bottom') ) {
	echo '<div id="index-bottom" class="aside">'. "\n";
		dynamic_sidebar('index-bottom');
	echo '</div><!-- END #INDEX-BOTTOM .ASIDE -->'. "\n";
} ?>