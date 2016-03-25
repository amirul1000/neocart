<?php
class Product_Similar_Popular_Widget extends WP_Widget { 

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'class_name' => 'similar_popular_widget',
			'description' => 'Similar POPULAR',
		);
		parent::__construct( 'Similar_Popular_Widget', 'Similar Popular', $widget_ops );
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
						 'posts_per_page' => 20,
						 'post_status' => array( 'publish') );
		 $loop = new WP_Query( $args );
		?>
         <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <h2>Similar POPULAR PRODUCTS</h2>
            <div class="owl-carousel owl-carousel4">
              <?php
			   foreach ( $loop->posts as $key=>$post ) :
 		         $post_id = $post->ID;
			  ?>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id  ) );?>" alt="<?php  $post->post_title;?>" class="img-responsive" alt="<?php echo $post->post_title;?>">
                    <div>
                      <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id  ) );?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="<?php echo $guid; ?>&product_id=<?php echo $post->ID; ?>"><?php echo $post->post_title;?></a></h3>
                  <div class="pi-price">$<?php echo get_post_meta($post->ID, 'price', true); ?></div>
                  <a href="#" class="btn btn-default add2cart">Add to cart</a>
                  <div class="sticker sticker-new"></div>
                </div>
              </div>
              <?php
			   endforeach;
			  ?>            
            </div>
          </div>
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


