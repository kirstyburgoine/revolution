<?php
 
/*
 *
 *	Plugin Name: About Widget
 *	Description: An advanced widget that allows you to describe yourself, and/or what your site is about.
 *	Author: Matt Adams
 *	Author URI: http://itsmattadams.com
 *
 */

// ADD FUNCTION TO WIDGETS_INIT THAT WILL LOAD THE WIDGET
add_action('widgets_init', 'about_load_widgets');

// REGISTER THE WIDGET
function about_load_widgets() {
	register_widget('About_Widget');
}

// THIS CLASS HANDLES EVERYTHING THAT NEEDS TO BE HANDLED BY THE WIDGET
class About_Widget extends WP_Widget {

// WIDGET SETUP
function About_Widget() {

// WIDGET SETTINGS
$widget_ops = array('classname' => 'about', 'description' => __('An advanced widget that allows you to describe yourself, and/or what your site is about.') );

// WIDGET CONTROLS
$control_ops = array('width' => 320, 'height' => 350, 'id_base' => 'about-widget');

// CREATES THE WIDGET
$this->WP_Widget('about-widget', __('About'), $widget_ops, $control_ops ); }

// HOW TO DISPLAY THE WIDGET ON THE SCREEN
function widget( $args, $instance ) { extract( $args );

// OUR VARIABLES FROM THE WIDGET SETTINGS
$title = apply_filters('widget_title', $instance['title'] );
$aboutimage = isset( $instance['aboutimage'] ) ? $instance['aboutimage'] : false;
$aboutcontent = isset( $instance['aboutcontent'] ) ? $instance['aboutcontent'] : false;
$readmore = isset( $instance['readmore'] ) ? $instance['readmore'] : false;

// BEFORE WIDGET (DEFINED BY THEMES)
echo $before_widget;

// DISPLAY THE WIDGET TITLE IF ONE WAS INPUT (BEFORE AND AFTER DEFINED BY THEMES)
if ( $title )
	echo $before_title . $title . $after_title;

// DISPLAY THE IMAGE FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $aboutimage )
	printf( __('<img src="'.$aboutimage.'" class="alignleft" alt="Thumb" />') );

// DISPLAY THE CONTENT FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $aboutcontent )
	printf( __(''.$aboutcontent.'') );

// DISPLAY THE READ MORE LINK FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $readmore )
	printf( __('<div class="read-more"><a href="'.$readmore.'">Read More</a></div>') );

// AFTER THE WIDGET (DEFINED BY THEMES)
echo $after_widget; }

// UPDATE THE WIDGET SETTINGS
function update( $new_instance, $old_instance ) { $instance = $old_instance;

// STRIP TAGS TO REMOVE HTML (IMPORTANT FOR TEXT INPUTS)
$instance['title'] = strip_tags( $new_instance['title'] );
$instance['aboutimage'] = strip_tags( $new_instance['aboutimage'] );
$instance['readmore'] = strip_tags( $new_instance['readmore'] );

// NO NEED TO STRIP TAGS FOR THIS INSTANCE
$instance['aboutcontent'] = $new_instance['aboutcontent'];
return $instance; }

// DISPLAYS THE WIDGET SETTINGS CONTROLS ON THE WIDGET PANEL
function form( $instance ) {

// SET UP SOME DEFAULT WIDGET SETTINGS
$defaults = array('title' => __('About') );
$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- WIDGET TITLE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
	<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width: 95%;" />
</p>

<!-- ABOUT IMAGE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('aboutimage'); ?>"><?php _e('Thumbnail:'); ?></label>
	<input id="<?php echo $this->get_field_id('aboutimage'); ?>" name="<?php echo $this->get_field_name('aboutimage'); ?>" value="<?php echo $instance['aboutimage']; ?>" style="width: 95%;" />
</p>

<!-- ABOUT CONTENT: TEXTAREA -->
<p>
	<label for="<?php echo $this->get_field_id('aboutcontent'); ?>"><?php _e('Content:'); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id('aboutcontent'); ?>" name="<?php echo $this->get_field_name('aboutcontent'); ?>" value="<?php echo $instance['aboutcontent']; ?>" style="height: 180px; width: 95%;"><?php echo $instance['aboutcontent']; ?></textarea>
</p>

<!-- READ MORE LINK: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('readmore'); ?>"><?php _e('Read More Link:'); ?></label>
	<input id="<?php echo $this->get_field_id('readmore'); ?>" name="<?php echo $this->get_field_name('readmore'); ?>" value="<?php echo $instance['readmore']; ?>" style="width: 95%;" />
</p>

<?php } } ?>