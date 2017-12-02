<?php

// CREATE POST META BOX
add_action('admin_menu', 'delicate_create_meta_box');

// SAVE POST META DATA
add_action('save_post', 'delicate_save_meta_data');

function delicate_create_meta_box() { global $theme_name;
	add_meta_box('post-meta-boxes', __('Post Settings'), 'post_meta_boxes', 'post', 'normal', 'high');
	// add_meta_box('page-meta-boxes', __('Page Settings'), 'page_meta_boxes', 'page', 'normal', 'high');
}

function delicate_post_meta_boxes() {
	$meta_boxes = array (
		'portfolio' => array('name' => 'Portfolio', 'title' => __('Project Image:'), 'type' => 'text'),
		'lightbox' => array('name' => 'Lightbox', 'title' => __('Lightbox Image:'), 'type' => 'text'),
		'date' => array('name' => 'Date', 'title' => __('Project Date:'), 'type' => 'text'),
		'price' => array('name' => 'Price', 'title' => __('Project Price:'), 'type' => 'text'),
		'purchase' => array('name' => 'Purchase', 'title' => __('Purchase URL:'), 'type' => 'text'),
		'preview' => array('name' => 'Preview', 'title' => __('Preview URL:'), 'type' => 'text'),
		'project' => array('name' => 'Project', 'title' => __('Project Type:'), 'type' => 'text'),
		'thumbnail' => array('name' => 'Thumbnail', 'title' => __('Thumbnail:'), 'type' => 'text'),
		'youtube' => array('name' => 'YouTube', 'title' => __('YouTube Video ID:'), 'type' => 'text'),
		'vimeo' => array('name' => 'Vimeo', 'title' => __('Vimeo Video ID:'), 'type' => 'text')
	);
	return apply_filters('delicate_post_meta_boxes', $meta_boxes);
}

// function delicate_page_meta_boxes() {
	// $meta_boxes = array ();
	// return apply_filters( 'delicate_page_meta_boxes', $meta_boxes );
// }

function post_meta_boxes() { global $post; $meta_boxes = delicate_post_meta_boxes(); ?>

<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) : $value = get_post_meta( $post->ID, $meta['name'], true );
		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
	endforeach; ?>
</table><!-- END .FORM-TABLE -->

<?php }

function page_meta_boxes() { global $post; $meta_boxes = delicate_page_meta_boxes(); ?>

<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) : $value = get_post_meta( $post->ID, $meta['name'], true );
		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
	endforeach; ?>
</table><!-- END .FORM-TABLE -->

<?php } function get_meta_text_input( $args = array(), $value = false ) { extract( $args ); ?>

<tr>
	<th style="width: 15%;">
		<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
	</th>
	<td>
		<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo wp_specialchars( $value, 1 ); ?>" size="30" tabindex="30" style="float: right; width: 97%;" />
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</td>
</tr>

<?php } 

function get_meta_select( $args = array(), $value = false ) { extract( $args ); ?>

<tr>
	<th style="width: 15%;">
		<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
	</th>
	<td>
		<select style="float: right; width: 97%;" name="<?php echo $name; ?>" id="<?php echo $name; ?>">
		<?php foreach ( $options as $option ) : ?>
			<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
				<?php echo $option; ?>
			</option>
		<?php endforeach; ?>
		</select>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</td>
</tr>

<?php }

function get_meta_textarea( $args = array(), $value = false ) { extract( $args ); ?>

<tr>
	<th style="width: 15%;">
		<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
	</th>
	<td>
		<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="float: right; width: 97%;"><?php echo wp_specialchars( $value, 1 ); ?></textarea>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</td>
</tr>

<?php }

function delicate_save_meta_data( $post_id ) { global $post;
	$meta_boxes = array_merge( delicate_post_meta_boxes() );

	// if ( 'page' == $_POST['post_type'] )
		// $meta_boxes = array_merge( delicate_page_meta_boxes() );
	// else
		$meta_boxes = array_merge( delicate_post_meta_boxes() );

foreach ( $meta_boxes as $meta_box ) :

if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
	return $post_id;

if ('post' == $_POST['post_type'] && !current_user_can('edit_post', $post_id) )
	return $post_id;

$data = stripslashes( $_POST[$meta_box['name']] );

if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
	add_post_meta( $post_id, $meta_box['name'], $data, true );

elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
	update_post_meta( $post_id, $meta_box['name'], $data );

elseif ( $data == '' )
	delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );

endforeach; } ?>