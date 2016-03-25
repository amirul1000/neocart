<b><?=ucwords(str_replace("_"," ","orders"))?></b>
<br />
<!--[N.B. each friday cron tab link  wp-content/plugins/neocart/cron_recurring_bill.php]-->
<table cellspacing="3" cellpadding="3" border="0"  width="100%" class="bdr">
  <tr>
    <td><a href="admin.php?page=orders&cmd=edit" class="nav3">Add a order</a>
      <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
        <tr bgcolor="#ABCAE0">
          <td>Users</td>
          <td>Shipping address</td>
          <td>promotion code</td>
          <td>Promotion amount</td>
          <td>Shipping cost</td>
          <td>Total amount</td>
          <td>Date Created</td>
          <td>Status</td>
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
			$sql = "SELECT * from  ".$table_name."   ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
			
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
          <td valign="top"><?php
				  $user_info = get_userdata($arr[$i]->users_id);
				  echo 'Username: ' . $user_info->user_login . "<br>";
				  echo 'User level: ' . $user_info->user_level . "<br>";
				  echo 'User ID: ' . $user_info->ID . "<br>";
			  ?>
          </td>
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
          <td valign="top"><?=$arr[$i]->promotion_code?></td>
          <td valign="top"><?=$arr[$i]->promotion_amount?></td>
          <td valign="top"><?=$arr[$i]->shipping_cost?></td>
          <td valign="top"><?php echo $arr[$i]->total_amount-$arr[$i]->promotion_amount;?></td>
          <td valign="top"><?php echo date("D F j, Y",strtotime($arr[$i]->date_created))?></td>
          <td valign="top"><?=$arr[$i]->status?></td>
          <td nowrap valign="top" >
            <a href="admin.php?page=orders&cmd=edit&id=<?=$arr[$i]->id?>" class="nav">Edit</a> |<br />
            <a href="javascript:void();" onclick="window.open('admin.php?page=orders&cmd=items&id=<?=$arr[$i]->id?>','name','height=400,width=650');" class="nav">View Items</a> |<br />
            <!--<a href="javascript:void();" onclick="window.open('admin.php?page=orders&cmd=recurring_deliver&id=<?=$arr[$i]->id?>','name','height=400,width=650');" class="nav">Delivery</a> |<br />-->		
            <a href="admin.php?page=orders&cmd=delete&id=<?=$arr[$i]->id?>" class="nav" onClick=" return confirm('Are you sure to delete this item ?');">Delete</a>
          </td>
        </tr>
        <?php
				  }
				  }
		?>
        <tr>
        <tr>
          <td colspan="10" align="center">
		  <?php              
				$table_name = $wpdb->prefix."orders";
				$sql = "SELECT * from  ".$table_name."  ORDER BY id DESC";
				
				$res =  $wpdb->get_results($sql, OBJECT);
				if($wpdb->num_rows >= 1)
				{
					$numrows = count($res);
					$maxPage = ceil($numrows/$rowsPerPage);
					$self = 'admin.php?page=orders&cmd=list';
					$nav  = '';
					
					$start    = ceil($pageNum/5)*5-5+1;
					$end      = ceil($pageNum/5)*5;
					
					if($maxPage<$end)
					{
					  $end  = $maxPage;
					}
					
					for($page = $start; $page <= $end; $page++)
					//for($page = 1; $page <= $maxPage; $page++)
					{
						if ($page == $pageNum)
						{
							$nav .= " $page "; 
						}
						else
						{
							$link = "$self&&page1=$page";
							$nav .= " <a href=\"$link\" style=\"color:#6600FF\">$page</a> ";
						} 
					}
					if ($pageNum > 1)
					{
						$page  = $pageNum - 1;
						$link = "$self&&page1=$page";
						$prev  = " <a href=\"$link\" style=\"color:#6600FF\">[Prev]</a> ";
						$link = "$self&&page1=1";
					   $first = " <a href=\"$link\" style=\"color:#6600FF\">[First Page]</a> ";
					} 
					else
					{
						$prev  = '&nbsp;'; 
						$first = '&nbsp;'; 
					}
				
					if ($pageNum < $maxPage)
					{
						$page = $pageNum + 1;
						$link = "$self&&page1=$page";
						$next = " <a href=\"$link\" style=\"color:#6600FF\">[Next]</a> ";
						$link = "$self&&page1=$maxPage";
						$last = " <a href=\"$link\" style=\"color:#6600FF\">[Last Page]</a> ";
					} 
					else
					{
						$next = '&nbsp;'; 
						$last = '&nbsp;'; 
					}
					
					if($numrows>1)
					{
					  echo $first . $prev . $nav . $next . $last;
					}
				 }	
			?>
          </td>
        </tr>
   </table>
   </td>
  </tr>
</table>        
