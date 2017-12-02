<?php

// GET BLOG CATEGORY
$delicate_blog_cat = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms " ."WHERE name='$delicate_blog_cat'" );

// GET THE URL FOR THE BLOG CATEGORY
$blog_category_link = get_category_link( $delicate_blog_cat );

// GET FEATURED CATEGORY
$delicate_portfolio_cat = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms " ."WHERE name='$delicate_portfolio_cat'" );

// GET THE URL FOR THE FEATURED CATEGORY
$portfolio_category_link = get_category_link( $delicate_portfolio_cat );

?>