<?php
 
/*
 *
 *	Plugin Name: Social Profiles
 *	Description: An advanced widget that allows you to display links to your social profiles.
 *	Author: Matt Adams
 *	Author URI: http://itsmattadams.com
 *
 */

// ADD FUNCTION TO WIDGETS_INIT THAT WILL LOAD THE WIDGET
add_action('widgets_init', 'profiles_load_widgets');

// REGISTER THE WIDGET
function profiles_load_widgets() {
	register_widget('Profiles_Widget');
}

// THIS CLASS HANDLES EVERYTHING THAT NEEDS TO BE HANDLED BY THE WIDGET
class Profiles_Widget extends WP_Widget {

// WIDGET SETUP
function Profiles_Widget() {

// WIDGET SETTINGS
$widget_ops = array('classname' => 'profiles', 'description' => __('An advanced widget that allows you to display links to your social profiles.') );

// WIDGET CONTROLS
$control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'profiles-widget');

// CREATES THE WIDGET
$this->WP_Widget('profiles-widget', __('Social Profiles'), $widget_ops, $control_ops ); }

// HOW TO DISPLAY THE WIDGET ON THE SCREEN
function widget( $args, $instance ) { extract( $args );

// OUR VARIABLES FROM THE WIDGET SETTINGS
$title = apply_filters('widget_title', $instance['title'] );
$audiojungle_username = $instance['audiojungle_username'];
$delicious_username = $instance['delicious_username'];
$deviantart_username = $instance['deviantart_username'];
$digg_username = $instance['digg_username'];
$facebook_username = $instance['facebook_username'];
$flashden_username = $instance['flashden_username'];
$flickr_username = $instance['flickr_username'];
$graphicriver_username = $instance['graphicriver_username'];
$lastfm_username = $instance['lastfm_username'];
$linkedin_username = $instance['linkedin_username'];
$myspace_username = $instance['myspace_username'];
$themeforest_username = $instance['themeforest_username'];
$twitter_username = $instance['twitter_username'];
$videohive_username = $instance['videohive_username'];
$vimeo_username = $instance['vimeo_username'];
$virb_username = $instance['virb_username'];
$youtube_username = $instance['youtube_username'];

// BEFORE WIDGET (DEFINED BY THEMES)
echo $before_widget;

// DISPLAY THE WIDGET TITLE IF ONE WAS INPUT (BEFORE AND AFTER DEFINED BY THEMES)
if ( $title )
	echo $before_title . $title . $after_title;

// DISPLAY THE AUDIOJUNGLE USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $audiojungle_username )
	printf( __('<div class="audiojungle-link"><a href="http://audiojungle.net/user/'.$audiojungle_username.'">AudioJungle Profile</a></div>'));

// DISPLAY THE DELICIOUS USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $delicious_username )
	printf( __('<div class="delicious-link"><a href="http://delicious.com/'.$delicious_username.'">Delicious Profile</a></div>'));

// DISPLAY THE DEVIANTART USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $deviantart_username )
	printf( __('<div class="deviantart-link"><a href="http://'.$deviantart_username.'.deviantart.com">deviantART Profile</a></div>'));

// DISPLAY THE DIGG USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $digg_username )
	printf( __('<div class="digg-link"><a href="http://digg.com/users/'.$digg_username.'">Digg Profile</a></div>'));

// DISPLAY THE FACEBOOK USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $facebook_username )
	printf( __('<div class="facebook-link"><a href="http://www.facebook.com/'.$facebook_username.'">Facebook Profile</a></div>'));

// DISPLAY THE FLASHDEN USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $flashden_username )
	printf( __('<div class="flashden-link"><a href="http://flashden.net/user/'.$flashden_username.'">FlashDen Profile</a></div>'));

// DISPLAY THE FLICKR USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $flickr_username )
	printf( __('<div class="flickr-link"><a href="http://www.flickr.com/photos/'.$flickr_username.'">Flickr Profile</a></div>'));

// DISPLAY THE GRAPHICRIVER USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $graphicriver_username )
	printf( __('<div class="graphicriver-link"><a href="http://graphicriver.net/user/'.$graphicriver_username.'">GraphicRiver Profile</a></div>'));

// DISPLAY THE LASTFM USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $lastfm_username )
	printf( __('<div class="lastfm-link"><a href="http://www.last.fm/user/'.$lastfm_username.'">Last.fm Profile</a></div>'));

// DISPLAY THE LINKEDIN USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $linkedin_username )
	printf( __('<div class="linkedin-link"><a href="http://www.linkedin.com/in/'.$linkedin_username.'">LinkedIn Profile</a></div>'));

// DISPLAY THE MYSPACE USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $myspace_username )
	printf( __('<div class="myspace-link"><a href="http://www.myspace.com/'.$myspace_username.'">MySpace Profile</a></div>'));

// DISPLAY THE THEMEFOREST USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $themeforest_username )
	printf( __('<div class="themeforest-link"><a href="http://themeforest.net/user/'.$themeforest_username.'">ThemeForest Profile</a></div>'));

// DISPLAY THE TWITTER USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $twitter_username )
	printf( __('<div class="twitter-link"><a href="http://twitter.com/'.$twitter_username.'">Twitter Profile</a></div>'));

// DISPLAY THE VIDEOHIVE USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $videohive_username )
	printf( __('<div class="videohive-link"><a href="http://videohive.net/user/'.$videohive_username.'">VideoHive Profile</a></div>'));

// DISPLAY THE VIMEO USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $vimeo_username )
	printf( __('<div class="vimeo-link"><a href="http://vimeo.com/'.$vimeo_username.'">Vimeo Profile</a></div>'));

// DISPLAY THE VIRB USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $virb_username )
	printf( __('<div class="virb-link"><a href="http://virb.com/'.$virb_username.'">Virb Profile</a></div>'));

// DISPLAY THE YOUTUBE USERNAME FROM THE WIDGET SETTINGS IF ONE WAS INPUT
if ( $youtube_username )
	printf( __('<div class="youtube-link"><a href="http://www.youtube.com/user/'.$youtube_username.'">YouTube Profile</a></div>'));

// AFTER THE WIDGET (DEFINED BY THEMES)
echo $after_widget; }

