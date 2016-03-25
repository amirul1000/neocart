<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGIN_URL;?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGIN_URL;?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGIN_URL;?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN_URL;?>/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN_URL;?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<link href="<?php echo PLUGIN_URL;?>/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo PLUGIN_URL;?>/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGIN_URL;?>/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<!--<link href="<?php echo PLUGIN_URL;?>/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo PLUGIN_URL;?>/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGIN_URL;?>/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>-->

<script language="javascript">
   var PLUGIN_URL = "<?php echo PLUGIN_URL;?>";
</script>


<!-- END THEME STYLES -->
    <?php
		// Noncename needed to verify where the data originated
		echo '<input type="hidden" name="productmeta_noncename" id="productmeta_noncename" value="' .wp_create_nonce(  PLUGIN_PATH . '/includes/product-general.php' ) . '" />';
		
	?>


    <div class="tabbable">
        <ul class="nav nav-tabs">
             <li class="active">
                <a href="#tab_general" data-toggle="tab">
                General </a>
            </li>
            <li>
                <a href="#tab_specification" data-toggle="tab">
                Specification </a>
            </li>
            <li>
                <a href="#tab_description" data-toggle="tab">
                Description </a>
            </li>
            <li>
                <a href="#tab_images" data-toggle="tab">
               Thumbnail Images </a>
            </li>
            <li>
                <a href="#tab_term_condition" data-toggle="tab">
                Terms & Condition </a>
            </li>
            <li>
                <a href="#tab_meta" data-toggle="tab">
                 SEO Meta </a>
            </li>
        </ul>
        <div class="tab-content no-space">
            
            <!--------------General------------------>            
             <?php
			   include_once( PLUGIN_PATH . '/includes/product-general.php');
			 ?> 
            <!--------------/General------------------>
            
             <!--------------Specification------------------>
             <?php
			   include_once( PLUGIN_PATH . '/includes/product-specification.php');
			 ?>    
            <!--------------/Specification------------------>
            
            <!--------------Description------------------>
             <?php
			   include_once( PLUGIN_PATH . '/includes/product-description.php');
			 ?>    
            <!--------------/Description------------------>
            
            
            <!--------------Thumbnail Images--------------->
             <?php
			   include_once( PLUGIN_PATH . '/includes/product-thumbnail-images.php');
			 ?>    
            <!--------------/Thumbnail Images--------------->
            
            
            <!-----Terms & Condition--->
            <?php
			   include_once( PLUGIN_PATH . '/includes/product-term-condition.php');
			?>    
            <!-----/Terms & Condition--->
            
            
            <!-----SEO--->
            <?php
			   include_once( PLUGIN_PATH . '/includes/product-seo.php');
			?>    
            <!-----/SEO--->
            
        </div>
    </div>
<!--
<link rel="stylesheet" href="<?php echo PLUGIN_URL;?>/assets/datepicker/jquery-ui.css">
<script src="<?php echo PLUGIN_URL;?>/assets/datepicker/jquery-1.10.2.js"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/datepicker/jquery-ui.js"></script>

<script src="<?php echo PLUGIN_URL;?>/assets/datepicker/addons/jquery-ui-sliderAccess.js"></script>
<link rel="stylesheet" href="<?php echo PLUGIN_URL;?>/assets/datepicker/addons/jquery-ui-timepicker-addon.css">
<script src="<?php echo PLUGIN_URL;?>/assets/datepicker/addons/jquery-ui-timepicker-addon.js"></script>
-->
<script src="<?php echo PLUGIN_URL;?>/assets/datepicker/jquery-1.10.2.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN_URL;?>/assets/datetimepicker-master/jquery.datetimepicker.css"/>
<style type="text/css">
	.custom-date-style {
		background-color: red !important;
	}
	.input{	
	}
	.input-wide{
		width: 500px;
	}
</style>
<script src="<?php echo PLUGIN_URL;?>/assets/datetimepicker-master/build/jquery.datetimepicker.full.js"></script>




<script src="<?php echo PLUGIN_URL;?>/assets/custom/js/custom.js"></script>
			
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo PLUGIN_URL;?>/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo PLUGIN_URL;?>/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo PLUGIN_URL;?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo PLUGIN_URL;?>/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo PLUGIN_URL;?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo PLUGIN_URL;?>/assets/global/scripts/datatable.js"></script>
<!--<script src="<?php echo PLUGIN_URL;?>/assets/admin/pages/scripts/ecommerce-products-edit.js"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {    
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		QuickSidebar.init(); // init quick sidebar
		Demo.init(); // init demo features
		//EcommerceProductsEdit.init();
	});
</script>
<!-- END JAVASCRIPTS -->
