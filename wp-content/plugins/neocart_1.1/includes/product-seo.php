<div class="tab-pane" id="tab_meta">                
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">Meta Title:</label>
            <div class="col-md-10">
                <input type="text" class="form-control maxlength-handler" name="seo_meta_title" value="<?php echo get_post_meta($post->ID, 'seo_meta_title', true); ?>" maxlength="100" placeholder="">
                <span class="help-block">
                max 100 chars </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Meta Keywords:</label>
            <div class="col-md-10">
                <textarea class="form-control maxlength-handler" rows="8" name="seo_meta_keywords" maxlength="1000"><?php echo get_post_meta($post->ID, 'seo_meta_keywords', true); ?></textarea>
                <span class="help-block">
                max 1000 chars </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Meta Description:</label>
            <div class="col-md-10">
                <textarea class="form-control maxlength-handler" rows="8" name="seo_meta_description" maxlength="255"><?php echo get_post_meta($post->ID, 'seo_meta_description', true); ?></textarea>
                <span class="help-block">
                max 255 chars </span>
            </div>
        </div>
    </div>               
</div>