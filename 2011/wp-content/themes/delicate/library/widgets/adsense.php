<?php
 
/*
 *
 *	Plugin Name: Google Adsense Widget
 *	Description: An advanced widget that allows you to easily add various types of Adsense ads to your blog.
 *	Author: Matt Adams
 *	Author URI: http://itsmattadams.com
 *
 */

// ADD FUNCTION TO WIDGETS_INIT THAT WILL LOAD THE WIDGET
add_action('widgets_init', 'adsense_load_widgets');

// REGISTER THE WIDGET
function adsense_load_widgets() {
	register_widget('Adsense_Widget');
}

// THIS CLASS HANDLES EVERYTHING THAT NEEDS TO BE HANDLED BY THE WIDGET
class Adsense_Widget extends WP_Widget {

// WIDGET SETUP
function Adsense_Widget() {

// WIDGET SETTINGS
$widget_ops = array('classname' => 'adsense', 'description' => __('An advanced widget that allows you to easily add various types of Adsense ads to your blog.') );

// WIDGET CONTROLS
$control_ops = array('width' => 200, 'height' => 350, 'id_base' => 'adsense-widget');

// CREATES THE WIDGET
$this->WP_Widget('adsense-widget', __('Google Adsense'), $widget_ops, $control_ops ); }

// HOW TO DISPLAY THE WIDGET ON THE SCREEN
function widget( $args, $instance ) { extract( $args );

// OUR VARIABLES FROM THE WIDGET SETTINGS
$adclient = $instance['adclient'];
$adslot = $instance['adslot'];
$adwidth = $instance['adwidth'];
$adheight = $instance['adheight'];

// BEFORE WIDGET (DEFINED BY THEMES)
echo $before_widget;

// DISPLAY THE ADSENSE DETAILS FROM THE WIDGET SETTINGS IF THEY WERE INPUT
if ( $adclient )
	printf('<script type="text/javascript"><!--
google_ad_client = "'.$adclient.'";
google_ad_slot = "'.$adslot.'";
google_ad_width = '.$adwidth.';
google_ad_height = '.$adheight.';
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>');

// AFTER THE WIDGET (DEFINED BY THEMES)
echo $after_widget; }

// UPDATE THE WIDGET SETTINGS
function update( $new_instance, $old_instance ) { $instance = $old_instance;

// STRIP TAGS TO REMOVE HTML (IMPORTANT FOR TEXT INPUTS)
$instance['adclient'] = strip_tags( $new_instance['adclient'] );
$instance['adslot'] = strip_tags( $new_instance['adslot'] );
$instance['adwidth'] = strip_tags( $new_instance['adwidth'] );
$instance['adheight'] = strip_tags( $new_instance['adheight'] );
return $instance; }

// DISPLAYS THE WIDGET SETTINGS CONTROLS ON THE WIDGET PANEL
function form( $instance ) { ?>

<!-- AD CLIENT: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('adclient'); ?>"><?php _e('Ad Client ID:'); ?></label>
	<input id="<?php echo $this->get_field_id('adclient'); ?>" name="<?php echo $this->get_field_name('adclient'); ?>" value="<?php echo $instance['adclient']; ?>" style="width: 95%;" />
</p>

<!-- AD SLOT: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('adslot'); ?>"><?php _e('Ad Slot ID:'); ?></label>
	<input id="<?php echo $this->get_field_id('adslot'); ?>" name="<?php echo $this->get_field_name('adslot'); ?>" value="<?php echo $instance['adslot']; ?>" style="width: 95%;" />
</p>

<!-- AD WIDTH: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('adwidth'); ?>"><?php _e('Width:'); ?></label>
	<input id="<?php echo $this->get_field_id('adwidth'); ?>" name="<?php echo $this->get_field_name('adwidth'); ?>" value="<?php echo $instance['adwidth']; ?>" style="width: 95%;" />
</p>

<!-- AD HEIGHT: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('adheight'); ?>"><?php _e('Height:'); ?></label>
	<input id="<?php echo $this->get_field_id('adheight'); ?>" name="<?php echo $this->get_field_name('adheight'); ?>" value="<?php echo $instance['adheight']; ?>" style="width: 95%;" />
</p>

<?php } } ?>