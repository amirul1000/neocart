<?php

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'product',array(
										 'labels' => array(
														  'name' => __( 'Products' ),
														  'singular_name' => __( 'Product' )
														),
										 'public' => true,
										 'has_archive' => true,
										 'menu_position' => 20,
										 'supports' => array( 'title', 'editor','thumbnail' ),
										 'capability_type' => 'post',
										 'register_meta_box_cb' => 'add_events_metaboxes'
								     )
	  );
}


// hook into the init action and call create_product_cat when it fires
add_action( 'init', 'create_taxonomy', 0 );


function create_taxonomy() {
	register_taxonomy(
		'product_cat',
		array('product'),
		array(
			'label' => __( 'Category' ),
			'rewrite' => array( 'slug' => 'product_cat' ),
			'hierarchical' => true,
		)
	);
}
	
add_action( 'add_meta_boxes', 'add_events_metaboxes' );
	
	// Add the Events Meta Boxes

function add_events_metaboxes() {
	add_meta_box('wpt_events_general', 'General Info', 'wpt_events_general', 'product', 'side', 'default');
	//add_meta_box('wpt_events_general', 'General Info', 'wpt_events_general', 'product', 'normal', 'high');
}
// Add the Events Meta Boxes

// The Event Location Metabox

function wpt_events_general() {
	global $post;
	
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	// Get the location data if its already been entered
	$sku = get_post_meta($post->ID, 'sku', true);
	
	// Echo out the field
	echo 'SKU<input type="text" name="sku" value="' . $sku  . '" class="widefat" />';
	
	
	$color = get_post_meta($post->ID, 'color', true);
	
	// Echo out the field
	echo 'Color<input type="text" name="color" value="' . $color  . '" class="widefat" />';
	
	
	$size = get_post_meta($post->ID, 'size', true);
	
	// Echo out the field
	echo 'Size<input type="text" name="size" value="' . $size  . '" class="widefat" />';

}
// Save the Metabox Data

function wpt_save_events_meta($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	$events_meta['sku'] = $_POST['sku'];
	$events_meta['color'] = $_POST['color'];
	$events_meta['size'] = $_POST['size'];
	// Add values of $events_meta as custom fields
	
	foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}

add_action('save_post', 'wpt_save_events_meta', 1, 2); // save the custom fields



add_filter( 'manage_edit-product_columns', 'my_edit_product_columns' ) ;

function my_edit_product_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'id' => __('ID'),
		'title' => __( 'title' ),
		'images' => __('Images'),
		'date' => __( 'Date' ),
		'author' => __( 'author' ),
		'sku' => __( 'SKU' ),
		'color' => __( 'Color' ),
		'size' => __( 'Size' )
	);

	return $columns;
}




    // Add to admin_init function
add_action('manage_product_posts_custom_column', 'manage_product_columns', 10, 2);
 
function manage_product_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {
    case 'id':
        echo $id;
            break;
 
    case 'images':
        // Get number of images in gallery
        $num_images = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = %d;", $id));
        echo $num_images; 
        break;
	 case 'sku':
        	  $custom_fields = get_post_custom($id);
			  $my_custom_field = $custom_fields[$column_name];
			  
			  if( $my_custom_field)
			  {
				  foreach ( $my_custom_field as $key => $value ) {
					echo $value;
				  }
			  }
        break;	
		
		 case 'color':
        	  $custom_fields = get_post_custom($id);
			  $my_custom_field = $custom_fields[$column_name];
			  
			  if( $my_custom_field)
			  {
				  foreach ( $my_custom_field as $key => $value ) {
					echo $value;
				  }
			  }
        break;	
		
		 case 'size':
        	  $custom_fields = get_post_custom($id);
			  $my_custom_field = $custom_fields[$column_name];
			  
			  if( $my_custom_field)
			  {
				  foreach ( $my_custom_field as $key => $value ) {
					echo $value;
				  }
			  }
        break;	
    default: 
        break;
    } // end switch
}   



//////////////////////////////////////////


/*function admin_toolbar() {
	global $wp_admin_bar;


    $wp_admin_bar->add_node(array(
					'id' => 'category',
					'title' => __('category', 'category'),
					'parent' => false,
					'href' => admin_url('edit-tags.php?taxonomy=product_cat&post_type=product'),
				));


	$wp_admin_bar->add_node(array(
					'id' => 'products',
					'title' => __('Products', 'Products'),
					'parent' => 'category',
					'href' => admin_url('edit.php?post_type=product'),
				));


}

add_action('admin_bar_menu', 'admin_toolbar', 35);
*/

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */

?>