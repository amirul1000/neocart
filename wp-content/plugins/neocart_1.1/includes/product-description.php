<div class="tab-pane" id="tab_description">                
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-12 control-label">Description:</label>
            <div class="col-md-12">
                <?php
				    echo  the_editor(get_post_meta($post->ID, 'description', true), 'description');
				?>
            </div>
        </div>
    </div>               
</div>