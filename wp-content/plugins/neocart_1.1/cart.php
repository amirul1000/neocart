<?php 
    include("paypal_pro.lib.php");
	
    //get settings data
    global $wpdb;			
	$table_name = $wpdb->prefix."settings";
	$sql = "SELECT * from  ".$table_name;
	$arr =  $wpdb->get_results($sql, OBJECT);
	if($wpdb->num_rows >= 1)
	{
	   $paypal_business = $arr[0]->paypal_business;
	   $paypal_live_url = $arr[0]->paypal_live_url;
	   $paypal_sandbox_url = $arr[0]->paypal_sandbox_url;
	   $paypal_return_url = $arr[0]->paypal_return_url;
	   $paypal_cancel_url = $arr[0]->paypal_cancel_url;
	   $paypal_shopping_url = $arr[0]->paypal_shopping_url;
	   $paypal_notify_url = $arr[0]->paypal_notify_url;
	   $paypal_status = $arr[0]->paypal_status;
	   //$recurring_visiblity_status = $arr[0]->recurring_visiblity_status;
	   $shipping_visiblity_status = $arr[0]->shipping_visiblity_status;
	   $paypal_pro_visiblity_status = $arr[0]->paypal_pro_visiblity_status;
  	   $enable_paypal_api = $arr[0]->enable_paypal_api;
	   $enable_paypal_pro_api  = $arr[0]->enable_paypal_pro_api;
		if($paypal_status=="live")
		{
		   $api = $paypal_live_url;
		}
		if($paypal_status=="sandbox")
		{
		  $api = $paypal_sandbox_url;
		}
	}
	//paypal pro transaction
	if($_POST['cmd']=="order")
	{  
	    global $httptrnsaction;
		
		
		
	   if(card_payment_submit()==true)
	   {
	      if($httptrnsaction['ACK']=="Success")
		  {
		    $TRANSACTIONID = $httptrnsaction['TRANSACTIONID'];
			include("cart_add.lib.php");
			echo " <font color=\"red\">Order has been submitted successfully</font>";
			unset($_SESSION['cart']);	
			unset($_SESSION['promotion_amount']);
			unset($_SESSION['promotion_code']);
		  }
	   }
	   else
	    {
		   echo "Please fix your credit card and billing information <br>
			       <font color=\"red\">".str_replace("%2e"," ",str_replace("%20"," ",$httptrnsaction['L_LONGMESSAGE0']))."</font>";
			 
		 }
	}	
