 <?php
//echo "Page " . $_SERVER["REQUEST_URI"];

?>
 
 
    <header>
    	<div class="site-container">
    		<div class="header-block">
	    		<h1><a href="http://2012.shropgeek-revolution.co.uk">The Theory of (R)evolution</a></h1>
	    		<h2 class="event-date">28 September 2012</h2>
	    	</div>
	    	<nav role="navigation">
	    		<ul>
	    			<?php /*<li><a href="http://2012.shropgeek-revolution.co.uk/" <?php if ( $_SERVER["REQUEST_URI"] == '/') { echo "class=\"current\""; } ?>>Home</a></li> */ ?>
	    			<li><a href="http://2012.shropgeek-revolution.co.uk/about.php" <?php if ( $_SERVER["REQUEST_URI"] == '/about.php') { echo "class=\"current\""; } ?>>About</a></li>
	    			<li class="mid"><a href="http://2012.shropgeek-revolution.co.uk/speakers.php" <?php if ( $_SERVER["REQUEST_URI"] == '/speakers.php') { echo "class=\"current\""; } ?>>Speakers</a></li>
	    			<li><a href="http://2012.shropgeek-revolution.co.uk/location.php" <?php if ( $_SERVER["REQUEST_URI"] == '/location.php') { echo "class=\"current\""; } ?>>Location</a></li>
	    			<li><a href="http://2012.shropgeek-revolution.co.uk/schedule.php" <?php if ( $_SERVER["REQUEST_URI"] == '/schedule.php') { echo "class=\"current\""; } ?>>Schedule</a></li>
                    <li><a href="http://2012.shropgeek-revolution.co.uk/the-night.php" <?php if ( $_SERVER["REQUEST_URI"] == '/the-night.php') { echo "class=\"current\""; } ?>>On The Night</a></li>
	    			<li><a href="http://2012.shropgeek-revolution.co.uk/buy.php" class="button <?php if ( $_SERVER["REQUEST_URI"] == '/buy.php') { echo "current"; } ?>">Buy your ticket</a></li>
	    		</ul>
	    	</nav>
    	</div>
    </header>