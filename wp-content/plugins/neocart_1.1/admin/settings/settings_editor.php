<b><?=ucwords(str_replace("_"," ","settings"))?></b><br />
<?php
    global $wpdb;			
	$table_name = $prefix."settings";
	$sql = "SELECT * from  ".$table_name;
	$arr =  $wpdb->get_results($sql, OBJECT);
	if($wpdb->num_rows >= 1)
	{
		 for($i=0;$i<count($arr);$i++)
		 {
			  $Id = $arr[$i]->id;
			  $paypal_business = $arr[$i]->paypal_business;
			  $paypal_live_url = $arr[$i]->paypal_live_url;
			  $paypal_sandbox_url = $arr[$i]->paypal_sandbox_url;
			  $paypal_return_url = $arr[$i]->paypal_return_url;
			  $paypal_cancel_url = $arr[$i]->paypal_cancel_url;
			  $paypal_shopping_url = $arr[$i]->paypal_shopping_url;
			  $paypal_notify_url = $arr[$i]->paypal_notify_url;
			  $paypal_status = $arr[$i]->paypal_status;
			  $recurring_visiblity_status = $arr[$i]->recurring_visiblity_status;
			  $shipping_visiblity_status = $arr[$i]->shipping_visiblity_status;
			  $paypal_pro_visiblity_status = $arr[$i]->paypal_pro_visiblity_status;
			  $enable_paypal_api = $arr[0]->enable_paypal_api;
	          $enable_paypal_pro_api  = $arr[0]->enable_paypal_pro_api;
		}
	}	  
?>
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="admin.php?page=settings&cmd=list" class="nav3">List</a>
	 <form name="frm_wp_wp_settings" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
              
             <tr>
                 <td>Paypal business</td>
                 <td>
                    <input type="text" name="paypal_business" id="paypal_business"  value="<?=$paypal_business?>" style="width:300px;">
                 </td>
             </tr>
              <tr>
                 <td>Paypal live url</td>
                 <td>
                    <input type="text" name="paypal_live_url" id="paypal_live_url"  value="<?=$paypal_live_url?>" style="width:300px;">
                 </td>
             </tr>
             <tr>
                 <td>Paypal sandbox url</td>
                 <td>
                    <input type="text" name="paypal_sandbox_url" id="paypal_sandbox_url"  value="<?=$paypal_sandbox_url?>" style="width:300px;">
                 </td>
             </tr>
              <tr>
                 <td>Paypal return url</td>
                 <td>
                    <input type="text" name="paypal_return_url" id="paypal_return_url"  value="<?=$paypal_return_url?>" style="width:300px;">
                 </td>
             </tr>
             <tr>
                 <td>Paypal cancel url</td>
                 <td>
                    <input type="text" name="paypal_cancel_url" id="paypal_cancel_url"  value="<?=$paypal_cancel_url?>" style="width:300px;">
                 </td>
             </tr>
              <tr>
                 <td>Paypal shopping url</td>
                 <td>
                    <input type="text" name="paypal_shopping_url" id="paypal_shopping_url"  value="<?=$paypal_shopping_url?>" style="width:300px;">
                 </td>
             </tr>
             <tr>
                 <td>Paypal notify url</td>
                 <td>
                    <input type="text" name="paypal_notify_url" id="paypal_notify_url"  value="<?=$paypal_notify_url?>" style="width:300px;">
                 </td>
             </tr>
              <tr>
                 <td>Paypal status</td>
                 <td>
                    <select name="paypal_status" id="paypal_status">
                        <option value="live" <?php if($paypal_status=="live"){ echo "selected";}?>>live</option>
                        <option value="sandbox" <?php if($paypal_status=="sandbox"){ echo "selected";}?>>sandbox</option>
                    </select>
                 </td>
             </tr>
             <!-- <tr>
                 <td>Recurring visiblity status</td>
                 <td>
                    <select name="recurring_visiblity_status" id="recurring_visiblity_status">
                        <option value="yes" <?php if($recurring_visiblity_status=="yes"){ echo "selected";}?>>yes</option>
                        <option value="no" <?php if($recurring_visiblity_status=="no"){ echo "selected";}?>>no</option>
                    </select>
                 </td>
             </tr>-->
             <tr>
                 <td>Shipping visiblity status</td>
                 <td>
                    <select name="shipping_visiblity_status" id="shipping_visiblity_status">
                        <option value="yes" <?php if($shipping_visiblity_status=="yes"){ echo "selected";}?>>yes</option>
                        <option value="no" <?php if($shipping_visiblity_status=="no"){ echo "selected";}?>>no</option>
                    </select>
                 </td>
             </tr>
             <tr>
                 <td>Paypal pro visiblity status</td>
                 <td>
                    <select name="paypal_pro_visiblity_status" id="paypal_pro_visiblity_status">
                        <option value="yes" <?php if($paypal_pro_visiblity_status=="yes"){ echo "selected";}?>>yes</option>
                        <option value="no" <?php if($paypal_pro_visiblity_status=="no"){ echo "selected";}?>>no</option>
                    </select>
                 </td>
             </tr>
             <tr>
                 <td>Enable paypal api</td>
                 <td>
                    <select name="enable_paypal_api" id="enable_paypal_api">
                        <option value="yes" <?php if($enable_paypal_api=="yes"){ echo "selected";}?>>yes</option>
                        <option value="no" <?php if($enable_paypal_api=="no"){ echo "selected";}?>>no</option>
                    </select>
                 </td>
             </tr>
             <tr>
                 <td>Enable paypal pro api</td>
                 <td>
                    <select name="enable_paypal_pro_api" id="enable_paypal_pro_api">
                        <option value="yes" <?php if($enable_paypal_pro_api=="yes"){ echo "selected";}?>>yes</option>
                        <option value="no" <?php if($enable_paypal_pro_api=="no"){ echo "selected";}?>>no</option>
                    </select>
                 </td>
             </tr>
             <tr> 
                 <td align="right"></td>
                 <td>
                    <input type="hidden" name="cmd" value="add">
                    <input type="hidden" name="id" value="<?=$Id?>">			
                    <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
                 </td>     
             </tr>
		</table>
	</form>
  </td>
 </tr>
</table>