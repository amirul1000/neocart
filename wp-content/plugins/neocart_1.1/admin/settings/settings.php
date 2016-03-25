<?php
       global $wpdb;  
       $prefix = $wpdb->prefix;
	   
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
		  case 'add':
			
				if(empty($_REQUEST['id']))
				{    $table_name = $prefix."settings";
					 $wpdb->insert($table_name, 
							array(			  
								  'paypal_business' => $_POST['paypal_business'],
								  'paypal_live_url'=>$_REQUEST['paypal_live_url'],
								  'paypal_sandbox_url' => $_POST['paypal_sandbox_url'],
								  'paypal_return_url'=>$_REQUEST['paypal_return_url'],
								  'paypal_cancel_url' => $_POST['paypal_cancel_url'],
								  'paypal_shopping_url'=>$_REQUEST['paypal_shopping_url'],
								  'paypal_notify_url' => $_POST['paypal_notify_url'],
								  'paypal_status'=>$_REQUEST['paypal_status'],
								  'shipping_visiblity_status'=>$_REQUEST['shipping_visiblity_status'],
								  'paypal_pro_visiblity_status'=>$_REQUEST['paypal_pro_visiblity_status'],
								  'enable_paypal_api'=>$_REQUEST['enable_paypal_api'],
								  'enable_paypal_pro_api'=>$_REQUEST['enable_paypal_pro_api']
								  )
							);
				}
				else
				{
					 $table_name = $prefix."settings";
					 $wpdb->update($table_name, 
							array(					  
								  'paypal_business' => $_POST['paypal_business'],
								  'paypal_live_url'=>$_REQUEST['paypal_live_url'],
								  'paypal_sandbox_url' => $_POST['paypal_sandbox_url'],
								  'paypal_return_url'=>$_REQUEST['paypal_return_url'],
								  'paypal_cancel_url' => $_POST['paypal_cancel_url'],
								  'paypal_shopping_url'=>$_REQUEST['paypal_shopping_url'],
								  'paypal_notify_url' => $_POST['paypal_notify_url'],
								  'paypal_status'=>$_REQUEST['paypal_status'],
								  'shipping_visiblity_status'=>$_REQUEST['shipping_visiblity_status'],
								  'paypal_pro_visiblity_status'=>$_REQUEST['paypal_pro_visiblity_status'],
								  'enable_paypal_api'=>$_REQUEST['enable_paypal_api'],
								  'enable_paypal_pro_api'=>$_REQUEST['enable_paypal_pro_api']
								  )  ,
								   array('id'=>$_REQUEST['id'])
								); 
				}
				include("settings_editor.php");						   
				break;    
		case "edit": 
				    $Id = $_REQUEST['id'];
					if( !empty($_REQUEST['id'] ))
					{
						global $wpdb;
						$table_name = $prefix."recurring";
						$sql = "SELECT * from  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
						$res =  $wpdb->get_results($sql, OBJECT);
						if($wpdb->num_rows === 1)
						{
							$Id        = $res[0]->id;  
							$paypal_business    = $res[0]->paypal_business;
							$paypal_live_url    = $res[0]->paypal_live_url;
							$paypal_sandbox_url    = $res[0]->paypal_sandbox_url;
							$paypal_return_url    = $res[0]->paypal_return_url;
							$paypal_cancel_url    = $res[0]->paypal_cancel_url;
							$paypal_shopping_url    = $res[0]->paypal_shopping_url;
							$paypal_notify_url    = $res[0]->paypal_notify_url;
							$shipping_visiblity_status    = $res[0]->shipping_visiblity_status;
							$paypal_pro_visiblity_status    = $res[0]->paypal_pro_visiblity_status;
							$enable_paypal_api    = $res[0]->enable_paypal_api;
							$enable_paypal_pro_api    = $res[0]->enable_paypal_pro_api;
						}
					 }
				include("settings_editor.php");						  
				break;
						   
         case 'delete': 
					global $wpdb;					
				    $Id = $_REQUEST['id'];
					$table_name = $prefix."settings";
					$sql = "DELETE FROM  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
					$res =   $wpdb->query($wpdb->prepare($sql));
					include("settings_list.php");						   
				break; 						   
         case "list" :  
				include("settings_list.php");
				break; 
      
	     default :  
		       include("settings_editor.php");
				break;          
	   }
?>
