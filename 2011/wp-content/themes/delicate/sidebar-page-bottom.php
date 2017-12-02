<?php if ( is_sidebar_active('page-bottom') ) {
	echo '<div id="page-bottom" class="aside">'. "\n";
		dynamic_sidebar('page-bottom');
	echo '</div><!-- END #PAGE-BOTTOM .ASIDE -->'. "\n";
} ?>