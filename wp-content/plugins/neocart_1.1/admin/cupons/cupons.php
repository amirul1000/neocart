<?php
       global $wpdb;  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
		  case 'add':
			
				if(empty($_REQUEST['id']))
				{    $table_name = $wpdb->prefix."cupons";
					 $wpdb->insert($table_name, 
							array(			  
								  'promotion_code' => $_POST['promotion_code'],
								  'promotion_amount' => $_POST['promotion_amount'],
								  'status'=>$_REQUEST['status']
								  )
							);
				}
				else
				{
					 $table_name = $wpdb->prefix."cupons";
					 $wpdb->update($table_name, 
							array(					  
								  'promotion_code' => $_POST['promotion_code'],
								  'promotion_amount' => $_POST['promotion_amount'],
								  'status'=>$_REQUEST['status']
								  )  ,
								   array('id'=>$_REQUEST['id'])
								); 
				}
				include("cupons_list.php");						   
				break;    
		case "edit": 
				    $Id = $_REQUEST['id'];
					if( !empty($_REQUEST['id'] ))
					{
						global $wpdb;
						$table_name = $wpdb->prefix."cupons";
						$sql = "SELECT * from  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
						$res =  $wpdb->get_results($sql, OBJECT);
						if($wpdb->num_rows === 1)
						{
							$Id        = $res[0]->id;  
							$promotion_code    = $res[0]->promotion_code;
							$promotion_amount    = $res[0]->promotion_amount;
							$status    = $res[0]->status;
						}
					 }
				include("cupons_editor.php");						  
				break;
						   
         case 'delete': 
					global $wpdb;					
				    $Id = $_REQUEST['id'];
					$table_name = $wpdb->prefix."cupons";
					$sql = "DELETE FROM  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
					$res =   $wpdb->query($wpdb->prepare($sql));
					include("cupons_list.php");						   
				break; 						   
         case "list" :  
				include("cupons_list.php");
				break; 
      
	     default :  
		       include("cupons_list.php");
				break;          
	   }
?>
