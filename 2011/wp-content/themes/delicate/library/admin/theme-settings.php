<?php

/* Theme Settings class */
class Theme_Settings {

	/* General Settings */
	var $color_schemes, $custom_css;

	/* Header Settings */
	var $menu_links, $menu_exclusion, $post_feed, $email_feed;

	/* Post Settings */
	var $blog_category, $post_count, $portfolio_category, $slider_count;

	/* Page Settings */
	var $author_hcard, $contact_email_address;

	/* Footer Settings */
	var $footer_content, $tracking_code;

	/* Default Options */
	function default_options() {

		/* General Settings */
		$this->color_schemes = 'tan';
		$this->custom_css;

		/* Header Settings */
		$this->menu_links;
		$this->menu_exclusion;
		$this->post_feed;
		$this->email_feed;

		/* Post Settings */
		$this->blog_page_title = 'My Blog';
		$this->blog_category;
		$this->post_count = '6';
		$this->portfolio_category;
		$this->portfolio_page_title = 'My Portfolio';
		$this->slider_count = '6';

		/* Page Settings */
		$this->author_hcard;
		$this->contact_email_address;

		/* Footer Settings */
		$this->footer_content = '[blog-title] [copyright] [the-year] &#150; [wp-link]. [scroll-to-top]';
		$this->tracking_code;

	}

	/* Save Options */
	function save_options() { 

		/* General Settings */
		$this->color_schemes = $_POST['color_schemes'];
		$this->custom_css = $_POST['custom_css'];

		/* Header Settings */
		$this->menu_links = $_POST['menu_links'];
		$this->menu_exclusion = $_POST['menu_exclusion'];
		$this->post_feed = $_POST['post_feed'];
		$this->email_feed = $_POST['email_feed'];

		/* Post Settings */
		$this->blog_page_title = $_POST['blog_page_title'];
		$this->blog_category = $_POST['blog_category'];
		$this->post_count = $_POST['post_count'];
		$this->portfolio_page_title = $_POST['portfolio_page_title'];
		$this->portfolio_category = $_POST['portfolio_category'];
		$this->slider_count = $_POST['slider_count'];

		/* Page Settings */
		$this->author_hcard = $_POST['author_hcard'];
		$this->contact_email_address = $_POST['contact_email_address'];

		/* Footer Settings */
		$this->footer_content = stripslashes( $_POST['footer_content'] );
		$this->tracking_code = stripslashes( $_POST['tracking_code'] );

	}

	/* Get Options */
	function get_options() {
		/* The prefix of _options should vary by theme to prevent conflicts with the database. */
		$saved_options = unserialize( get_option('delicate_options') );
			if ( !empty($saved_options) && is_object($saved_options) ) {
				foreach ($saved_options as $name => $value) {
					$this->$name = $value;
			}
		}
	}
}

	/* Loads the options from the database and sets them to the options class instance. */
	function flush_theme_options() { global $theme_options;
		$theme_options = new Theme_Settings();
		$theme_options->get_options();
		/* The prefix of _options should vary by theme to prevent conflicts with the database. */
		if ( !get_option('delicate_options') ) $theme_options->default_options();
	}

	/* Saves the current options class instance to the database. */
	function update_theme_options() { global $theme_options;
		/* The prefix of _options should vary by theme to prevent conflicts with the database. */
		update_option( 'delicate_options', maybe_serialize($theme_options) );
	}

	/* Updates the option based on the ID and value given. */
	function update_theme_option($name, $value, $commit = true) { global $theme_options;
		$theme_options->get_options();
		$theme_options->$name = $value;

		if ($commit) {
			update_theme_options();
			flush_theme_options();
		}
	}

	/* Retrieves the option based on the ID given. */
	function get_setting($name) { global $theme_options;
		if ( !is_object($theme_options) )
			flush_theme_options();
		return $theme_options->$name;
	}

?>