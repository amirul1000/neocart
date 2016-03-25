<?php
       global $wpdb;  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
		  case 'add':
				
				if(empty($_REQUEST['id']))
				{    $table_name = $wpdb->prefix."items";
					 $wpdb->insert($table_name, 
							array(
							      'orders_id' => $_POST['orders_id'],								  
								  'os0' => $_POST['os0'],
								  'os1' => $_POST['os1'],
								  'item_name' => $_POST['item_name'],
								  'item_number' => $_POST['item_number'],								  
								  'quantity' => $_POST['quantity'],
								  'amount' => $_POST['amount']
								  )
							);
				}
				else
				{
					 $table_name = $wpdb->prefix."items";
					 $wpdb->update($table_name, 
							array(
							      'orders_id' => $_POST['orders_id'],								  
								  'os0' => $_POST['os0'],
								  'os1' => $_POST['os1'],
								  'item_name' => $_POST['item_name'],
								  'item_number' => $_POST['item_number'],								  
								  'quantity' => $_POST['quantity'],
								  'amount' => $_POST['amount']
								  )  ,
								   array('id'=>$_REQUEST['id'])
								); 
				}
				include("items_list.php");						   
				break;    
		case "edit": 
				    $Id = $_REQUEST['id'];
					if( !empty($_REQUEST['id'] ))
					{
						global $wpdb;
						$table_name = $wpdb->prefix."items";
						$sql = "SELECT * from  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
						$res =  $wpdb->get_results($sql, OBJECT);
						if($wpdb->num_rows === 1)
						{
							$Id        = $res[0]->id;  
							$orders_id    = $res[0]->orders_id;
							$os0    = $res[0]->os0;
							$os1    = $res[0]->os1;
							$item_name    = $res[0]->item_name;
							$item_number    = $res[0]->item_number;
							$quantity    = $res[0]->quantity;
							$amount    = $res[0]->amount;
						}
					 }
				include("items_editor.php");						  
				break;
						   
         case 'delete': 
					global $wpdb;					
				    $Id = $_REQUEST['id'];					
					$table_name = $wpdb->prefix."items";
					$sql = "DELETE FROM  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
					$res =   $wpdb->query($wpdb->prepare($sql));
					include("items_list.php");						   
				break; 						   
         case "list" :  
				include("items_list.php");
				break; 
      
	     default :  
		       include("items_list.php");
				break;          
	   }

//Protect same image name
 function getMaxId($db)
 {
	    
	global $wpdb;
	$table_name = $wpdb->prefix."items";
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
