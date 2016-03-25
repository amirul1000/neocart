<?php
	class Neo_Cart_Product{
		public function __construct() {
					add_action( 'init', array( $this, 'create_post_type' ));
					add_action( 'add_meta_boxes',  array( $this,'add_product_metaboxes') );
					add_action('save_post', array( $this,'wpt_save_product_meta'), 1, 2); // save the custom fields
					add_filter( 'manage_edit-product_columns', array( $this,'my_edit_product_columns') ) ;
					add_action('manage_product_posts_custom_column',  array( $this,'manage_product_columns'), 10, 2);
				}
		function create_post_type() {
		  register_post_type( 'product',array(
								 'labels' => array(
													'name'               => __( 'Products' ),
													'singular_name'      => __( 'Product' ),
													'add_new'            => __( 'Add New', 'book', 'your-plugin-textdomain' ),
													'add_new_item'       => __( 'Add New Product', 'your-plugin-textdomain' ),
													'new_item'           => __( 'New Product', 'your-plugin-textdomain' ),
													'edit_item'          => __( 'Edit Product', 'your-plugin-textdomain' ),
													'view_item'          => __( 'View Product', 'your-plugin-textdomain' ),
													'all_items'          => __( 'All Products', 'your-plugin-textdomain' ),
													'search_items'       => __( 'Search Products', 'your-plugin-textdomain' ),
													'parent_item_colon'  => __( 'Parent Products:', 'your-plugin-textdomain' ),
													'not_found'          => __( 'No Products found.', 'your-plugin-textdomain' ),
													'not_found_in_trash' => __( 'No Products found in Trash.', 'your-plugin-textdomain' )
												),
								 'description'   => 'Description',				
								 'public' => true,
								 'has_archive' => true,
								 'menu_position' => 20,
								 'supports' => array( 'title', 'editor','thumbnail','comments','page-attributes'),
								 'capability_type' => 'post',
								 'register_meta_box_cb' => array($this,'add_product_metaboxes')
							 )
			  );
		}
		
	// Add the Events Meta Boxes

		function add_product_metaboxes() {
			add_meta_box('wpt_product_general', 'General Info', array($this,'wpt_product_general'), 'product', 'side', 'default');
			//add_meta_box('wpt_product_general', 'General Info', 'wpt_product_general', 'product', 'normal', 'high');
		}
		// Add the Events Meta Boxes
		
		// The Event Location Metabox
		
		function wpt_product_general() {
			global $post;
			
			ob_start();
			include_once( PLUGIN_PATH . '/includes/product-meta.php');
			$content = ob_get_clean();
			echo $content;
		}
		// Save the Metabox Data
		
		function wpt_save_product_meta($post_id, $post) {

			// verify this came from the our screen and with proper authorization,
			// because save_post can be triggered at other times
			if ( !wp_verify_nonce( $_POST['productmeta_noncename'],  PLUGIN_PATH . '/includes/product-general.php' )) {
			return $post->ID;
			}
		
			// Is the user allowed to edit the post or page?
			if ( !current_user_can( 'edit_post', $post->ID ))
				return $post->ID;
		   
			// OK, we're authenticated: we need to find and save the data
			// We'll put it into an array to make it easier to loop though.
			
			$product_meta['currency']  =  $_POST['currency'];
			$product_meta['price']  =  $_POST['price'];
			$product_meta['discount']  =  $_POST['discount'];
			
			$product_meta['brand']  =  $_POST['brand'];
			$product_meta['model']  =  $_POST['model'];
			$product_meta['made_in']  =  $_POST['made_in'];
			$product_meta['sku']  =  $_POST['sku'];
			$product_meta['color']  =  $_POST['color'];
			$product_meta['size']  =  $_POST['size'];
			
			$product_meta['s_price']  =  $_POST['s_price'];
			$product_meta['s_discount']  =  $_POST['s_discount'];
			$product_meta['s_width']  =  $_POST['s_width'];
			$product_meta['s_height']  =  $_POST['s_height'];
			$product_meta['s_length']  =  $_POST['s_length'];
			
			$product_meta['m_price']  =  $_POST['m_price'];
			$product_meta['m_discount']  =  $_POST['m_discount'];
			$product_meta['m_width']  =  $_POST['m_width'];
			$product_meta['m_height']  =  $_POST['m_height'];
			$product_meta['m_length']  =  $_POST['m_length'];
			
			$product_meta['l_price']  =  $_POST['l_price'];
			$product_meta['l_discount']  =  $_POST['l_discount'];
			$product_meta['l_width']  =  $_POST['l_width'];
			$product_meta['l_height']  =  $_POST['l_height'];
			$product_meta['l_length']  =  $_POST['l_length'];
			
			
			$product_meta['xl_price']  =  $_POST['xl_price'];
			$product_meta['xl_discount']  =  $_POST['xl_discount'];
			$product_meta['xl_width']  =  $_POST['xl_width'];
			$product_meta['xl_height']  =  $_POST['xl_height'];
			$product_meta['xl_length']  =  $_POST['xl_length'];
			
			
			$product_meta['xxl_price']  =  $_POST['xxl_price'];
			$product_meta['xxl_discount']  =  $_POST['xxl_discount'];
			$product_meta['xxl_width']  =  $_POST['xxl_width'];
			$product_meta['xxl_height']  =  $_POST['xxl_height'];
			$product_meta['xxl_length']  =  $_POST['xxl_length'];
			
			
			$product_meta['xxxl_price']  =  $_POST['xxxl_price'];
			$product_meta['xxxl_discount']  =  $_POST['xxxl_discount'];
			$product_meta['xxxl_width']  =  $_POST['xxxl_width'];
			$product_meta['xxxl_height']  =  $_POST['xxxl_height'];
			$product_meta['xxxl_length']  =  $_POST['xxxl_length'];
			
			$product_meta['width_height_size_unit']  =  $_POST['width_height_size_unit'];
			$product_meta['width']  =  $_POST['width'];
			$product_meta['height']  =  $_POST['height'];
			$product_meta['length']  =  $_POST['length'];
			
			$product_meta['weight_unit']  =  $_POST['weight_unit'];
			$product_meta['weight']  =  $_POST['weight'];
			
			$product_meta['show_room_condition']  =  $_POST['show_room_condition'];
			$product_meta['sale_type']  =  $_POST['sale_type'];
			$product_meta['product_group']  =  $_POST['product_group'];
			$product_meta['tax_class']  =  $_POST['tax_class'];
			$product_meta['available_from']  =  $_POST['available_from'];
			$product_meta['available_to']  =  $_POST['available_to'];
			$product_meta['in_stock']  =  $_POST['in_stock'];
			$product_meta['publish_status']  =  $_POST['publish_status'];
			
			$product_meta['description']  =  $_POST['description'];
			
			$product_meta['agreement_year']  =  $_POST['agreement_year'];
			$product_meta['shipping_desc']  =  $_POST['shipping_desc'];
			$product_meta['delivery_desc']  =  $_POST['delivery_desc'];
			$product_meta['payment_desc']  =  $_POST['payment_desc'];
			$product_meta['return_desc']  =  $_POST['return_desc'];
			
			
			$product_meta['seo_meta_title']  =  $_POST['seo_meta_title'];
			$product_meta['seo_meta_keywords']  =  $_POST['seo_meta_keywords'];
			$product_meta['seo_meta_description']  =  $_POST['seo_meta_description'];

			// Add values of $product_meta as custom fields
			
			foreach ($product_meta as $key => $value) { // Cycle through the $product_meta array!
				if( $post->post_type == 'revision' ) return; // Don't store custom data twice
				$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
					update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
					add_post_meta($post->ID, $key, $value);
				}
				if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
			}
			
			
			
			///////////Save image//////////////
			if ( $_POST['gallery'] ) 
			{
				// Build array for saving post meta
				$gallery_data = array();
				for ($i = 0; $i < count( $_POST['gallery']['image_url'] ); $i++ ) 
				{
					if ( '' != $_POST['gallery']['image_url'][ $i ] ) 
					{
						$gallery_data['image_url'][]  = $_POST['gallery']['image_url'][ $i ];
					}
				}
		
				if ( $gallery_data ) 
					update_post_meta( $post_id, 'gallery_data', $gallery_data );
				else 
					delete_post_meta( $post_id, 'gallery_data' );
			} 
			// Nothing received, all fields are empty, delete option
			else 
			{
				delete_post_meta( $post_id, 'gallery_data' );
			}
		
		}
	
	function my_edit_product_columns( $columns ) {
	
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'id' => __('ID'),
			'title' => __( 'title' ),
			'images' => __('Images'),
			'price' => __( 'Price' ),
			'sku' => __( 'SKU' ),
			'color' => __( 'Color' ),
			'size' => __( 'Size' ),
			'author' => __( 'author' ),
			'date' => __( 'Date' )
		);
	
		return $columns;
	}
	
		// Add to admin_init function
	 
	function manage_product_columns($column_name, $id) {
		global $wpdb;
		switch ($column_name) {
		case 'id':
			echo $id;
				break;
	 
		case 'images':
			echo get_the_post_thumbnail($queried_post->ID, 'medium');
			break;
		case 'price':
				  $custom_fields = get_post_custom($id);
				  $my_custom_field = $custom_fields[$column_name];
				  
				  if( $my_custom_field)
				  {
					  foreach ( $my_custom_field as $key => $value ) {
						echo $value;
					  }
				  }
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

 }

?>