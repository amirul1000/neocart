<?php
class Neo_Cart_Taxonomy{
		 public function __construct() {
								 
					add_action( 'init', array( $this, 'create_taxonomy' ), 0 );
					
				}
				
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
}				
?>				
				