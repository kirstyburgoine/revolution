<form class="searchform" method="get" action="<?php bloginfo('url'); ?>">
	<p><input class="search" type="text" name="s" value="<?php _e('Search') ?>" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" /></p>
	<p><button class="search-btn" type="submit" value="<?php _e('Search') ?>">Search</button></p>
</form>