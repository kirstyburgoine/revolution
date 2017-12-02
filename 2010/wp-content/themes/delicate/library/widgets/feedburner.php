<?php
 
/*
 *
 *	Plugin Name: Feedburner Widget
 *	Description: An advanced widget that gives your readers the ability to get updates by E-Mail and subscribe to your Feedburner RSS feed.
 *	Author: Matt Adams
 *	Author URI: http://itsmattadams.com
 *
 */

// ADD FUNCTION TO WIDGETS_INIT THAT WILL LOAD THE WIDGET
add_action('widgets_init', 'feedburner_load_widgets');

// REGISTER THE WIDGET
function feedburner_load_widgets() {
	register_widget('Feedburner_Widget');
}

// THIS CLASS HANDLES EVERYTHING THAT NEEDS TO BE HANDLED BY THE WIDGET
class Feedburner_Widget extends WP_Widget {

// WIDGET SETUP
function Feedburner_Widget() {

// WIDGET SETTINGS
$widget_ops = array('classname' => 'feedburner', 'description' => __('An advanced widget that gives your readers the ability to get updates by E-Mail and subscribe to your Feedburner RSS feed.') );

// WIDGET CONTROLS
$control_ops = array('width' => 200, 'height' => 350, 'id_base' => 'feedburner-widget');

// CREATES THE WIDGET
$this->WP_Widget('feedburner-widget', __('Feedburner'), $widget_ops, $control_ops ); }

// HOW TO DISPLAY THE WIDGET ON THE SCREEN
function widget( $args, $instance ) { extract( $args );

// OUR VARIABLES FROM THE WIDGET SETTINGS
$title = apply_filters('widget_title', $instance['title'] );
$username = $instance['username'];
$amount = isset( $instance['amount'] ) ? $instance['amount'] : false;

// BEFORE WIDGET (DEFINED BY THEMES)
echo $before_widget;

// DISPLAY THE WIDGET TITLE IF ONE WAS INPUT (BEFORE AND AFTER DEFINED BY THEMES)
if ( $title )
	echo $before_title . $title . $after_title;

// DISPLAY THE USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $username )
	printf('<form action="http://feedburner.google.com/fb/a/mailverify?uri='.$username.'" method="post"><p><input class="email" type="text" name="email" value="Enter your e-mail address" onfocus="if (this.value == \'Enter your e-mail address\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'Enter your e-mail address\';}" /></p>
<p><input class="subscribe" type="submit" value="Subscribe" /></p></form>
<div class="rss-link"><a href="http://feeds2.feedburner.com/'.$username.'">Subscribe by RSS</a></div>');

// AFTER THE WIDGET (DEFINED BY THEMES)
echo $after_widget; }

// UPDATE THE WIDGET SETTINGS
function update( $new_instance, $old_instance ) { $instance = $old_instance;

// STRIP TAGS TO REMOVE HTML (IMPORTANT FOR TEXT INPUTS)
$instance['title'] = strip_tags( $new_instance['title'] );
$instance['username'] = strip_tags( $new_instance['username'] );

// NO NEED TO STRIP TAGS FOR THIS INSTANCE
$instance['amount'] = $new_instance['amount'];
return $instance; }

// DISPLAYS THE WIDGET SETTINGS CONTROLS ON THE WIDGET PANEL
function form( $instance ) {

// SET UP SOME DEFAULT WIDGET SETTINGS
$defaults = array('title' => __('Feedburner Subscription'), 'username' => __('') );
$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- WIDGET TITLE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
	<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width: 95%;" />
</p>

<!-- FEEDBURNER USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php echo $instance['username']; ?>" style="width: 95%;" />
</p>

<?php } } ?>