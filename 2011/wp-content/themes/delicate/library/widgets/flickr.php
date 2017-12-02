<?php
 
/*
 *
 *	Plugin Name: Flickr Widget
 *	Description: An advanced widget that allows you to display your latest Flickr photos, and a link to your photostream.
 *	Author: Matt Adams
 *	Author URI: http://itsmattadams.com
 *
 */

// ADD FUNCTION TO WIDGETS_INIT THAT WILL LOAD THE WIDGET
add_action('widgets_init', 'flickr_load_widgets');

// REGISTER THE WIDGET
function flickr_load_widgets() {
	register_widget('Flickr_Widget');
}

// THIS CLASS HANDLES EVERYTHING THAT NEEDS TO BE HANDLED BY THE WIDGET
class Flickr_Widget extends WP_Widget {

// WIDGET SETUP
function Flickr_Widget() {

// WIDGET SETTINGS
$widget_ops = array('classname' => 'flickr', 'description' => __('An advanced widget that allows you to display your latest Flickr photos, and a link to your photostream.') );

// WIDGET CONTROLS
$control_ops = array('width' => 200, 'height' => 350, 'id_base' => 'flickr-widget');

// CREATES THE WIDGET
$this->WP_Widget('flickr-widget', __('Flickr Photos'), $widget_ops, $control_ops ); }

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
	printf( __('<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$amount.'&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user='.$username.'"></script> <div class="photostream"><a href="http://www.flickr.com/photos/'.$username.'/" title="View Photostream">View Photostream</a></div>') );

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
$defaults = array('title' => __('Flickr Photos'), 'username' => __(''), 'amount' => 6 );
$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- WIDGET TITLE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
	<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width: 95%;" />
</p>

<!-- FLICKR ID: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Flickr ID:'); ?></label>
	<input id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php echo $instance['username']; ?>" style="width: 95%;" />
</p>

<!-- NUMBER OF PHOTOS: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('amount'); ?>"><?php _e('Amount:'); ?></label>
	<input id="<?php echo $this->get_field_id('amount'); ?>" name="<?php echo $this->get_field_name('amount'); ?>" value="<?php echo $instance['amount']; ?>" style="width: 95%;" />
</p>

<p>
	Find your Flickr ID with <a href="http://idgettr.com/">idGettr</a>.
</p>

<?php } } ?>