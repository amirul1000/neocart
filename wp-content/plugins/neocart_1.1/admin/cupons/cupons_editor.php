<b><?=ucwords(str_replace("_"," ","cupons"))?></b><br />
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="admin.php?page=cupons&cmd=list" class="nav3">List</a>
	 <form name="frm_wp_wp_cupons" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
              <tr>
                 <td>Promotion code</td>
                 <td>
                    <input type="text" name="promotion_code" id="promotion_code"  value="<?=$promotion_code?>" class="textbox">
                 </td>
             </tr>
               <tr>
                 <td>Promotion amount</td>
                 <td>
                    <input type="text" name="promotion_amount" id="promotion_amount"  value="<?=$promotion_amount?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td valign="top">Status</td>
                 <td>
                    <select name="status" id="status">
                      <option value="unused" <?php if($status=="unused") { echo "selected"; } ?>>Unused</option>
                      <option value="used" <?php if($status=="used") { echo "selected"; } ?>>Used</option>
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