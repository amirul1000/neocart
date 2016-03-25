<?php
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
	
	$post_id = $_POST['id'];
	$obj_product = get_post($post_id);
	
	$gallery_data = get_post_meta($post_id,'gallery_data',true); 
?>
<div class="product-page product-pop-up">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-3">
      <div class="product-main-image">
        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id  ) );?>" alt="Cool green dress with red bell" class="img-responsive">
      </div>
      <div class="product-other-images">
       <?php
	     for($i=0;$i<count($gallery_data['image_url']);$i++)
		 {
	   ?> 
        <a href="#"  <?php if($i==0){ ?> class="active" <?php } ?>><img alt="Berry Lace Dress" src="<?php echo  $gallery_data['image_url'][$i]?>"></a>
       <?php
	    }
	   ?>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-9">
      <h1> <?php
			   echo $obj_product->post_title;
			?>
      </h1>
      <div class="price-availability-block clearfix">
        <div class="price">
          <strong><span>$</span><?php echo get_post_meta($post_id, 'price', true); ?></strong>
          <em>$<span><?php echo get_post_meta($post_id, 'discount', true); ?></span></em>
        </div>
        <div class="availability">
          Availability: <strong>In Stock</strong>
        </div>
      </div>
      <div class="description">
        <p>
            <?php
			   echo $obj_product->post_content;
			?>
        </p>
      </div>
      <div class="product-page-options">
        <div class="pull-left">
          <label class="control-label">Size:</label>
          <select class="form-control input-sm">
            <option>L</option>
            <option>M</option>
            <option>XL</option>
          </select>
        </div>
        <div class="pull-left">
          <label class="control-label">Color:</label>
          <select class="form-control input-sm">
            <option>Red</option>
            <option>Blue</option>
            <option>Black</option>
          </select>
        </div>
      </div>
      <div class="product-page-cart">
        <div class="product-quantity">
            <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
        </div>
        <button class="btn btn-primary" type="submit">Add to cart</button>
          <?php 
			 $page =get_page_by_title( 'details' );
			 $guid = $page->guid; 
		  ?>   
        <a href="<?php echo $guid; ?>" class="btn btn-default">More details</a>
      </div>
    </div>

    <div class="sticker sticker-sale"></div>
  </div>
</div>