<?php

class AddtoCart{

     
     function add()
     {
       				  if(count($_SESSION['cart'])==1)
					      {   
					       unset($_SESSION['cart']); 
				         }
				         
						   $count = count($_SESSION['cart']);
						   $flag= true;
						   for($i=0;$i<$count;$i++)
						   {
							 //add 
							 if($_REQUEST['item_number']==$_SESSION['cart'][$i]['item_number']  && $_REQUEST['item_name']==$_SESSION['cart'][$i]['item_name'])
							 {
							   $_SESSION['cart'][$i]['quantity'] = $_SESSION['cart'][$i]['quantity'];
							   $flag = false;
							   break;	 
							 }
						  }
						  
						  if($flag==true)
						  {
								$_SESSION['cart'][$count]['os0']= $_REQUEST['os0'];
								$_SESSION['cart'][$count]['os1']= $_REQUEST['os1'];
								$_SESSION['cart'][$count]['item_name']= $_REQUEST['item_name'];
								$_SESSION['cart'][$count]['item_number']= $_REQUEST['item_number'];
								$_SESSION['cart'][$count]['quantity']= $_REQUEST['quantity'];	
								$_SESSION['cart'][$count]['amount']= $_REQUEST['amount'];					
						  }                
     }

  function remove()
  {
    					 $removeflag = false;
				       $count = count($_SESSION['cart']);					   
					   for($i=0;$i<$count;$i++)
					   {					     
					     if($_REQUEST['item_number']==$_SESSION['cart'][$i]['item_number']  && $_REQUEST['item_name']==$_SESSION['cart'][$i]['item_name'])
						  {
						    $remove_position=$i;
						    $removeflag = true;
						    break;
						  }
					  }
					  if($removeflag == true)
					  {
					  for($i=$remove_position;$i<$count-1;$i++)
					   {
					   	$_SESSION['cart'][$i]['os0']= $_SESSION['cart'][$i+1]['os0'];
							$_SESSION['cart'][$i]['os1']= $_SESSION['cart'][$i+1]['os1'];
							$_SESSION['cart'][$i]['item_name']=$_SESSION['cart'][$i+1]['item_name'];
							$_SESSION['cart'][$i]['item_number']= $_SESSION['cart'][$i+1]['item_number'];
							$_SESSION['cart'][$i]['quantity']=$_SESSION['cart'][$i+1]['quantity'];
							$_SESSION['cart'][$i]['amount']=$_SESSION['cart'][$i+1]['amount'];
					   } 
					   unset($_SESSION['cart'][$i]);
					   }
  }

}
 
?>					