<?php 
     //add shipping address
	 $table_name = $wpdb->prefix."shipping_address";
	 $wpdb->insert($table_name, 
			array(
				  'ship_first_name' => $_POST['ship_first_name'],
				  'ship_last_name' => $_POST['ship_last_name'],
				  'ship_adress1' => $_POST['ship_adress1'],								  
				  'ship_adress2' => $_POST['ship_adress2'],
				  'ship_zip_code' => $_POST['ship_zip_code'],
				  'ship_city' => $_POST['ship_city'],
				  'ship_state' => $_POST['ship_state'],								  
				  'ship_country' => $_POST['ship_country']
				  )
			);
	$shipping_address_id =  $wpdb->insert_id;
	
	//add billing information
	/*$table_name = $wpdb->prefix."billing_information";
	$wpdb->insert($table_name, 
			array(
				  'first_name' => $_POST['first_name'],
				  'last_name' => $_POST['last_name'],
				  'country'=>$_REQUEST['country'],
				  'adress1' => $_POST['adress1'],								  
				  'adress2' => $_POST['adress2'],
				  'city' => $_POST['city'],
				  'state' => $_POST['state'],
				  'zip_code'=>$_REQUEST['zip_code'],
				  'card_type' => $_POST['card_type'],								  
				  'card_number' => $_POST['card_number'],
				  'expiration_month' => $_POST['expiration_month'],
				  'expiration_year' => $_POST['expiration_year'],
				  'verification_code'=>$_REQUEST['verification_code']
				  )
			);
	$billing_information_id = $wpdb->insert_id;	*/
	//add recurring
	//$recurring_id = $_POST['recurring_id'];	
	
	//add order
	 $current_user = wp_get_current_user(); 
	 
	 if(isset($_SESSION['promotion_amount']))
	  {
		$_POST['payment_amuont'] = $_POST['payment_amuont']+$_SESSION['promotion_amount'];
	  }	
	$table_name = $wpdb->prefix."orders";
	/*$wpdb->insert($table_name, 
			array(
				  'users_id' => $current_user->ID,								  
				  'shipping_address_id' => $shipping_address_id,
				  'recurring_id' => $recurring_id,
				  'fast_delivery_date'=> $_POST['fast_delivery_date'],	
				  'promotion_code'=> $_SESSION['promotion_code'],	
				  'promotion_amount'=> $_SESSION['promotion_amount'],
				  'billing_information_id' => $billing_information_id,
				  'shipping_cost' => $_POST['shipping_cost'],								  
				  'total_amount' => $_POST['payment_amuont'],
				  'date_created' => $date_time,
				  'last_delivery_date' =>$last_delivery_date,
				  'status' => 'active'
				  )
			);*/
			
	$wpdb->insert($table_name, 
			array(
				  'users_id' => $current_user->ID,								  
				  'shipping_address_id' => $shipping_address_id,
				  'promotion_code'=> $_SESSION['promotion_code'],	
				  'promotion_amount'=> $_SESSION['promotion_amount'],
				  'shipping_cost' => $_POST['shipping_cost'],								  
				  'total_amount' => $_POST['payment_amuont'],
				  'date_created' => date("Y-m-d H:i:s"),
				  'status' => 'active'
				  )
			);		
	$orders_id = $wpdb->insert_id;	
	//add recuring
	/*$table_name = $wpdb->prefix."recurring_deliver";
	$wpdb->insert($table_name, 
					array(			  
					  'orders_id' => $orders_id,
					  'delivery_date'=>$last_delivery_date,
					  'total_amount' => $_POST['payment_amuont'],
					  'payment_status'=>'paid',
					  'delivery_status' => 'pending'
					  )
		  	  );*/
	//add item
	$count = count($_SESSION['cart']);					
	for($i=0;$i<$count;$i++)
	{
		$table_name = $wpdb->prefix."items";
		$wpdb->insert($table_name, 
			array(
				  'orders_id' => $orders_id,								  
				  'os0' => $_SESSION['cart'][$i]['os0'],
				  'os1' => $_SESSION['cart'][$i]['os1'],
				  'item_name' => $_SESSION['cart'][$i]['item_name'],
				  'item_number' => $_SESSION['cart'][$i]['item_number'],								  
				  'quantity' => $_SESSION['cart'][$i]['quantity'],
				  'amount' => number_format($_SESSION['cart'][$i]['amount'], 2, '.', '')
				  )
			);
	}
	
?>	
			