<?php if ( is_sidebar_active('index-top') ) {
	echo '<div id="index-top" class="aside">'. "\n";
		dynamic_sidebar('index-top');
	echo '</div><!-- END #INDEX-TOP .ASIDE -->'. "\n";
} ?>