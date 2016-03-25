<b><?=ucwords(str_replace("_"," ","shipping_address"))?></b><br />
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="admin.php?page=shipping_address&cmd=list" class="nav3">List</a>
	 <form name="frm_wp_wp_shipping_address" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
            <tr>
                 <td>ship_first_name</td>
                 <td>
                    <input type="text" name="ship_first_name" id="ship_first_name"  value="<?=$ship_first_name?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td>ship_last_name</td>
                 <td>
                    <input type="text" name="ship_last_name" id="ship_last_name"  value="<?=$ship_last_name?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td>ship_adress1</td>
                 <td>
                    <input type="text" name="ship_adress1" id="ship_adress1"  value="<?=$ship_adress1?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td>ship_adress2</td>
                 <td>
                    <input type="text" name="ship_adress2" id="ship_adress2"  value="<?=$ship_adress2?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td>ship_zip_code</td>
                 <td>
                    <input type="text" name="ship_zip_code" id="ship_zip_code"  value="<?=$ship_zip_code?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td>ship_city</td>
                 <td>
                    <input type="text" name="ship_city" id="ship_city"  value="<?=$ship_city?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td>ship_state</td>
                 <td>
                    <input type="text" name="ship_state" id="ship_state"  value="<?=$ship_state?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td>ship_country</td>
                 <td>
                    <input type="text" name="ship_country" id="ship_country"  value="<?=$ship_country?>" class="textbox">
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