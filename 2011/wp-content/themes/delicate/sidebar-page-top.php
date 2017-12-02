<?php if ( is_sidebar_active('page-top') ) {
	echo '<div id="page-top" class="aside">'. "\n";
		dynamic_sidebar('page-top');
	echo '</div><!-- END #PAGE-TOP .ASIDE -->'. "\n";
} ?>