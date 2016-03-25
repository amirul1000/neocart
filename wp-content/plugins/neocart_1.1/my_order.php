<?php
  $current_user = wp_get_current_user(); 	
  global $wpdb;
  if($_REQUEST['cmd'] == "change_status")
  {
      $table_name = $wpdb->prefix."orders";
	  $wpdb->update($table_name, 
			array(
				  'status' => $_POST['delivery_status']
				  )  ,
				   array('id'=>$_REQUEST['id'],'users_id'=>$current_user->ID)
				); 
  }
  
  if($_REQUEST['cmd'] == "items")
  {
     ?>
       <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
         <tr bgcolor="#ABCAE0">
          <td>os0</td>
          <td>os1</td>
          <td>item_name</td>
          <td>item_number</td>
          <td>quantity</td>
          <td>amount</td>
        </tr>
        <?php
            global $wpdb;			
            $table_name = $wpdb->prefix."items";
            $sql = "SELECT * from  ".$table_name." WHERE orders_id='".$_REQUEST['id']."' ORDER BY id DESC";
            $arr =  $wpdb->get_results($sql, OBJECT);
            if($wpdb->num_rows >= 1)
            {
            
             for($i=0;$i<count($arr);$i++)
             {
            
               $rowColor;
    
                if($i % 2 == 0)
                {
                    
                    $row="#C8C8C8";
                }
                else
                {
                    
                    $row="#FFFFFF";
                }
                
         ?>
        <tr>
          <td><?=$arr[$i]->os0?></td>
          <td><?=$arr[$i]->os1?></td>
          <td><?=$arr[$i]->item_name?></td>
          <td><?=$arr[$i]->item_number?></td>
          <td><?=$arr[$i]->quantity?></td>
          <td><?=$arr[$i]->amount?></td>        
         </tr>
        <?php
                  }
                  }
        ?>
        <tr>
      </table>        
     <?php
  }
  if($_REQUEST['cmd'] == "delivery")
  {
    ?>
      <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
        <tr bgcolor="#ABCAE0">
          <td>Orders id</td>
          <td>Delivery date</td>
          <td>Total amount</td>
          <td>Payment status</td>
          <td>Delivery status</td>
        </tr>
        <?php
			global $wpdb;			
			$table_name = $wpdb->prefix."recurring_deliver";
			$sql = "SELECT * from  ".$table_name." WHERE orders_id='".$_REQUEST['id']."'   ORDER BY id DESC";
			$arr =  $wpdb->get_results($sql, OBJECT);
			
			if($wpdb->num_rows >= 1)
			{
			 for($i=0;$i<count($arr);$i++)
			 {
			   $rowColor;	
				if($i % 2 == 0)
				{
					$row="#C8C8C8";
				}
				else
				{
					$row="#FFFFFF";
				}
				
		 ?>
        <tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
          <td><?=$arr[$i]->orders_id?></td>
          <td><?=date("D F j, Y",strtotime($arr[$i]->delivery_date))?></td>
          <td><?=$arr[$i]->total_amount?></td>
          <td><?=$arr[$i]->payment_status?></td>
          <td><?=$arr[$i]->delivery_status?></td>
        </tr>
        <?php
				  }
				  }
		?>
        </table>
    <?php
  }
