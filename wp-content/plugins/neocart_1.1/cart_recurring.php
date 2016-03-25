<table>
      <tr>
        <td>
           <h3>Recurring</h3>
           <select  name="recurring_id"  id="recurring_id">
             <?php
				global $wpdb;			
				$table_name = $wpdb->prefix."recurring";
				$sql = "SELECT * from  ".$table_name;
				$arr =  $wpdb->get_results($sql, OBJECT);	
			    if($wpdb->num_rows >= 1)
				{
				 for($i=0;$i<count($arr);$i++)
				 {
			 ?>
               <option value="<?=$arr[$i]->id?>"><?=$arr[$i]->delivery_name?></option>
             <?php
			     }
			   }
			 ?>
           </select>
        </td>
      </tr>
   </table>