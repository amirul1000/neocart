<b><?=ucwords(str_replace("_"," ","orders"))?></b><br />
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="admin.php?page=orders&cmd=list" class="nav3">List</a>
	 <form name="frm_wp_wp_orders" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
             <tr>
                 <td>Users</td>
                 <td>
                    <select  name="users_id" id="users_id"  class="textbox">
                     <?php
					    global $wpdb;
						$table_name = $wpdb->prefix."users";
						$sql = "SELECT * from  ".$table_name;
						$res =  $wpdb->get_results($sql, OBJECT);
						if($wpdb->num_rows >= 1)
						{
						 foreach($res as $key=>$each)
						 {
					 ?>
                      <option value="<?=$each->id?>" <?php if($each->id == $users_id) { echo "selected"; } ?>><?=$each->user_login?></option>
                      <?php
					      }
					    }
					  ?>
                    </select>
                 </td>
             </tr>
            <tr>
                 <td valign="top">Shipping address</td>
                 <td>
                    <input type="text" name="shipping_address_id" id="shipping_address_id"  value="<?=$shipping_address_id?>" class="textbox">
                 </td>
             </tr>
            <!--   <tr>
                 <td valign="top">Recurring</td>
                 <td>
                    <input type="text" name="recurring_id" id="recurring_id"  value="<?=$recurring_id?>" class="textbox">
                 </td>
             </tr>
              <tr>
                 <td valign="top">Fast delivery date</td>
                 <td>
                    <input type="text" name="fast_delivery_date" id="fast_delivery_date"  value="<?=$fast_delivery_date?>" class="textbox">
                 </td>
             </tr>-->
             <tr>
                 <td valign="top">Promotion code</td>
                 <td>
                    <input type="text" name="promotion_code" id="promotion_code"  value="<?=$promotion_code?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td valign="top">Promotion amount</td>
                 <td>
                    <input type="text" name="promotion_amount" id="promotion_amount"  value="<?=$promotion_amount?>" class="textbox">
                 </td>
             </tr>
             <!-- <tr>
                 <td valign="top">Billing information</td>
                 <td>
                    <input type="text" name="billing_information_id" id="billing_information_id"  value="<?=$billing_information_id?>" class="textbox">
                 </td>
             </tr>-->
              <tr>
                 <td>Shipping cost</td>
                 <td>
                    <input type="text" name="shipping_cost" id="shipping_cost"  value="<?=$shipping_cost?>" class="textbox">
                 </td>
             </tr>
               <tr>
                 <td>Total amount</td>
                 <td>
                    <input type="text" name="total_amount" id="total_amount"  value="<?=$total_amount?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td>Date Created</td>
                 <td>
                    <input type="text" name="date_created" id="date_created"  value="<?=$date_created?>" class="textbox">
                 </td>
             </tr>
             <!--<tr>
                 <td>Last delivery date</td>
                 <td>
                    <input type="text" name="last_delivery_date" id="last_delivery_date"  value="<?=$last_delivery_date?>" class="textbox">
                 </td>
             </tr>-->
              <tr>
                 <td valign="top">Status</td>
                 <td>
                    <select name="status" id="status">
                      <option value="active" <?php if($status=="active") { echo "selected"; } ?>>Active</option>
                      <option value="inactive" <?php if($status=="inactive") { echo "selected"; } ?>>Inactive</option>
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