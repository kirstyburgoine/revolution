<?php require ( DELICATE_INCLUDES . "/variables.php" );

// LOAD BLOG PAGE IF CATEGORY HAS BEEN SET
if (in_category(get_setting('blog_category'))) { require('page-blog.php');

} elseif ( // LOAD PORTFOLIO PAGE IF CATEGORY HAS BEEN SET
in_category(get_setting('portfolio_category'))) { require('page-portfolio.php');

} else { // LOAD DEFAULT CATEGORY PAGE IF NO CATEGORY HAS BEEN SET
require('category-default.php');

} ?>