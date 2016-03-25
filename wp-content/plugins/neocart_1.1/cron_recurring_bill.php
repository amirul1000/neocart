<?php
        include("../../../wp-load.php");
		include("paypal_pro.lib.php");
		
		  $day = date("D",strtotime(date("Y-m-d h:i:s")));
		  if($day=="Fri") //On Friday will make a new order
			{
				global $wpdb;			
				$table_name = $wpdb->prefix."orders";
				$sql = "SELECT * from  ".$table_name." WHERE status='active' ORDER BY id DESC";		
				$arr =  $wpdb->get_results($sql, OBJECT);	
				if($wpdb->num_rows >= 1)//if record is greater than 0
				{
					for($i=0;$i<count($arr);$i++) // looping
					{
						  $id = $arr[$i]->id;
						  $orders_id = $id;
						  $recurring_id = $arr[$i]->recurring_id;
						  $total_amount = $arr[$i]->total_amount;
						  $date_created = $arr[$i]->date_created;
						  $last_delivery_date = $arr[$i]->last_delivery_date;
						  $status = $arr[$i]->status;
				 
						  // recurring then find out next deliver day
						  $no_days = get_recurring_no_days($recurring_id);
						  if($no_days>1)
						  {
							 $days_differ =  ( strtotime(date("Y-m-d",strtotime($last_delivery_date))) - strtotime(date("Y-m-d")))/ (60 * 60 * 24);
							 $days_differ = $days_differ*(-1);
							 if($days_differ>=($no_days-7)&&$days_differ<=$no_days || $days_differ>$no_days)
							 {
							       //check payment success
								   global $httptrnsaction;
								   
								   //get billing information 
								    global $wpdb;			
									$table_name = $wpdb->prefix."billing_information";
									$sql = "SELECT * from  ".$table_name."     WHERE id='".$arr[$i]->billing_information_id."'";
									$arr2 =  $wpdb->get_results($sql, OBJECT);
									if($wpdb->num_rows >= 1)
									{
										$_REQUEST['first_name'] =  $arr2[0]->first_name;
										$_REQUEST['last_name'] =  $arr2[0]->last_name;
										$_REQUEST['card_type'] =  $arr2[0]->card_type;
										$_REQUEST['card_number'] =  $arr2[0]->card_number;
										$_REQUEST['expiration_month'] = $arr2[0]->expiration_month; 
										$_REQUEST['expiration_year'] =  $arr2[0]->expiration_year;
										$_REQUEST['verification_code'] = $arr2[0]->verification_code; 
										$_REQUEST['adress1'] = $arr2[0]->adress1; 
										$_REQUEST['adress2'] =  $arr2[0]->adress2;
										$_REQUEST['city'] =  $arr2[0]->city;
										$_REQUEST['state'] = $arr2[0]->state;
										$_REQUEST['zip_code'] =  $arr2[0]->zip_code;
										$_REQUEST['country'] =  $arr2[0]->country;
										$_REQUEST['payment_amuont'] = $total_amount;
								   }
								   if(card_payment_submit()==true)
								   {
									  if($httptrnsaction['ACK']=="Success")
									  {
										 $last_delivery_date = get_last_delivery_date($no_days);
										 update_orders($id,$last_delivery_date); 
										 add_recurring_deliver($orders_id,$last_delivery_date,$total_amount);			    
									 }
									 
								  } 
							  }
						   }
						   else  //inactive order
						   {
								global $wpdb;	
								 $table_name = $wpdb->prefix."orders";
								 $wpdb->update($table_name, 
													array(
														  'last_delivery_date'=>$last_delivery_date,
														  'status' => 'inactive'
														  )  ,
														   array('id'=>$id)
														); 
						   }
					}
				 }//End of count record
				} //End of checking day
		 
function get_last_delivery_date($no_days)
{
     //get delivery date
	 $date_time =  date("Y-m-d h:i:s");
	 //$date_time =  date('Y-m-d', strtotime($date_time. " + $no_days days"));
	 $day = date("D",strtotime($date_time));	
	 $last_delivery_date = $date_time; 	 
	 if($day=="Sat")
	 {
	   $last_delivery_date = date('Y-m-d', strtotime($date_time. ' + 2 days'));
	 }
	 if($day=="Sun")
	 {
	    $last_delivery_date = date('Y-m-d', strtotime($date_time. ' + 1 days'));
	 }
	 if($day=="Mon")
	 {
	   $last_delivery_date = date('Y-m-d', strtotime($date_time. ' + 0 days'));
	 }
	 if($day=="Tue")
	 {
	    $last_delivery_date = date('Y-m-d', strtotime($date_time. ' + 6 days'));
	 }
	 if($day=="Wed")
	 {
	   $last_delivery_date = date('Y-m-d', strtotime($date_time. ' + 5 days'));
	 }
	 if($day=="Thu")
	 {
	    $last_delivery_date = date('Y-m-d', strtotime($date_time. ' + 4 days'));
	 }
	 if($day=="Fri")
	 {
	    $last_delivery_date = date('Y-m-d', strtotime($date_time. ' + 3 days'));
	 }
	 
	 return $last_delivery_date;
}	

function get_recurring_no_days($recurring_id)
{
    global $wpdb;			
	$table_name = $wpdb->prefix."recurring";
	$sql = "SELECT * from  ".$table_name."  WHERE id='".$recurring_id."'";
	$arr2 =  $wpdb->get_results($sql, OBJECT);	
	if($wpdb->num_rows >= 1)
	{
	    return $arr2[0]->no_days;
	 }
	return 0;
}				
		 
function update_orders($id,$last_delivery_date)
{	 
	 global $wpdb;	
	 $table_name = $wpdb->prefix."orders";
	 $wpdb->update($table_name, 
						array(
							  'last_delivery_date'=>$last_delivery_date,
							  'status' => 'active'
							  )  ,
							   array('id'=>$id)
							); 
}

function add_recurring_deliver($orders_id,$last_delivery_date,$total_amount)
{								
	//add recuring
	global $wpdb;	
	$table_name = $wpdb->prefix."recurring_deliver";
	$wpdb->insert($table_name, 
					array(			  
					  'orders_id' => $orders_id,
					  'delivery_date'=>$last_delivery_date,
					  'total_amount' => $total_amount,
					  'payment_status'=>'paid',
					  'delivery_status' => 'pending'
					  )
			  );
}			  
?>	
	