<b><?=ucwords(str_replace("_"," ","company"))?></b><br />
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="admin.php?page=company&cmd=list" class="nav3">List</a>
	 <form name="frm_wp_wp_company" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
              <tr>
                 <td>company_name</td>
                 <td>
                    <input type="text" name="company_name" id="company_name"  value="<?=$company_name?>" class="textbox">
                 </td>
             </tr>
               <tr>
                 <td>company_address</td>
                 <td>
                    <input type="text" name="company_address" id="company_address"  value="<?=$company_address?>" class="textbox">
                 </td>
             </tr>
             <tr>
                 <td>company_email</td>
                 <td>
                    <input type="text" name="company_email" id="company_email"  value="<?=$company_email?>" class="textbox">
                 </td>
             </tr>
               <tr>
                 <td>company_phone</td>
                 <td>
                    <input type="text" name="company_phone" id="company_phone"  value="<?=$company_phone?>" class="textbox">
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