<?php
       global $wpdb;  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
		  case 'add':
				
				if(empty($_REQUEST['id']))
				{    $table_name = $wpdb->prefix."orders";
					 $wpdb->insert($table_name, 
							array(
							      'users_id' => $_POST['users_id'],								  
								  'shipping_address_id' => $_POST['shipping_address_id'],
								  'promotion_code' => $_POST['promotion_code'],
								  'promotion_amount' => $_POST['promotion_amount'],
								  'shipping_cost' => $_POST['shipping_cost'],								  
								  'total_amount' => $_POST['total_amount'],
								  'date_created' => date("Y-m-d h:i:s"),								  
								  'status' => $_POST['status']
								  )
							);
				}
				else
				{
					 $table_name = $wpdb->prefix."orders";
					 $wpdb->update($table_name, 
							array(
							      'users_id' => $_POST['users_id'],								  
								  'shipping_address_id' => $_POST['shipping_address_id'],
								  'promotion_code' => $_POST['promotion_code'],
								  'promotion_amount' => $_POST['promotion_amount'],
								  'billing_information_id' => $_POST['billing_information_id'],
								  'shipping_cost' => $_POST['shipping_cost'],								  
								  'total_amount' => $_POST['total_amount'],
								  'date_created' => date("Y-m-d h:i:s"),
								  'status' => $_POST['status']
								  )  ,
								   array('id'=>$_REQUEST['id'])
								); 
				}
				include("orders_list.php");						   
				break;    
		case "edit": 
				    $Id = $_REQUEST['id'];
					if( !empty($_REQUEST['id'] ))
					{
						global $wpdb;
						$table_name = $wpdb->prefix."orders";
						$sql = "SELECT * from  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
						$res =  $wpdb->get_results($sql, OBJECT);
						if($wpdb->num_rows === 1)
						{
							$Id        = $res[0]->id;  
							$users_id    = $res[0]->users_id;
							$shipping_address_id    = $res[0]->shipping_address_id;
							$promotion_code = $res[0]->promotion_code;
							$promotion_amount = $res[0]->promotion_amount;
							$billing_information_id    = $res[0]->billing_information_id;
							$shipping_cost    = $res[0]->shipping_cost;
							$total_amount    = $res[0]->total_amount;
							$date_created    = $res[0]->date_created;
							$status    = $res[0]->status;
						}
					 }
				include("orders_editor.php");						  
				break;
						   
         case 'delete': 
					global $wpdb;					
				    $Id = $_REQUEST['id'];					
					$table_name = $wpdb->prefix."orders";
					$sql = "DELETE FROM  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
					$res =   $wpdb->query($wpdb->prepare($sql));
					// delete items
					$table_name = $wpdb->prefix."items";
					$sql = "DELETE FROM  ".$table_name."  WHERE orders_id='".$_REQUEST['id']."'";
					$res =   $wpdb->query($wpdb->prepare($sql));
					//delete recurring reliver
					$table_name = $wpdb->prefix."recurring_deliver";
					$sql = "DELETE FROM  ".$table_name."  WHERE orders_id='".$_REQUEST['id']."'";
					$res =   $wpdb->query($wpdb->prepare($sql));
					
					include("orders_list.php");						   
				break; 
		  case "items":
		            include("orders_items.php");  
		            break;
		 case "recurring_deliver":
		   		   include("orders_deliver.php");  
		            break;
		 case "change_delivery_status":
		             $table_name = $wpdb->prefix."recurring_deliver";
					 $wpdb->update($table_name, 
							array(	
								  'delivery_status' => $_REQUEST['delivery_status']
								  )  ,
								   array('id'=>$_REQUEST['id'])
								); 
					$_REQUEST['id'] =  $_REQUEST['orders_id'];			
		           include("orders_deliver.php");  
		            break;						 										   
         case "list" :  
				include("orders_list.php");
				break; 
      
	     default :  
		       include("orders_list.php");
				break;          
	   }

//Protect same image name
 function getMaxId($db)
 {
	    
	global $wpdb;
	$table_name = $wpdb->prefix."orders";
	$sql = "SELECT max(id) as maxid from  ".$table_name."'";
	$resmax =  $wpdb->get_results($sql, OBJECT);
	$max = 1;
	if($wpdb->num_rows >= 1)
	{
		
	    $max = $resmax[0]->maxid+1;
		
	}   
	   return $max;
 } 	 
?>