// UPDATE THE WIDGET SETTINGS
function update( $new_instance, $old_instance ) { $instance = $old_instance;

// STRIP TAGS TO REMOVE HTML (IMPORTANT FOR TEXT INPUTS)
$instance['title'] = strip_tags( $new_instance['title'] );
$instance['audiojungle_username'] = strip_tags( $new_instance['audiojungle_username'] );
$instance['delicious_username'] = strip_tags( $new_instance['delicious_username'] );
$instance['deviantart_username'] = strip_tags( $new_instance['deviantart_username'] );
$instance['digg_username'] = strip_tags( $new_instance['digg_username'] );
$instance['facebook_username'] = strip_tags( $new_instance['facebook_username'] );
$instance['flashden_username'] = strip_tags( $new_instance['flashden_username'] );
$instance['flickr_username'] = strip_tags( $new_instance['flickr_username'] );
$instance['graphicriver_username'] = strip_tags( $new_instance['graphicriver_username'] );
$instance['lastfm_username'] = strip_tags( $new_instance['lastfm_username'] );
$instance['linkedin_username'] = strip_tags( $new_instance['linkedin_username'] );
$instance['myspace_username'] = strip_tags( $new_instance['myspace_username'] );
$instance['themeforest_username'] = strip_tags( $new_instance['themeforest_username'] );
$instance['twitter_username'] = strip_tags( $new_instance['twitter_username'] );
$instance['videohive_username'] = strip_tags( $new_instance['videohive_username'] );
$instance['vimeo_username'] = strip_tags( $new_instance['vimeo_username'] );
$instance['virb_username'] = strip_tags( $new_instance['virb_username'] );
$instance['youtube_username'] = strip_tags( $new_instance['youtube_username'] );
return $instance; }

