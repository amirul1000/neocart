<b><?=ucwords(str_replace("_"," ","items"))?></b><br />
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="admin.php?page=items&cmd=list" class="nav3">List</a>
	 <form name="frm_wp_wp_items" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
             <tr>
                 <td valign="top">orders_id</td>
                 <td>
                    <input type="text" name="orders_id" id="orders_id"  value="<?=$orders_id?>" class="textbox">
                 </td>
             </tr>
               <tr>
                 <td valign="top">os0</td>
                 <td>
                    <input type="text" name="os0" id="os0"  value="<?=$os0?>" class="textbox">
                 </td>
             </tr>
              <tr>
                 <td valign="top">os1</td>
                 <td>
                    <input type="text" name="os1" id="os1"  value="<?=$os1?>" class="textbox">
                 </td>
             </tr>
              <tr>
                 <td>item_name</td>
                 <td>
                    <input type="text" name="item_name" id="item_name"  value="<?=$item_name?>" class="textbox">
                 </td>
             </tr>
               <tr>
                 <td>item_number</td>
                 <td>
                    <input type="text" name="item_number" id="item_number"  value="<?=$item_number?>" class="textbox">
                 </td>
             </tr>
              <tr>
                 <td>quantity</td>
                 <td>
                    <input type="text" name="quantity" id="quantity"  value="<?=$quantity?>" class="textbox">
                 </td>
             </tr>
               <tr>
                 <td>amount</td>
                 <td>
                    <input type="text" name="amount" id="amount"  value="<?=$amount?>" class="textbox">
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