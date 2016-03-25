<?=ucwords(str_replace("_"," ","recurring_deliver"))?>
</b>
<table cellspacing="3" cellpadding="3" border="0"  width="100%" class="bdr">
  <tr>
    <td>
      <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
        <tr bgcolor="#ABCAE0">
          <td>Orders id</td>
          <td>Delivery date</td>
          <td>Total amount</td>
          <td>Payment status</td>
          <td>Delivery status</td>
          <!--<td>Action</td>-->
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
			$table_name = $wpdb->prefix."recurring_deliver";
			$sql = "SELECT * from  ".$table_name." WHERE orders_id='".$_REQUEST['id']."'   ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
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
          <td>
              <form action="" method="post">
                  <select name="delivery_status">
                    <option value="pending" <?php if($arr[$i]->delivery_status=="pending") { echo "selected";}?>>pending</option>
                    <option value="completed" <?php if($arr[$i]->delivery_status=="completed") { echo "selected";}?>>completed</option>
                  </select>
                  <br />
                  <input type="hidden" name="cmd" value="change_delivery_status"/>
                  <input type="hidden" name="orders_id" value="<?=$arr[$i]->orders_id?>" />
                  <input type="hidden" name="id" value="<?=$arr[$i]->id?>" />
                  <input type="submit" value="submit" />
              </form> 
          </td>
          <!--<td nowrap ><a href="admin.php?page=recurring_deliver&cmd=edit&id=<?=$arr[$i]->id?>" class="nav">Edit</a> |
           <a href="admin.php?page=recurring_deliver&cmd=delete&id=<?=$arr[$i]->id?>" class="nav" onClick=" return confirm('Are you sure to delete this item ?');">Delete</a> 
          </td>-->
        </tr>
        <?php
				  }
				  }
		?>
        <tr>
        <tr>
          <td colspan="10" align="center">
		  <?php              
				$table_name = $prefix."recurring_deliver";
				$sql = "SELECT * from  ".$table_name."  WHERE orders_id='".$_REQUEST['id']."'  ORDER BY id DESC";
				
				$res =  $wpdb->get_results($sql, OBJECT);
				if($wpdb->num_rows >= 1)
				{
					$numrows = count($res);
					$maxPage = ceil($numrows/$rowsPerPage);
					$self = 'admin.php?page=orders&cmd=recurring_deliver&id='.$_REQUEST['id'];
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
