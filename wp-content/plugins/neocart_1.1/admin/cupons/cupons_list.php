<?=ucwords(str_replace("_"," ","cupons"))?>
</b>
<table cellspacing="3" cellpadding="3" border="0"  width="100%" class="bdr">
  <tr>
    <td><a href="admin.php?page=cupons&cmd=edit" class="nav3">Add a cupon</a>
      <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
        <tr bgcolor="#ABCAE0">
          <td>Promotion code</td>
          <td>Promotion amount</td>
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
			$table_name = $wpdb->prefix."cupons";
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
          <td><?=$arr[$i]->promotion_code?></td>
          <td><?=$arr[$i]->promotion_amount?></td>
          <td><?=$arr[$i]->status?></td>
          <td nowrap ><a href="admin.php?page=cupons&cmd=edit&id=<?=$arr[$i]->id?>" class="nav">Edit</a> |
           <a href="admin.php?page=cupons&cmd=delete&id=<?=$arr[$i]->id?>" class="nav" onClick=" return confirm('Are you sure to delete this item ?');">Delete</a> </td>
        </tr>
        <?php
				  }
				  }
		?>
        <tr>
        <tr>
          <td colspan="10" align="center">
		  <?php              
				$table_name = $wpdb->prefix."cupons";
				$sql = "SELECT * from  ".$table_name."  ORDER BY id DESC";
				
				$res =  $wpdb->get_results($sql, OBJECT);
				if($wpdb->num_rows >= 1)
				{
					$numrows = count($res);
					$maxPage = ceil($numrows/$rowsPerPage);
					$self = 'admin.php?page=cupons&cmd=list';
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
