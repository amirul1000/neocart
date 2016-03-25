<div class="tab-pane" id="tab_term_condition">                
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">Agreement year:</label>
            <div class="col-md-10">
                <input type="text" class="form-control maxlength-handler" name="agreement_year" value="<?php echo get_post_meta($post->ID, 'agreement_year', true); ?>" maxlength="100" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Shipping Desc:</label>
            <div class="col-md-10">
                <textarea class="form-control maxlength-handler" rows="8" name="shipping_desc" maxlength="1000"><?php echo get_post_meta($post->ID, 'shipping_desc', true); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Delivery Desc:</label>
            <div class="col-md-10">
                <textarea class="form-control maxlength-handler" rows="8" name="delivery_desc" maxlength="1000"><?php echo get_post_meta($post->ID, 'delivery_desc', true); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Payment Desc:</label>
            <div class="col-md-10">
                <textarea class="form-control maxlength-handler" rows="8" name="payment_desc" maxlength="1000"><?php echo get_post_meta($post->ID, 'payment_desc', true); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Return Desc:</label>
            <div class="col-md-10">
                <textarea class="form-control maxlength-handler" rows="8" name="return_desc" maxlength="1000"><?php echo get_post_meta($post->ID, 'return_desc', true); ?></textarea>
            </div>
        </div>
    </div>               
</div>