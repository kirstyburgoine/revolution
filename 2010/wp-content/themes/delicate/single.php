<?php require ( DELICATE_INCLUDES . "/variables.php" ); $post = $wp_query->post;

// LOAD SINGLE PORTFOLIO PAGE IF CATEGORY HAS BEEN SET
if (in_category(get_setting('portfolio_category'))) { require('single-portfolio.php');

} else { // LOAD SINGLE DEFAULT PAGE IF NO CATEGORY HAS BEEN SET
require('single-default.php');

} ?>