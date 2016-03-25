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