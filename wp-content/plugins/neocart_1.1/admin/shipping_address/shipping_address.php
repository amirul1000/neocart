<?php
       global $wpdb;  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
		  case 'add':
				
				if(empty($_REQUEST['id']))
				{    $table_name = $wpdb->prefix."shipping_address";
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
				}
				else
				{
					 $table_name = $wpdb->prefix."shipping_address";
					 $wpdb->update($table_name, 
							array(
								  'ship_first_name' => $_POST['ship_first_name'],
								  'ship_last_name' => $_POST['ship_last_name'],
								  'ship_adress1' => $_POST['ship_adress1'],								  
								  'ship_adress2' => $_POST['ship_adress2'],
								  'ship_zip_code' => $_POST['ship_zip_code'],
								  'ship_city' => $_POST['ship_city'],
								  'ship_state' => $_POST['ship_state'],								  
								  'ship_country' => $_POST['ship_country']
								  )  ,
								   array('id'=>$_REQUEST['id'])
								); 
				}
				include("shipping_address_list.php");						   
				break;    
		case "edit": 
				    $Id = $_REQUEST['id'];
					if( !empty($_REQUEST['id'] ))
					{
						global $wpdb;
						$table_name = $wpdb->prefix."shipping_address";
						$sql = "SELECT * from  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
						$res =  $wpdb->get_results($sql, OBJECT);
						if($wpdb->num_rows === 1)
						{
							$Id        = $res[0]->id; 
							$ship_first_name    = $res[0]->ship_first_name;
							$ship_last_name    = $res[0]->ship_last_name;
							$ship_adress1    = $res[0]->ship_adress1;
							$ship_adress2    = $res[0]->ship_adress2;
							$ship_zip_code    = $res[0]->ship_zip_code;
							$ship_city    = $res[0]->ship_city;
							$ship_state    = $res[0]->ship_state;
							$ship_country    = $res[0]->ship_country;
						}
					 }
				include("shipping_address_editor.php");						  
				break;
						   
         case 'delete': 
					global $wpdb;					
				    $Id = $_REQUEST['id'];					
					$table_name = $wpdb->prefix."shipping_address";
					$sql = "DELETE FROM  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
					$res =   $wpdb->query($wpdb->prepare($sql));
					include("shipping_address_list.php");						   
				break; 						   
         case "list" :  
				include("shipping_address_list.php");
				break; 
      
	     default :  
		       include("shipping_address_list.php");
				break;          
	   }

//Protect same image name
 function getMaxId($db)
 {
	    
	global $wpdb;
	$table_name = $wpdb->prefix."shipping_address";
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
