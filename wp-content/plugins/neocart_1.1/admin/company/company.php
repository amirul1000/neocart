<?php
       global $wpdb;  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
		  case 'add':
				if(empty($_REQUEST['id']))
				{    $table_name = $wpdb->prefix."company";
					 $wpdb->insert($table_name, 
							array(			  
								  'company_name' => $_POST['company_name'],
								  'company_address' => $_POST['company_address'],
								  'company_email'=>$_REQUEST['company_email'],
								  'company_phone'=>$_REQUEST['company_phone'] 
								  )
							);
				}
				else
				{
					 $table_name = $wpdb->prefix."company";
					 $wpdb->update($table_name, 
							array(					  
								  'company_name' => $_POST['company_name'],
								  'company_address' => $_POST['company_address'],
								  'company_email'=>$_REQUEST['company_email'],
								  'company_phone'=>$_REQUEST['company_phone']
								  )  ,
								   array('id'=>$_REQUEST['id'])
								); 
				}
				include("company_list.php");						   
				break;    
		case "edit": 
				    $Id = $_REQUEST['id'];
					if( !empty($_REQUEST['id'] ))
					{
						global $wpdb;
						$table_name = $wpdb->prefix."company";
						$sql = "SELECT * from  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
						$res =  $wpdb->get_results($sql, OBJECT);
						if($wpdb->num_rows === 1)
						{
							$Id        = $res[0]->id;  
							$company_name    = $res[0]->company_name;
							$company_address    = $res[0]->company_address;
							$company_email    = $res[0]->company_email;
							$company_phone    = $res[0]->company_phone;
						}
					 }
				include("company_editor.php");						  
				break;
						   
         case 'delete': 
					global $wpdb;					
				    $Id = $_REQUEST['id'];
					$table_name = $wpdb->prefix."company";
					$sql = "DELETE FROM  ".$table_name."  WHERE id='".$_REQUEST['id']."'";
					$res =   $wpdb->query($wpdb->prepare($sql));
					include("company_list.php");						   
				break; 						   
         case "list" :  
				include("company_list.php");
				break; 
      
	     default :  
		       include("company_list.php");
				break;          
	   }
?>