?>
<?=ucwords(str_replace("_"," ","orders"))?>
</b>
<table cellspacing="3" cellpadding="3" border="0"  width="100%" class="bdr">
  <tr>
    <td>
      <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
        <tr bgcolor="#ABCAE0">
          <td>Shipping address</td>
          <td>Recurring</td>
          <td>Billing information</td>
          <td>Shipping cost</td>
          <td>Total amount</td>
          <td>Date Created</td>
          <td>Last delivery date</td>
          <td>Action</td>
        </tr>
        <?php
				
			$rowsPerPage = 10;
			$pageNum = 1;
			if(isset($_REQUEST['page1']))
			{
				$pageNum = $_REQUEST['page1'];
			}
			$offset = ($pageNum - 1) * $rowsPerPage; 
			global $wpdb;			
			$table_name = $wpdb->prefix."orders";
			$sql = "SELECT * from  ".$table_name." WHERE users_id='".$current_user->ID."'  ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
			
			$arr =  $wpdb->get_results($sql, OBJECT);	
			
			if($wpdb->num_rows >= 1)
			{
			 for($i=0;$i<count($arr);$i++)
			 {
			    $rowColor;
				
				if($i % 2 == 0)
				{
					$row="#C8C8C8";
				}
				else
				{
					$row="#FFFFFF";
				}
				
		 ?>
        <tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
          <td valign="top">
               <!---- Shipping address -------->
				<?php
                    global $wpdb;			
                    $table_name = $wpdb->prefix."shipping_address";
                    $sql = "SELECT * from  ".$table_name."   WHERE id='".$arr[$i]->shipping_address_id."'";
                    
                    $arr2 =  $wpdb->get_results($sql, OBJECT);	
                    
                    if($wpdb->num_rows >= 1)
                    {
                 ?>
                    First name:<?=$arr2[0]->ship_first_name?><br />
                    Last name:<?=$arr2[0]->ship_last_name?><br />
                    Adress1:<?=$arr2[0]->ship_adress1?><br />
                    Adress2:<?=$arr2[0]->ship_adress2?><br />
                    Zip code:<?=$arr2[0]->ship_zip_code?><br />
                    City:<?=$arr2[0]->ship_city?><br />
                    State:<?=$arr2[0]->ship_state?><br />
                    Country:<?=$arr2[0]->ship_country?><br />
                <?php
                         
                          }
                ?>
       
              <!---------Shipping Address/----->
          </td>
          <td valign="top">
		       <?php 
		        global $wpdb;			
				$table_name = $wpdb->prefix."recurring";
				$sql = "SELECT * from  ".$table_name."  WHERE id='".$arr[$i]->recurring_id."'";
				$arr2 =  $wpdb->get_results($sql, OBJECT);	
				if($wpdb->num_rows >= 1)
				{ 
				 ?>
				  <?=$arr2[0]->delivery_name?>
				  <?=$arr2[0]->no_days?>
				 <?php
				 }
				?> 
          </td>
          <td valign="top">
              <?php
			     global $wpdb;			
				$table_name = $wpdb->prefix."billing_information";
				$sql = "SELECT * from  ".$table_name."     WHERE id='".$arr[$i]->billing_information_id."'";
				$arr2 =  $wpdb->get_results($sql, OBJECT);	
				if($wpdb->num_rows >= 1)
				{
                ?>
                  First name:<?=$arr2[0]->first_name?><br />
                  Last name:<?=$arr2[0]->last_name?><br />
                  Country:<?=$arr2[0]->country?><br />
                  Adress1:<?=$arr2[0]->adress1?><br />
                  Adress2:<?=$arr2[0]->adress2?><br />
                  City:<?=$arr2[0]->city?><br />
                  State:<?=$arr2[0]->state?><br />
                  Zip code:<?=$arr2[0]->zip_code?><br />
                 <?php
				 }
				 ?>
          </td>
          <td valign="top"><?=$arr[$i]->shipping_cost?></td>
          <td valign="top"><?=$arr[$i]->total_amount?></td>
          <td valign="top"><?php echo date("D F j, Y",strtotime($arr[$i]->date_created))?></td>
          <td valign="top"><?php echo date("D F j, Y",strtotime($arr[$i]->last_delivery_date))?></td>
          <td valign="top"><?=$arr[$i]->status?>
               <?php 
				 $page =get_page_by_title( 'my order' );
				 $guid = $page->guid; 
               ?>
          		<form action="<?=$guid?>" method="post">
                  <select name="delivery_status">
                    <option value="active" <?php if($arr[$i]->status=="active") { echo "selected";}?>>active</option>
                    <option value="inactive" <?php if($arr[$i]->status=="inactive") { echo "selected";}?>>inactive</option>
                  </select>
                  <br />
                  <input type="hidden" name="cmd" value="change_status"/>
                  <input type="hidden" name="id" value="<?=$arr[$i]->id?>" />
                  <input type="submit" value="submit" />
              </form> 
              <br />
              <?php 
				 $page =get_page_by_title( 'my order' );
				 $guid = $page->guid; 
               ?>
              <form action="<?=$guid?>" method="post">
               <input type="hidden" name="cmd" value="items"/>
               <input type="hidden" name="id" value="<?=$arr[$i]->id?>"/>
               <input type="submit" value="Items" />
              </form>
              <?php 
				 $page =get_page_by_title( 'my order' );
				 $guid = $page->guid; 
               ?>
              <form action="<?=$guid?>" method="post">
               <input type="hidden" name="cmd" value="delivery"/>
               <input type="hidden" name="id" value="<?=$arr[$i]->id?>"/>
               <input type="submit" value="Delivery" />
              </form>
          </td>
        </tr>
        <?php
				  }
				  }
		?>
        <tr>
   </table>
   </td>
  </tr>
</table>        
