<?php if ( is_sidebar_active('index-insert') ) {
	echo '<div id="index-insert" class="aside">'. "\n";
		dynamic_sidebar('index-insert');
	echo '</div><!-- END #INDEX-INSERT .ASIDE -->'. "\n";
} ?>