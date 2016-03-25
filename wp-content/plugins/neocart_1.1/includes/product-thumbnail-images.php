<div class="tab-pane" id="tab_images">
               
	<style>
     .field_left {
        float:left;
      }
    
      .field_right {
        float:left;
        margin-left:10px;
      }
    
      .clear {
        clear:both;
      }
    
      #dynamic_form {
        width:580px;
      }
    
      #dynamic_form input[type=text] {
        width:300px;
      }
    
      #dynamic_form .field_row {
        border:1px solid #999;
        margin-bottom:10px;
        padding:10px;
      }
    
      #dynamic_form label {
        padding:0 6px;
      }
    </style>
    <script language="javascript">
        function add_image(obj) {
                var parent=jQuery(obj).parent().parent('div.field_row');
                var inputField = jQuery(parent).find("input.meta_image_url");
            
                tb_show('', 'media-upload.php?TB_iframe=true');
            
                window.send_to_editor = function(html) {
                    var url = jQuery(html).find('img').attr('src');
                    inputField.val(url);
                    jQuery(parent)
                    .find("div.image_wrap")
                    .html('<img src="'+url+'" height="48" width="48" />');
            
                    // inputField.closest('p').prev('.awdMetaImage').html('<img height=120 width=120 src="'+url+'"/><p>URL: '+ url + '</p>'); 
            
                    tb_remove();
                };
            
                return false;  
            }
            
            function remove_field(obj) {
                var parent=jQuery(obj).parent().parent();
                //console.log(parent)
                parent.remove();
            }
            
            function add_field_row() {
                var row = jQuery('#master-row').html();
                jQuery(row).appendTo('#field_wrap');
            }	
    </script>
     <div id="dynamic_form">

        <div id="field_wrap">
        <?php 
        $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
        if ( isset( $gallery_data['image_url'] ) ) 
        {
            for( $i = 0; $i < count( $gallery_data['image_url'] ); $i++ ) 
            {
            ?>
    
            <div class="field_row">
    
              <div class="field_left">
                <div class="form_field">
                  <label>Image URL</label>
                  <input type="text"
                         class="meta_image_url"
                         name="gallery[image_url][]"
                         value="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>"
                  />
                </div>
              </div>
    
              <div class="field_right image_wrap">
                <img src="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>" height="48" width="48" />
              </div>
    
              <div class="field_right">
                <input class="button" type="button" value="Choose File" onclick="add_image(this)" /><br />
                <input class="button" type="button" value="Remove" onclick="remove_field(this)" />
              </div>
    
              <div class="clear" /></div> 
            </div>
            <?php
            } // endif
        } // endforeach
        ?>
        </div>
    
        <div style="display:none" id="master-row">
        <div class="field_row">
            <div class="field_left">
                <div class="form_field">
                    <label>Image URL</label>
                    <input class="meta_image_url" value="" type="text" name="gallery[image_url][]" />
                </div>
            </div>
            <div class="field_right image_wrap">
            </div> 
            <div class="field_right"> 
                <input type="button" class="button" value="Choose File" onclick="add_image(this)" />
                <br />
                <input class="button" type="button" value="Remove" onclick="remove_field(this)" /> 
            </div>
            <div class="clear"></div>
        </div>
        </div>
    
        <div id="add_field_row">
          <input class="button" type="button" value="Add Field" onclick="add_field_row();" />
        </div>
    
    </div>
    
</div>