?>
<div id="main-content">   
                  <?php		
				   
				   if(empty($_SESSION['trackid']))
					{
					  $_SESSION['trackid']=md5(rand(10000,99999999).rand(10000,99999999));
					}
				   //Update Quantity at cart
				   if($_REQUEST['update']=="update")
				   {
				   
				       $count = count($_SESSION['cart']);					   
					   for($i=0;$i<$count;$i++)
					   {
					     
					     if($_REQUEST['item_number']==$_SESSION['cart'][$i]['item_number']  && $_REQUEST['item_name']==$_SESSION['cart'][$i]['item_name'])
						 {
						   if(is_numeric($_REQUEST['quantity'])&&$_REQUEST['quantity']>0)
						   $_SESSION['cart'][$i]['quantity'] =$_REQUEST['quantity'];
						   break;	 
						 }
					  }				      
				   }
				   //Remove item from cart
				    if($_REQUEST['remove']=="remove")
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
				   
				   if($_POST['add_to_cart']=="Add to cart")
				   {   
				      
					  $count = count($_SESSION['cart']);
					   $flag= true;
					   for($i=0;$i<$count;$i++)
					   {
					     
					     if($_REQUEST['item_number']==$_SESSION['cart'][$i]['item_number']  && $_REQUEST['item_name']==$_SESSION['cart'][$i]['item_name'])
						 {
						   $_SESSION['cart'][$i]['quantity'] =$_SESSION['cart'][$i]['quantity']+1;
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
					
				  ?>
				  <div class="product">
				  <table cellspacing="3" cellpadding="3" class="bodytext">
				    <tr bgcolor="#33CCFF">
					    <td>Description</td>
						 <!--<td>Description2</td>-->
						 <td>Item name</td>
						 <td>Item number</td>
						 <td>Quantity</td>
						 <td>Unit Price</td>
						 <td>Amount</td>
					</tr>
					<?php
					$count = count($_SESSION['cart']);
					$total=0;
					if($count==0)
					{
				 	echo "<tr><td colspan=6>No Item in the cart</td></tr>";
					}
					else
					{
					 for($i=0;$i<$count;$i++)
					   {
					   
					   $subtotal = $_SESSION['cart'][$i]['amount']*$_SESSION['cart'][$i]['quantity'];
					   $total = $total+$subtotal;
					   
					   if($i % 2 == 0)
						{
							
							$row="#C8C8C8";
						}
						else
						{
							
							$row="#FFFFFF";
						}
					?>
					 <tr bgcolor="<?=$row?>">
					     <td valign="top"><?=$_SESSION['cart'][$i]['os0']?></td>
						 <!--<td valign="top"><?=$_SESSION['cart'][$i]['os1']?></td>-->
						 <td valign="top"><?=$_SESSION['cart'][$i]['item_name']?></td>
						 <td valign="top"><?=$_SESSION['cart'][$i]['item_number']?></td>
						 <td valign="top" nowrap>
						   <?php 
                             $page =get_page_by_title( 'cart' );
                             $guid = $page->guid; 
                            ?>     
                           <form action="<?=$guid?>" method="post">
                             <input type="text" name="quantity" value="<?=$_SESSION['cart'][$i]['quantity']?>" style="width:30px;">											
                             <input type="hidden" name="item_number" value="<?=$_SESSION['cart'][$i]['item_number']?>">
                             <input type="hidden" name="item_name" value="<?=$_SESSION['cart'][$i]['item_name']?>">
                             <input type="submit" name="update" value="update" style="width:45px;font-size:11px;">
                             <input type="submit" name="remove" value="remove" style="width:45px;font-size:11px;">
                            </form> 
						</td>
						 <td valign="top"><?=number_format($_SESSION['cart'][$i]['amount'], 2, '.', '')?></td>
						 <td valign="top">$<?=number_format($subtotal, 2, '.', '')?></td>
					</tr>
					<?php					
					}
					?>
					 <tr bgcolor="#DDFFFF">
					     <td valign="top"></td>
						 <!--<td valign="top"></td>-->
						 <td valign="top"></td>										
						 <td valign="top" colspan="3">Tax</td>
						 <td valign="top">$<?=number_format($tax, 2, '.', '')?></td>
					</tr>
					 <tr bgcolor="#DDFFFF">
					     <td valign="top"></td>
						 <!--<td valign="top"></td>-->
						 <td valign="top"></td>										
						 <td valign="top" colspan="3">Shipping Charge</td>
						 <td valign="top">$<?=number_format($shipping_charge, 2, '.', '')?></td>
					</tr>
					 <tr bgcolor="#FFFEEEE">
					     <td valign="top"></td>
						 <!--<td valign="top"></td>-->
						 <td valign="top"></td>						
						 <td valign="top" colspan="3">Total</td>
						 <td valign="top">
                         <?php
							  if($_POST['check_promotion']=="Check")
							  {
									global $wpdb;			
									$table_name = $wpdb->prefix."cupons";
									$sql = "SELECT * from  ".$table_name."  WHERE promotion_code='".$_POST['promotion_code']."' AND status='unused'";
									$arr =  $wpdb->get_results($sql, OBJECT);				
									if($wpdb->num_rows >= 1)
									{
										$_SESSION['promotion_code'] = $_POST['promotion_code'];
										$_SESSION['promotion_amount'] =$arr[0]->promotion_amount;
										if(isset($_SESSION['promotion_amount']))
			  							{
											$total = $total-$_SESSION['promotion_amount'];
										}	
									}
							  }		
                         ?>
                         $<?=number_format($total+$tax+$shipping_charge, 2, '.', '')?></td>
					</tr>
			    	<?php			
					   $_SESSION['tax'] = $tax;
					   $_SESSION['shipping_charge'] = $shipping_charge;		 
					   $_SESSION['total'] = $total+$tax+$shipping_charge;		
					}
					?>	
                    <?php
					  if($enable_paypal_api=="yes")
					  {
					?>
					<tr>
					   <td colspan="7" align="right">
					 	<form  action="<?=$api?>" method="post">
							<input type="image" src="<?=plugins_url('neocart')?>/images/btn_xpressCheckout.gif" name="submit"   class="wp_cart_checkout_button" alt="Make payments with PayPal - it's fast, free and secure!" />
							<input type="hidden" name="business" value="<?=$paypal_business?>">
							<input type="hidden" name="rm" value="2">
							<?php
							   $count = count($_SESSION['cart']);	
							   $item_name="";				
							   $item_number="";   
							   for($k=0;$k<$count;$k++)
							   {
									$on0=$_SESSION['cart'][$k]['os0'];
									$on1=$_SESSION['cart'][$k]['os1'];
									$item_name=$_SESSION['cart'][$k]['item_name'];
									$item_number=$_SESSION['cart'][$k]['item_number'];
									$quantity=$_SESSION['cart'][$k]['quantity'];
									$amount=$_SESSION['cart'][$k]['amount'];
							?>
							<input type="hidden" name="on0_<?=$k+1?>" value="<?=$on0?>">
         				    <input type="hidden" name="on1_<?=$k+1?>" value="<?=$on1?>">
							<input type="hidden" name="item_name_<?=$k+1?>" value="<?=$item_name?>">
							<input type="hidden" name="item_number_<?=$k+1?>" value="<?=$item_number?>">
							<input type="hidden" name="amount_<?=$k+1?>" value="<?=$amount?>">
							<input type="hidden" name="quantity_<?=$k+1?>" value="<?=$quantity?>" />
							<?php
							}
							?>
							<input type="hidden" name="tax_1" value="<?=$tax?>">
							<input type="hidden" name="shipping_1" value="<?=$shipping_charge?>">
							<input type="hidden" name="currency_code" value="USD">			
							<input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="upload" value="1" />
							<input type="hidden" name="mrb" value="3FWGC6LFTMTUG" />
							<input type="hidden" name="return" value="<?=$paypal_return_url?>" />
							<input type="hidden" name="shopping_url" value="<?=$paypal_shopping_url?>" />
							<input type="hidden" name="notify_url" value="<?=$paypal_notify_url?>"  />
						</form>
					   </td>
					</tr>
                    <?php
					}
					?>
				  </table>
<?php 
 $page =get_page_by_title( 'cart' );
 $guid = $page->guid; 
?> 
<form  method="post"  action="<?=$guid?>">
   <?php
      if($_POST['check_promotion']=="Check")
	  {
	        global $wpdb;			
			$table_name = $wpdb->prefix."cupons";
			$sql = "SELECT * from  ".$table_name."  WHERE promotion_code='".$_POST['promotion_code']."' AND status='unused'";
			$arr =  $wpdb->get_results($sql, OBJECT);				
			if($wpdb->num_rows >= 1)
			{			
			    echo " <font color=\"red\">Your promotion code is valid</font><br>
			           Amount:".$arr[0]->promotion_amount."<br>";
			}
			else
			{
		       echo " <font color=\"red\">Your promotion code is invalid</font><br>"; 
			}    
	  }	  
   ?>
    Promotion code
    <input type="text" name="promotion_code"  id="promotion_code" value="<?=$_POST['promotion_code']?>" />
    <input type="submit" name="check_promotion" value="Check" />  
</form>   <br /><br />  
<?php 
 $page =get_page_by_title( 'cart' );
 $guid = $page->guid; 
?>                  
<form method="post" action="<?=$guid?>">
   <!-- Fast delivery date(yy-mm-dd)
    <input type="text" name="fast_delivery_date"  id="fast_delivery_date" /> <br /><br />  --> 
    <!--Recurring-->
    <!--[N.B. for recurring option we will keep your card informtion in our databse]--> 
    <?php
       //if($recurring_visiblity_status=="yes")
      // {
        // include("cart_recurring.php"); 
       //}
    ?>
    <table>
       <tr>
         <td valign="top">
            <!--Shipping Address-->
            <?php
               if($shipping_visiblity_status=="yes")
               {
                 include("cart_shipping_address.php"); 
               }
            ?>
         </td>
         <td valign="top">
            <!--Paypal Pro-->
            <?php
               if($paypal_pro_visiblity_status=="yes")
               {
                 include("cart_paypal_pro.php"); 
               }
            ?>
          </td>
        </tr>
    </table>  
</form>                  
		</div>
    </div>