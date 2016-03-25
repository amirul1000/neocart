<?php
class Product_Group_Widget extends WP_Widget { 

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'class_name' => 'group_widget',
			'description' => 'Featured products,Bestsellers,MOST POPULAR,Coming soon,New arrivals',
		);
		parent::__construct( 'Group_Widget', 'Product Group', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) { 
	      $page =get_page_by_title( 'details' );
		  $guid = $page->guid; 
		// outputs the content of the widget
		 $product_group = $args['product_group'];
		 $args = array( 'post_type' => 'product',
		                 'meta_query' => array(
												array(
													'key'     => 'product_group',
													'value'   => $product_group,
													'compare' => 'LIKE',
												)
											),   
						 'posts_per_page' => 4,
						 'post_status' => array( 'publish') );
		 $loop = new WP_Query( $args );
		?>
		<div class="sidebar-products clearfix">
              <h2><?php echo $product_group; ?></h2>
             <?php
			   foreach ( $loop->posts as $key=>$post ) :
 		         $post_id = $post->ID;
			  ?>
              <div class="item">
                <a href="<?php echo $guid; ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id  ) );?>" alt="<?php  $post->post_title;?>"></a>
                <h3>
                  <?php 
					
				  ?>   
                <a href="<?php echo $guid; ?>&product_id=<?php echo $post->ID; ?>"><?php echo $post->post_title;?></a>
                </h3>
                <div class="price">$<?php echo get_post_meta($post->ID, 'price', true); ?></div>
              </div>
             <?php
			  endforeach;
			 ?>  
              
           </div>
		<?php
		
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
} 
?>


