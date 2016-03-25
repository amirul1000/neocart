<?php
	/*
	Plugin Name: NeoCart
	Plugin URI: 
	Description: Shopping cart
	Version: 1.1
	Author: Amirul Momenin
	Author URI: 
	License: GPL
	*/
	//http://www.jqueryscript.net/demo/Simple-Clean-jQuery-Vertical-Product-Gallery/#
	ob_start(); // line 1
	session_start(); // line 2
	$PLUGIN_URL = plugin_dir_url(__FILE__);
	define('PLUGIN_URL',substr($PLUGIN_URL,0,strlen($PLUGIN_URL)-1));
	define('PLUGIN_PATH', str_replace('\\', '/', dirname(__FILE__)) );
	
	
	
	include_once( PLUGIN_PATH . '/classes/class.custom-product-post-type.php');
	include_once( PLUGIN_PATH . '/classes/class.custom-taxonomy.php');
	include_once( PLUGIN_PATH . '/classes/class.product-group-widget.php');
	include_once( PLUGIN_PATH . '/classes/class.product-similar-group-popular-widget.php');
	include_once( PLUGIN_PATH . '/classes/class.sidebar-menu-widget.php');
	
	$obj_neo_cart_product = new Neo_Cart_Product();
	$obj_neo_cart_taxonomy = new Neo_Cart_Taxonomy();
			
    // register Foo_Widget widget
	function register_product_widget() {
		register_widget( 'Product_Group_Widget' );
	}
	add_action( 'widgets_init', 'register_product_widget' );
	
	function register_product_similar_popular_widget() {
		register_widget( 'Product_Similar_Popular_Widget' );
	}
	add_action( 'widgets_init', 'register_product_similar_popular_widget' );
	
	function register_sidebar_menu_widget() {
		register_widget( 'Sidebar_Menu_Widget' );
	}
	add_action( 'widgets_init', 'register_sidebar_menu_widget' );
	
	
	add_action('admin_menu', 'cart_add_pages'); 
	function cart_add_pages() {
		add_menu_page("Settings", "Settings", "activate_plugins", "settings", "admin_settings");
		add_menu_page("Company", "Company", "activate_company", "company", "admin_company");
	}
	
	function admin_cupons() { 
		include_once dirname(__FILE__) . '/admin/cupons/cupons.php';
	}
	
	function admin_settings() { 
		include_once dirname(__FILE__) . '/admin/settings/settings.php';
	}
	
	function admin_company() { 
		include_once dirname(__FILE__) . '/admin/company/company.php';
	}
	
	register_activation_hook(__FILE__,'neocart_install'); 
	register_deactivation_hook( __FILE__, 'neocart_remove' );
	function neocart_install()
	 {  
		//create page
		create_page("products");
		create_page("cart");
		create_page("login");
		create_page("register");
		create_page("my order");
		create_page("details");
		
		global $neocart_db_version;
		$neocart_db_version = "1.0";
		global $wpdb;
		global $neocart_db_version;
	
		
	   
		$table_name = $wpdb->prefix."settings";
		$sqlsettings = "CREATE TABLE $table_name(
					  id int(10) NOT NULL AUTO_INCREMENT,
					  paypal_business varchar(256) DEFAULT NULL,
					  paypal_live_url varchar(256) DEFAULT NULL,
					  paypal_sandbox_url varchar(256) NOT NULL,
					  paypal_return_url varchar(256) NOT NULL,
					  paypal_cancel_url varchar(256) NOT NULL,
					  paypal_shopping_url varchar(256) NOT NULL,
					  paypal_notify_url varchar(256) NOT NULL,
					  paypal_status enum('live','sandbox') DEFAULT NULL,
					  shipping_visiblity_status enum('yes','no') DEFAULT NULL,
					  paypal_pro_visiblity_status enum('yes','no') DEFAULT NULL,
					  enable_paypal_api enum('yes','no') DEFAULT NULL,
					  enable_paypal_pro_api enum('yes','no') DEFAULT NULL,
					  PRIMARY KEY (id)
					) ;";
					
		//recurring_visiblity_status enum('yes','no') DEFAULT NULL,
				
		$table_name = $wpdb->prefix."cupons";
		$sqlcupons = "CREATE TABLE $table_name(
		   id int(10) NOT NULL AUTO_INCREMENT,
		   promotion_code varchar(100) DEFAULT NULL,
		   promotion_amount decimal(10,2) NOT NULL,
		   status enum('unused','used','used') DEFAULT NULL,
		   PRIMARY KEY (id)
		);";
		
		
		$table_name = $wpdb->prefix."company";
		 $sqlcompany = "CREATE TABLE $table_name(
		   id int(10) NOT NULL AUTO_INCREMENT,
		   company_name varchar(100) DEFAULT NULL,
		   company_address varchar(100) DEFAULT NULL,
		   company_email varchar(100) DEFAULT NULL,
		   company_phone varchar(100) DEFAULT NULL,
		   PRIMARY KEY (id)
		);";					
					
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	 
		dbDelta($sqlsettings);
		dbDelta($sqlcupons);
		dbDelta($sqlcompany);
		
		add_option("neocart_db_version", $neocart_db_version);
		
		//create page
		//include_once dirname(__FILE__) . '/create-page.php';
		
	}
	function create_page($title)
	{
		global $wpdb; 
		
		//Products
		$the_page_title = $title;
		$the_page_name = $title;
		
		delete_option("my_plugin_page_title");
		add_option("my_plugin_page_title", $the_page_title, '', 'yes');
		
		delete_option("my_plugin_page_name");
		add_option("my_plugin_page_name", $the_page_name, '', 'yes');
		
		delete_option("my_plugin_page_id");
		add_option("my_plugin_page_id", '0', '', 'yes');
		
		$the_page = get_page_by_title( $the_page_title );
		if ( ! $the_page ) {
			$_p = array();
			$_p['post_title'] = $the_page_title;
			$_p['post_content'] = "[".$title."]";
			$_p['post_status'] = 'publish';
			$_p['post_type'] = 'page';
			$_p['comment_status'] = 'closed';
			$_p['ping_status'] = 'closed';
			$_p['post_category'] = array(1);
			$the_page_id = wp_insert_post( $_p );
		}
	}
	
	function neocart_remove()
	{
		global $wpdb;
		
		$table_name = $wpdb->prefix."settings";
		$sql = "DROP TABLE ". $table_name;
		$wpdb->query($sql);
		
		$table_name = $wpdb->prefix."cupons";
		$sql = "DROP TABLE ". $table_name;
		$wpdb->query($sql);
		
		$table_name = $wpdb->prefix."company";
		$sql = "DROP TABLE ". $table_name;
		$wpdb->query($sql);
		
		//remove page
		global $wpdb;
	
		$the_page_title = get_option( "my_plugin_page_title" );
		$the_page_name = get_option( "my_plugin_page_name" );
		$the_page_id = get_option( 'my_plugin_page_id' );
		if( $the_page_id ) {
			wp_delete_post( $the_page_id ); 
		}
		delete_option("my_plugin_page_title");
		delete_option("my_plugin_page_name");
		delete_option("my_plugin_page_id");
	}
	
	//short code Products
	function products_sort_code_func( $atts ) {
		include_once dirname(__FILE__) . '/product-list.php';
	}
	add_shortcode( 'products', 'products_sort_code_func' );
	
	//short code Cart
	function cart_sort_code_func( $atts ) {
		include_once dirname(__FILE__) . '/cart.php';
	}
	add_shortcode( 'cart', 'cart_sort_code_func' );
	
	//short code login
	function login_sort_code_func( $atts ) {
		include_once dirname(__FILE__) . '/login.php';
	}
	add_shortcode( 'login', 'login_sort_code_func' );  
	
	//short code register
	function register_sort_code_func( $atts ) {
		include_once dirname(__FILE__) . '/register.php';
	}
	add_shortcode( 'register', 'register_sort_code_func' );
	//short code my order
	function my_order_sort_code_func( $atts ) {
		include_once dirname(__FILE__) . '/my_order.php';
	}
	add_shortcode( 'my order', 'my_order_sort_code_func' );
	//short code products details
	function products_detail_sort_code_func( $atts ) {
		include_once dirname(__FILE__) . '/product-details.php';
	}
	add_shortcode( 'details', 'products_detail_sort_code_func' );
?>
