<div class="tab-pane" id="tab_specification">
    <div class="form-body">
        <div class="form-group">
            <div class="col-md-12">
                <?php
                 $size = get_post_meta($post->ID, 'size', true);
                 if(isset($size))
                 {
                   $arrsize = explode(",",$size);
                 }
                ?>
              <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Size
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                          <script src="<?php echo PLUGIN_URL;?>/assets/custom/js/jquery.js"></script>
                          <script language="javascript">
                            $( document ).ready(function() {  
                                                          
                                /*$('#checkAll').click(function(event) { 
                                            if(this.checked) { 
                                            
                                           
                                                $('.check').each(function() {
                                                    str = "#"+this.id.toString();
                                                    $(str).attr('checked',true);
                                                });
                                            }else{
                                                $('.check').each(function() { 
                                                    str = "#"+this.id.toString();
                                                
                                                    $(str).removeAttr('checked');          
                                                });         
                                            }
                                        });*/
                                        
                                ///set data		
                                var price = $("#price").val();	
                                var discount = $("#discount").val();	
                                var width = $("#width").val();	
                                var height = $("#height").val();	
                                var length = $("#length").val();
                                    
                                $('#check_s').click(function(event) {  
                                        if(this.checked) { 
                                               $("#s_price").val(price);	
                                               $("#s_discount").val(discount);	
                                               $("#s_width").val(width);	
                                               $("#s_height").val(height);	
                                               $("#s_length").val(length);	
                                        }else{
                                                $("#s_price").val("");	
                                                $("#s_discount").val("");	
                                                $("#s_width").val("");	
                                                $("#s_height").val("");	
                                                $("#s_length").val("");	
                                        }
                                    });	
                                    
                                $('#check_m').click(function(event) {  
                                        if(this.checked) { 
                                               $("#m_price").val(price);	
                                               $("#m_discount").val(discount);	
                                               $("#m_width").val(width);	
                                               $("#m_height").val(height);	
                                               $("#m_length").val(length);	
                                        }else{
                                                $("#m_price").val("");	
                                                $("#m_discount").val("");	
                                                $("#m_width").val("");	
                                                $("#m_height").val("");	
                                                $("#m_length").val("");	
                                        }
                                    });	
                                    
                                $('#check_l').click(function(event) {  
                                            if(this.checked) { 
                                                   $("#l_price").val(price);	
                                                   $("#l_discount").val(discount);	
                                                   $("#l_width").val(width);	
                                                   $("#l_height").val(height);	
                                                   $("#l_length").val(length);	
                                            }else{
                                                    $("#l_price").val("");	
                                                    $("#l_discount").val("");	
                                                    $("#l_width").val("");	
                                                    $("#l_height").val("");	
                                                    $("#l_length").val("");	
                                            }
                                        });						
                                $('#check_xl').click(function(event) {  
                                            if(this.checked) { 
                                                   $("#xl_price").val(price);	
                                                   $("#xl_discount").val(discount);	
                                                   $("#xl_width").val(width);	
                                                   $("#xl_height").val(height);	
                                                   $("#xl_length").val(length);	
                                            }else{
                                                    $("#xl_price").val("");	
                                                    $("#xl_discount").val("");	
                                                    $("#xl_width").val("");	
                                                    $("#xl_height").val("");	
                                                    $("#xl_length").val("");	
                                            }
                                        });		
                                        
                                $('#check_xxl').click(function(event) {  
                                            if(this.checked) { 
                                                   $("#xxl_price").val(price);	
                                                   $("#xxl_discount").val(discount);	
                                                   $("#xxl_width").val(width);	
                                                   $("#xxl_height").val(height);	
                                                   $("#xxl_length").val(length);	
                                            }else{
                                                    $("#xxl_price").val("");	
                                                    $("#xxl_discount").val("");	
                                                    $("#xxl_width").val("");	
                                                    $("#xxl_height").val("");	
                                                    $("#xxl_length").val("");	
                                            }
                                        });						
                                                
                                $('#check_xxxl').click(function(event) {  
                                            if(this.checked) { 
                                                   $("#xxxl_price").val(price);	
                                                   $("#xxxl_discount").val(discount);	
                                                   $("#xxxl_width").val(width);	
                                                   $("#xxxl_height").val(height);	
                                                   $("#xxxl_length").val(length);	
                                            }else{
                                                    $("#xxxl_price").val("");	
                                                    $("#xxxl_discount").val("");	
                                                    $("#xxxl_width").val("");	
                                                    $("#xxxl_height").val("");	
                                                    $("#xxxl_length").val("");	
                                            }
                                        });				
                                        
                            });
                          </script>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                     #
                                </th>
                                <th>
                                     <!--<input type="checkbox" name="checkAll" id="checkAll" />-->
                                </th>
                                <th>
                                     PRICE
                                </th>
                                <th>
                                     DISCOUNT
                                </th>
                                <th>
                                     WIDTH
                                </th>
                                <th>
                                     HEIGHT
                                </th>
                                <th>
                                     LENGTH
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    S
                                </td>
                                <td>
                                     <input  type="checkbox" name="size[]" id="check_s" value="S" <?php if(is_array($arrsize) && in_array("S",$arrsize)){ echo "checked";}?>   class="check">
                                </td>
                                <td>
                                     <input type="number"  name="s_price" id="s_price" value="<?php echo get_post_meta($post->ID, 's_price', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Price">
                                </td>
                                <td>
                                     <input type="number"  name="s_discount" id="s_discount" value="<?php echo get_post_meta($post->ID, 's_discount', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Discount">
                                </td>
                                <td>
                                     <input type="number"  name="s_width" id="s_width" value="<?php echo get_post_meta($post->ID, 's_width', true); ?>" placeholder="Width">
                                </td>
                                <td>
                                     <input type="number"  name="s_height" id="s_height" value="<?php echo get_post_meta($post->ID, 's_height', true); ?>" placeholder="Height">
                                </td>
                                <td>
                                     <input type="number"  name="s_length" id="s_length" value="<?php echo get_post_meta($post->ID, 's_length', true); ?>" placeholder="Length">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    M
                                </td>
                                <td>
                                     <input  type="checkbox" name="size[]" id="check_m"  value="M" <?php if(is_array($arrsize) && in_array("M",$arrsize)){ echo "checked";}?>   class="check">
                                </td>
                                <td>
                                     <input type="number"  name="m_price" id="m_price" value="<?php echo get_post_meta($post->ID, 'm_price', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Price">
                                </td>
                                <td>
                                     <input type="number"  name="m_discount" id="m_discount" value="<?php echo get_post_meta($post->ID, 'm_discount', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Discount">
                                </td>
                                <td>
                                     <input type="number"  name="m_width" id="m_width" value="<?php echo get_post_meta($post->ID, 'm_width', true); ?>" placeholder="Width">
                                </td>
                                <td>
                                     <input type="number"  name="m_height" id="m_height" value="<?php echo get_post_meta($post->ID, 'm_height', true); ?>" placeholder="Height">
                                </td>
                                <td>
                                     <input type="number"  name="m_length" id="m_length" value="<?php echo get_post_meta($post->ID, 'm_length', true); ?>" placeholder="Length">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    L
                                </td>
                                <td>
                                     <input  type="checkbox" name="size[]" id="check_l"  value="L" <?php if(is_array($arrsize) && in_array("L",$arrsize)){ echo "checked";}?>   class="check">
                                </td>
                                <td>
                                     <input type="number"  name="l_price" id="l_price" value="<?php echo get_post_meta($post->ID, 'l_price', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Price">
                                </td>
                                <td>
                                     <input type="number"  name="l_discount" id="l_discount" value="<?php echo get_post_meta($post->ID, 'l_discount', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Discount">
                                </td>
                                <td>
                                     <input type="number"  name="l_width" id="l_width" value="<?php echo get_post_meta($post->ID, 'l_width', true); ?>" placeholder="Width">
                                </td>
                                <td>
                                     <input type="number"  name="l_height" id="l_height" value="<?php echo get_post_meta($post->ID, 'l_height', true); ?>" placeholder="Height">
                                </td>
                                <td>
                                     <input type="number"  name="l_length" id="l_length" value="<?php echo get_post_meta($post->ID, 'l_length', true); ?>" placeholder="Length">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    XL
                                </td>
                                <td>
                                     <input  type="checkbox" name="size[]"  id="check_xl" value="XL" <?php if(is_array($arrsize) && in_array("XL",$arrsize)){ echo "checked";}?>   class="check">
                                </td>
                                <td>
                                     <input type="number"  name="xl_price" id="xl_price" value="<?php echo get_post_meta($post->ID, 'xl_price', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Price">
                                </td>
                                <td>
                                     <input type="number"  name="xl_discount" id="xl_discount" value="<?php echo get_post_meta($post->ID, 'xl_discount', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Discount">
                                </td>
                                <td>
                                     <input type="number"  name="xl_width" id="xl_width" value="<?php echo get_post_meta($post->ID, 'xl_width', true); ?>" placeholder="Width">
                                </td>
                                <td>
                                     <input type="number"  name="xl_height" id="xl_height" value="<?php echo get_post_meta($post->ID, 'xl_height', true); ?>" placeholder="Height">
                                </td>
                                <td>
                                     <input type="number"  name="xl_length" id="xl_length" value="<?php echo get_post_meta($post->ID, 'xl_length', true); ?>" placeholder="Length">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    XXL
                                </td>
                                <td>
                                     <input  type="checkbox" name="size[]"  id="check_xxl"  value="XXL" <?php if(is_array($arrsize) && in_array("XXL",$arrsize)){ echo "checked";}?>   class="check">
                                </td>
                                <td>
                                     <input type="number"  name="xxl_price" id="xxl_price" value="<?php echo get_post_meta($post->ID, 'xxl_price', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Price">
                                </td>
                                <td>
                                     <input type="number"  name="xxl_discount" id="xxl_discount" value="<?php echo get_post_meta($post->ID, 'xxl_discount', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Discount">
                                </td>
                                <td>
                                     <input type="number"  name="xxl_width" id="xxl_width" value="<?php echo get_post_meta($post->ID, 'xxl_width', true); ?>" placeholder="Width">
                                </td>
                                <td>
                                     <input type="number"  name="xxl_height" id="xxl_height" value="<?php echo get_post_meta($post->ID, 'xxl_height', true); ?>" placeholder="Height">
                                </td>
                                <td>
                                     <input type="number"  name="xxl_length" id="xxl_length" value="<?php echo get_post_meta($post->ID, 'xxl_length', true); ?>" placeholder="Length">
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    XXXL
                                </td>
                                <td>
                                     <input  type="checkbox" name="size[]" id="check_xxxl"  value="XXXL" <?php if(is_array($arrsize) && in_array("XXL",$arrsize)){ echo "checked";}?>   class="check">
                                </td>
                                <td>
                                     <input type="number"  name="xxxl_price" id="xxxl_price" value="<?php echo get_post_meta($post->ID, 'xxxl_price', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Price">
                                </td>
                                <td>
                                     <input type="number"  name="xxxl_discount" id="xxxl_discount" value="<?php echo get_post_meta($post->ID, 'xxxl_discount', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Discount">
                                </td>
                                <td>
                                     <input type="number"  name="xxxl_width" id="xxxl_width" value="<?php echo get_post_meta($post->ID, 'xxxl_width', true); ?>" placeholder="Width">
                                </td>
                                <td>
                                     <input type="number"  name="xxxl_height" id="xxxl_height" value="<?php echo get_post_meta($post->ID, 'xxxl_height', true); ?>" placeholder="Height">
                                </td>
                                <td>
                                     <input type="number"  name="xxxl_length" id="xxxl_length" value="<?php echo get_post_meta($post->ID, 'xxxl_length', true); ?>" placeholder="Length">
                                </td>
                            </tr> 
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
           
            </div>
        </div> 
      
       
                                              
        <div class="form-group">
            <label class="col-md-2 control-label">Tax Class: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                 <?php
                    $tax_class = get_post_meta($post->ID, 'tax_class', true);
                ?>
                <select  name="tax_class">
                    <option value="">Select...</option>
                    <option value="None" <?php if($tax_class=="None"){ echo "selected";}?>>None</option>
                    <option value="Taxable Goods" <?php if($tax_class=="Taxable Goods"){ echo "selected";}?>>Taxable Goods</option>
                    <option value="Shipping" <?php if($tax_class=="Shipping"){ echo "selected";}?>>Shipping</option>
                    <option value="USA" <?php if($tax_class=="USA"){ echo "selected";}?>>USA</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Available Date: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <div class="input-group input-large date-picker input-daterange">
                    <input   type="text"  name="available_from" id="datetimepicker1"  value="<?php echo get_post_meta($post->ID, 'available_from', true); ?>" class="datetimepicker" >
                    <span class="input-group-addon">
                    to </span>
                    <input   type="text"  name="available_to" id="datetimepicker2" value="<?php echo get_post_meta($post->ID, 'available_to', true); ?>" class="datetimepicker">
                </div>
                <span class="help-block">
                availability daterange. </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">In Stock: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="number"  name="in_stock" value="<?php echo get_post_meta($post->ID, 'in_stock', true); ?>" placeholder="">
            </div>
        </div>  
        <div class="form-group">
            <label class="col-md-2 control-label">Status: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <?php
                    $publish_status = get_post_meta($post->ID, 'publish_status', true);
                ?>
                <select  name="publish_status">
                    <option value="">Select...</option>
                    <option value="1" <?php if($publish_status==1){ echo "selected";}?>>Published</option>
                    <option value="0" <?php if($publish_status==0){ echo "selected";}?>>Not Published</option>
                </select>
            </div>
        </div>
    </div>
</div>
<script>
	
	$('#datetimepicker1').datetimepicker({
	dayOfWeekStart : 1,
	lang:'en',
	disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
	startDate:	'<?=date("Y/m/d")?>'
	});
	
	$('#datetimepicker2').datetimepicker({
	dayOfWeekStart : 1,
	lang:'en',
	disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
	startDate:	'<?=date("Y/m/d")?>'
	});
	//$('#datetimepicker1').datetimepicker({value:'2015/04/15 05:03',step:10});
	
	$('.some_class').datetimepicker();
	
</script>