// DISPLAYS THE WIDGET SETTINGS CONTROLS ON THE WIDGET PANEL
function form( $instance ) {

// SET UP SOME DEFAULT WIDGET SETTINGS
$defaults = array('title' => __('Social Profiles'));
$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- WIDGET TITLE: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
	<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width: 95%;" />
</p>

<!-- AUDIOJUNGLE USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('audiojungle_username'); ?>"><?php _e('AudioJungle Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('audiojungle_username'); ?>" name="<?php echo $this->get_field_name('audiojungle_username'); ?>" value="<?php echo $instance['audiojungle_username']; ?>" style="width: 95%;" />
</p>

<!-- DELICIOUS USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('delicious_username'); ?>"><?php _e('Delicious Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('delicious_username'); ?>" name="<?php echo $this->get_field_name('delicious_username'); ?>" value="<?php echo $instance['delicious_username']; ?>" style="width: 95%;" />
</p>

<!-- DEVIANTART USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('deviantart_username'); ?>"><?php _e('deviantART Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('deviantart_username'); ?>" name="<?php echo $this->get_field_name('deviantart_username'); ?>" value="<?php echo $instance['deviantart_username']; ?>" style="width: 95%;" />
</p>

<!-- DIGG USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('digg_username'); ?>"><?php _e('Digg Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('digg_username'); ?>" name="<?php echo $this->get_field_name('digg_username'); ?>" value="<?php echo $instance['digg_username']; ?>" style="width: 95%;" />
</p>

<!-- FACEBOOK USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('facebook_username'); ?>"><?php _e('Facebook Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('facebook_username'); ?>" name="<?php echo $this->get_field_name('facebook_username'); ?>" value="<?php echo $instance['facebook_username']; ?>" style="width: 95%;" />
</p>

<!-- FLASHDEN USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('flashden_username'); ?>"><?php _e('FlashDen Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('flashden_username'); ?>" name="<?php echo $this->get_field_name('flashden_username'); ?>" value="<?php echo $instance['flashden_username']; ?>" style="width: 95%;" />
</p>

<!-- FLICKR USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('flickr_username'); ?>"><?php _e('Flickr Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('flickr_username'); ?>" name="<?php echo $this->get_field_name('flickr_username'); ?>" value="<?php echo $instance['flickr_username']; ?>" style="width: 95%;" />
</p>

<!-- GRAPHICRIVER USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('graphicriver_username'); ?>"><?php _e('GraphicRiver Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('graphicriver_username'); ?>" name="<?php echo $this->get_field_name('graphicriver_username'); ?>" value="<?php echo $instance['graphicriver_username']; ?>" style="width: 95%;" />
</p>

<!-- LASTFM USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('lastfm_username'); ?>"><?php _e('Last.fm Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('lastfm_username'); ?>" name="<?php echo $this->get_field_name('lastfm_username'); ?>" value="<?php echo $instance['lastfm_username']; ?>" style="width: 95%;" />
</p>

<!-- LINKEDIN USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('linkedin_username'); ?>"><?php _e('LinkedIn Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('linkedin_username'); ?>" name="<?php echo $this->get_field_name('linkedin_username'); ?>" value="<?php echo $instance['linkedin_username']; ?>" style="width: 95%;" />
</p>

<!-- MYSPACE USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('myspace_username'); ?>"><?php _e('MySpace Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('myspace_username'); ?>" name="<?php echo $this->get_field_name('myspace_username'); ?>" value="<?php echo $instance['myspace_username']; ?>" style="width: 95%;" />
</p>

<!-- THEMEFOREST USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('themeforest_username'); ?>"><?php _e('ThemeForest Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('themeforest_username'); ?>" name="<?php echo $this->get_field_name('themeforest_username'); ?>" value="<?php echo $instance['themeforest_username']; ?>" style="width: 95%;" />
</p>

<!-- TWITTER USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('twitter_username'); ?>"><?php _e('Twitter Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('twitter_username'); ?>" name="<?php echo $this->get_field_name('twitter_username'); ?>" value="<?php echo $instance['twitter_username']; ?>" style="width: 95%;" />
</p>

<!-- VIDEOHIVE USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('videohive_username'); ?>"><?php _e('VideoHive Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('videohive_username'); ?>" name="<?php echo $this->get_field_name('videohive_username'); ?>" value="<?php echo $instance['videohive_username']; ?>" style="width: 95%;" />
</p>

<!-- VIMEO USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('vimeo_username'); ?>"><?php _e('Vimeo Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('vimeo_username'); ?>" name="<?php echo $this->get_field_name('vimeo_username'); ?>" value="<?php echo $instance['vimeo_username']; ?>" style="width: 95%;" />
</p>

<!-- VIRB USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('virb_username'); ?>"><?php _e('Virb Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('virb_username'); ?>" name="<?php echo $this->get_field_name('virb_username'); ?>" value="<?php echo $instance['virb_username']; ?>" style="width: 95%;" />
</p>

<!-- YOUTUBE USERNAME: TEXT INPUT -->
<p>
	<label for="<?php echo $this->get_field_id('youtube_username'); ?>"><?php _e('YouTube Username:'); ?></label>
	<input id="<?php echo $this->get_field_id('youtube_username'); ?>" name="<?php echo $this->get_field_name('youtube_username'); ?>" value="<?php echo $instance['youtube_username']; ?>" style="width: 95%;" />
</p>

<?php } } ?>