<?php

// LOAD CUSTOM WIDGETS
require_once ( DELICATE_WIDGETS . '/120x60.php');
require_once ( DELICATE_WIDGETS . '/125x125.php');
require_once ( DELICATE_WIDGETS . '/234x60.php');
require_once ( DELICATE_WIDGETS . '/240x400.php');
require_once ( DELICATE_WIDGETS . '/250x250.php');
require_once ( DELICATE_WIDGETS . '/about.php');
require_once ( DELICATE_WIDGETS . '/adsense.php');
require_once ( DELICATE_WIDGETS . '/feedburner.php');
require_once ( DELICATE_WIDGETS . '/flickr.php');
require_once ( DELICATE_WIDGETS . '/profiles.php');
require_once ( DELICATE_WIDGETS . '/twitter.php');

// REGISTER SIDEBARS
if (function_exists('register_sidebar')) {

function is_sidebar_active( $index ) { global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets(); if ($widgetcolums[$index]) return true; return false;
}

// PRIMARY WIDGET AREA
register_sidebar( array( 'name' => __('Primary'), 'id' => 'primary', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// SECONDARY WIDGET AREA
register_sidebar( array( 'name' => __('Secondary'), 'id' => 'secondary', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// FIRST SUBSIDIARY WIDGET AREA
register_sidebar( array( 'name' => __('Subsidiary: First'), 'id' => 'first-subsidiary', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// SECOND SUBSIDIARY WIDGET AREA
register_sidebar( array( 'name' => __('Subsidiary: Second'), 'id' => 'second-subsidiary', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// THIRD SUBSIDIARY WIDGET AREA
register_sidebar( array( 'name' => __('Subsidiary: Third'), 'id' => 'third-subsidiary', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// INDEX-TOP WIDGET AREA
register_sidebar( array( 'name' => __('Index: Top'), 'id' => 'index-top', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// INDEX-INSERT WIDGET AREA
register_sidebar( array( 'name' => __('Index: Insert'), 'id' => 'index-insert', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// INDEX-BOTTOM WIDGET AREA
register_sidebar( array( 'name' => __('Index: Bottom'), 'id' => 'index-bottom', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// PAGE-TOP WIDGET AREA
register_sidebar( array( 'name' => __('Page: Top'), 'id' => 'page-top', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// PAGE-BOTTOM WIDGET AREA
register_sidebar( array( 'name' => __('Page: Bottom'), 'id' => 'page-bottom', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// SINGLE-TOP WIDGET AREA
register_sidebar( array( 'name' => __('Single: Top'), 'id' => 'single-top', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

// SINGLE-BOTTOM WIDGET AREA
register_sidebar( array( 'name' => __('Single: Bottom'), 'id' => 'single-bottom', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

} ?>