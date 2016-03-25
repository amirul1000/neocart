<div class="tab-pane active" id="tab_general">
    <div class="form-body">
        <div class="form-group">                    
         <div class="form-group">
            <label class="col-md-2 control-label">Brand: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="text"  name="brand" value="<?php echo get_post_meta($post->ID, 'brand', true); ?>" placeholder="">
            </div>
        </div> 
        <div class="form-group">
            <label class="col-md-2 control-label">Model: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="text"  name="model" value="<?php echo get_post_meta($post->ID, 'model', true); ?>" placeholder="">
            </div>
        </div> 
         <div class="form-group">
            <label class="col-md-2 control-label">Made in: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="text"  name="made_in" value="<?php echo get_post_meta($post->ID, 'made_in', true); ?>" placeholder="">
            </div>
        </div> 
        <div class="form-group">
            <label class="col-md-2 control-label">SKU: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="text"  name="sku" value="<?php echo get_post_meta($post->ID, 'sku', true); ?>" placeholder="">
            </div>
        </div> 
        <div class="form-group">
            <label class="col-md-2 control-label">COLOR: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                 <?php
                    $color = get_post_meta($post->ID, 'color', true);
                ?>
                 <select  name="color">
                    <option value="">Select...</option>
                    <option value="WHITE" <?php if($color=="WHITE"){ echo "selected";}?>>WHITE</option>
                    <option value="BLACK" <?php if($color=="BLACK"){ echo "selected";}?>>BLACK</option>
                    <option value="RED" <?php if($color=="RED"){ echo "selected";}?>>RED</option>
                    <option value="BLUE" <?php if($color=="BLUE"){ echo "selected";}?>>BLUE</option>
                    <option value="YELLOW" <?php if($color=="YELLOW"){ echo "selected";}?>>YELLOW</option>
                    <option value="GREEN" <?php if($color=="GREEN"){ echo "selected";}?>>GREEN</option>
                </select>
            </div>
        </div>  
        
        <div class="form-group">
           <label class="col-md-12 control-label">
              <code>This Price & Discount will be applicable if not entered individually at product Specification</code>
            </label>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Currency: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <?php
                    $currency = get_post_meta($post->ID, 'currency', true);
                ?>
                 <select  name="currency">
                    <option value="">Select...</option>
                    <option value="USD" <?php if($currency=="USD"){ echo "selected";}?>>USD</option>
                    <option value="GBP" <?php if($currency=="GBP"){ echo "selected";}?>>GBP</option>
                    <option value="CAD" <?php if($currency=="CAD"){ echo "selected";}?>>CAD</option>
                    <option value="AUS" <?php if($currency=="AUS"){ echo "selected";}?>>AUS</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Price (in general): <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="number"  name="price" id="price" value="<?php echo get_post_meta($post->ID, 'price', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Price">
            </div>
        </div>
       <div class="form-group">
            <label class="col-md-2 control-label">Discount (in general): <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="number"  name="discount" id="discount" value="<?php echo get_post_meta($post->ID, 'discount', true); ?>" onkeypress="return isNumberKey(event)" placeholder="Discount">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">VOLUME UNIT: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <?php
                    $width_height_size_unit = get_post_meta($post->ID, 'width_height_size_unit', true);
                ?>
                <select  name="width_height_size_unit">
                    <option value="">Select...</option>
                    <option value="Meter" <?php if($width_height_size_unit=="Meter"){ echo "selected";}?>>Meter</option>
                    <option value="CMeter" <?php if($width_height_size_unit=="CMeter"){ echo "selected";}?>>CMeter</option>
                    <option value="Feet" <?php if($width_height_size_unit=="Feet"){ echo "selected";}?>>Feet</option>
                </select>
           </div>
        </div>   
        <div class="form-group">
            <label class="col-md-2 control-label">WIDTH: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="number"  name="width"  id="width" value="<?php echo get_post_meta($post->ID, 'width', true); ?>" placeholder="">
            </div>
        </div>  
        
        <div class="form-group">
            <label class="col-md-2 control-label">HEIGHT: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="number"  name="height" id="height" value="<?php echo get_post_meta($post->ID, 'height', true); ?>" placeholder="">
            </div>
        </div>  
        
        <div class="form-group">
            <label class="col-md-2 control-label">LENGTH: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="number"  name="length" id="length" value="<?php echo get_post_meta($post->ID, 'length', true); ?>" placeholder="">
            </div>
        </div>                      
        <div class="form-group">
            <label class="col-md-2 control-label">Show Room Condition: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <?php
                    $show_room_condition = get_post_meta($post->ID, 'show_room_condition', true);
                ?>
                <select  name="show_room_condition">
                    <option value="">Select...</option>
                    <option value="New" <?php if($show_room_condition=="New"){ echo "selected";}?>>New</option>
                    <option value="OLD" <?php if($show_room_condition=="OLD"){ echo "selected";}?>>OLD</option>
                    <option value="REPAIRED" <?php if($show_room_condition=="REPAIRED"){ echo "selected";}?>>REPAIRED</option>
                </select>
            </div>
        </div>  
        
        <div class="form-group">
            <label class="col-md-2 control-label">WEIGHT UNIT: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <?php
                    $weight_unit = get_post_meta($post->ID, 'weight_unit', true);
                ?>
                <select  name="weight_unit">
                    <option value="">Select...</option>
                    <option value="GRAM" <?php if($weight_unit=="GRAM"){ echo "selected";}?>>GRAM</option>
                    <option value="CGRAM" <?php if($weight_unit=="CGRAM"){ echo "selected";}?>>CGRAM</option>
                    <option value="KG" <?php if($weight_unit=="KG"){ echo "selected";}?>>KG</option>
                </select>
           </div>
        </div>   
        <div class="form-group">
            <label class="col-md-2 control-label">WEIGHT: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <input type="number"  name="weight"  id="weight" value="<?php echo get_post_meta($post->ID, 'weight', true); ?>" placeholder="">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label">Sale Type	: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <?php
                    $sale_type = get_post_meta($post->ID, 'sale_type', true);
                ?>
                <select  name="sale_type">
                    <option value="">Select...</option>
                    <option value="Retail" <?php if($sale_type=="Retail"){ echo "selected";}?>>Retail</option>
                    <option value="Wholesale" <?php if($sale_type=="Wholesale"){ echo "selected";}?>>Wholesale</option>
                </select>
            </div>
        </div>  
        
        <div class="form-group">
            <label class="col-md-2 control-label">Product Group: <span class="required">
            * </span>
            </label>
            <div class="col-md-10">
                <?php
                 $product_group = get_post_meta($post->ID, 'product_group', true);
                 if(isset($product_group))
                 {
                   $arr_product_group = explode(",",$product_group);
                 }
                ?>
                FEATURED PRODUCTS<input  type="checkbox" name="product_group[]" value="FEATURED PRODUCTS" <?php if(is_array($arr_product_group) && in_array("FEATURED PRODUCTS",$arr_product_group)){ echo "checked";}?>> <br />
                BESTSELLERS<input  type="checkbox" name="product_group[]" value="BESTSELLERS" <?php if(is_array($arr_product_group) && in_array("BESTSELLERS",$arr_product_group)){ echo "checked";}?>> <br />
                MOST POPULAR<input  type="checkbox" name="product_group[]" value="MOST POPULAR" <?php if(is_array($arr_product_group) && in_array("MOST POPULAR",$arr_product_group)){ echo "checked";}?>><br />
                COMING SOON<input  type="checkbox" name="product_group[]" value="COMING SOON" <?php if(is_array($arr_product_group) && in_array("COMING SOON",$arr_product_group)){ echo "checked";}?>><br />
                NEW ARRIVALS<input  type="checkbox" name="product_group[]" value="NEW ARRIVALS" <?php if(is_array($arr_product_group) && in_array("NEW ARRIVALS",$arr_product_group)){ echo "checked";}?>><br />
            </div>
        </div> 
        
       </div>
    </div> 
 </div>