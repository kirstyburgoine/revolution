<?php
 
/*
 *
 *	Plugin Name: 120x60/120x90/120x240/120x600 Advertisement Widget
 *	Description: An advanced widget that allows you to display up to four 120x60/120x90/120x240/120x600 Advertisements.
 *	Author: Matt Adams
 *	Author URI: http://itsmattadams.com
 *
 */

// ADD FUNCTION TO WIDGETS_INIT THAT WILL LOAD THE WIDGET
add_action('widgets_init', 'advertise_120_load_widgets');

// REGISTER THE WIDGET
function advertise_120_load_widgets() {
	register_widget('Advertise_120_Widget');
}

// THIS CLASS HANDLES EVERYTHING THAT NEEDS TO BE HANDLED WITH THE WIDGET
class Advertise_120_Widget extends WP_Widget {

// WIDGET SETUP
function Advertise_120_Widget() {

// WIDGET SETTINGS
$widget_ops = array('classname' => 'adverts-120', 'description' => __('An advanced widget that allows you to display up to four Advertisements with the following dimensions: 120x60/120x90/120x240/120x600.') );

// WIDGET CONTROLS
$control_ops = array('width' => 320, 'height' => 350, 'id_base' => 'adverts-120-widget');

// CREATES THE WIDGET
$this->WP_Widget('adverts-120-widget', __('120x60 Advertisements'), $widget_ops, $control_ops ); }

// HOW TO DISPLAY THE WIDGET ON THE SCREEN
function widget( $args, $instance ) { extract( $args );

// OUR VARIABLES FROM THE WIDGET SETTINGS
$title = apply_filters('widget_title', $instance['title'] );
$advertimgone = $instance['advertimgone']; $adverturlone = $instance['adverturlone'];
$advertimgtwo = $instance['advertimgtwo']; $adverturltwo = $instance['adverturltwo'];
$advertimgthree = $instance['advertimgthree']; $adverturlthree = $instance['adverturlthree'];
$advertimgfour = $instance['advertimgfour']; $adverturlfour = $instance['adverturlfour'];
$advertiseurl = isset( $instance['advertiseurl'] ) ? $instance['advertiseurl'] : false;

// BEFORE WIDGET (DEFINED BY THEMES)
echo $before_widget;

// DISPLAY THE WIDGET TITLE IF ONE WAS INPUT (BEFORE AND AFTER DEFINED BY THEMES)
if ( $title )
	echo $before_title . $title . $after_title;

// DISPLAY THE ADVERTS FORM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $advertimgone )
	printf('<a href="'.$adverturlone.'"><img src="'.$advertimgone.'" alt="" /></a>');

if ( $advertimgtwo )
	printf('<a href="'.$adverturltwo.'"><img src="'.$advertimgtwo.'" alt="" /></a>');

if ( $advertimgthree )
	printf('<a href="'.$adverturlthree.'"><img src="'.$advertimgthree.'" alt="" /></a>');

if ( $advertimgfour )
	printf('<a href="'.$adverturlfour.'"><img src="'.$advertimgfour.'" alt="" /></a>');

// DISPLAY THE ADVERTISE LINK FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $advertiseurl )
	printf( __('<div class="advertise-url"><a href="'.$advertiseurl.'">Advertise Here</a></div>') );

// AFTER THE WIDGET (DEFINED BY THEMES)
echo $after_widget; }

// UPDATE THE WIDGET SETTINGS
function update( $new_instance, $old_instance ) { $instance = $old_instance;

// STRIP TAGS TO REMOVE HTML (IMPORTANT FOR TEXT INPUTS)
$instance['title'] = strip_tags( $new_instance['title'] );
$instance['advertimgone'] = strip_tags( $new_instance['advertimgone'] );
$instance['adverturlone'] = strip_tags( $new_instance['adverturlone'] );

$instance['advertimgtwo'] = strip_tags( $new_instance['advertimgtwo'] );
$instance['adverturltwo'] = strip_tags( $new_instance['adverturltwo'] );

$instance['advertimgthree'] = strip_tags( $new_instance['advertimgthree'] );
$instance['adverturlthree'] = strip_tags( $new_instance['adverturlthree'] );

$instance['advertimgfour'] = strip_tags( $new_instance['advertimgfour'] );
$instance['adverturlfour'] = strip_tags( $new_instance['adverturlfour'] );

$instance['advertiseurl'] = strip_tags( $new_instance['advertiseurl'] );
return $instance; }

// DISPLAYS THE WIDGET SETTINGS CONTROLS ON THE WIDGET PANEL
function form( $instance ) {

// SET UP SOME DEFAULT WIDGET SETTINGS
$defaults = array('title' => __('Advertisements') );
$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- WIDGET TITLE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
	<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width: 95%;" />
</p>

<!-- FIRST ADVERT IMAGE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('advertimgone'); ?>"><?php _e('First Advert - Image:'); ?></label>
	<input id="<?php echo $this->get_field_id('advertimgone'); ?>" name="<?php echo $this->get_field_name('advertimgone'); ?>" value="<?php echo $instance['advertimgone']; ?>" style="width: 95%;" />
</p>

<!-- FIRST ADVERT URL: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('adverturlone'); ?>"><?php _e('First Advert - URL:'); ?></label>
	<input id="<?php echo $this->get_field_id('adverturlone'); ?>" name="<?php echo $this->get_field_name('adverturlone'); ?>" value="<?php echo $instance['adverturlone']; ?>" style="width: 95%;" />
</p>

<!-- SECOND ADVERT IMAGE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('advertimgtwo'); ?>"><?php _e('Second Advert - Image:'); ?></label>
	<input id="<?php echo $this->get_field_id('advertimgtwo'); ?>" name="<?php echo $this->get_field_name('advertimgtwo'); ?>" value="<?php echo $instance['advertimgtwo']; ?>" style="width: 95%;" />
</p>

<!-- SECOND ADVERT URL: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('adverturltwo'); ?>"><?php _e('Second Advert - URL:'); ?></label>
	<input id="<?php echo $this->get_field_id('adverturltwo'); ?>" name="<?php echo $this->get_field_name('adverturltwo'); ?>" value="<?php echo $instance['adverturltwo']; ?>" style="width: 95%;" />
</p>

<!-- THIRD ADVERT IMAGE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('advertimgthree'); ?>"><?php _e('Third Advert - Image:'); ?></label>
	<input id="<?php echo $this->get_field_id('advertimgthree'); ?>" name="<?php echo $this->get_field_name('advertimgthree'); ?>" value="<?php echo $instance['advertimgthree']; ?>" style="width: 95%;" />
</p>

<!-- THIRD ADVERT URL: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('adverturlthree'); ?>"><?php _e('Third Advert - URL:'); ?></label>
	<input id="<?php echo $this->get_field_id('adverturlthree'); ?>" name="<?php echo $this->get_field_name('adverturlthree'); ?>" value="<?php echo $instance['adverturlthree']; ?>" style="width: 95%;" />
</p>

<!-- FOURTH ADVERT IMAGE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('advertimgfour'); ?>"><?php _e('Fourth Advert - Image:'); ?></label>
	<input id="<?php echo $this->get_field_id('advertimgfour'); ?>" name="<?php echo $this->get_field_name('advertimgfour'); ?>" value="<?php echo $instance['advertimgfour']; ?>" style="width: 95%;" />
</p>

<!-- FOURTH ADVERT URL: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('adverturlfour'); ?>"><?php _e('Fourth Advert - URL:'); ?></label>
	<input id="<?php echo $this->get_field_id('adverturlfour'); ?>" name="<?php echo $this->get_field_name('adverturlfour'); ?>" value="<?php echo $instance['adverturlfour']; ?>" style="width: 95%;" />
</p>

<!-- ADVERTISE HERE URL: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('advertiseurl'); ?>"><?php _e('Advertise Here URL:'); ?></label>
	<input id="<?php echo $this->get_field_id('advertiseurl'); ?>" name="<?php echo $this->get_field_name('advertiseurl'); ?>" value="<?php echo $instance['advertiseurl']; ?>" style="width: 95%;" />
</p>

<?php } } ?>