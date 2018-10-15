<?php
require_once ('functions/function.php');

get_header();
get_sidebar();
get_bread();



?>

    <div class="col-md-12">
    	<form class="form-horizontal" action="form-handler.php" method="post" enctype="multipart/form-data">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <div class="col-md-9 heading_title">
                   Settings
                 </div>
                <div class="clearfix"></div>
            </div>
          <div class="panel-body">
            <div class="row">
           <div class="col-md-4 col-md-offset-4">

              </div>
            </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Site Title</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="site_title" value="<?php echo get_data('setting','type_name' , 'site_title', 'type_value'); ?>" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Site Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="site_name" value="<?php echo get_data('setting','type_name' , 'site_name', 'type_value'); ?>" pla
                  ceholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Site Address</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="site_address" value="<?php echo get_data('setting','type_name' , 'site_address', 'type_value'); ?>" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Site Email</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="site_email" value="<?php echo get_data('setting','type_name' , 'site_email', 'type_value'); ?>" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Site Phone </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="site_phone" value="<?php echo get_data('setting','type_name' , 'site_phone', 'type_value'); ?>" placeholder="">
                </div>

              <!-- //..link -->

                <div class="form-group">
                <label for="" class="col-sm-3 control-label">SM Facebook </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="sm_fb" value="<?php echo get_data('setting','type_name' , 'sm_fb', 'type_value'); ?>" placeholder="">
                </div>

                <div class="form-group">
                <label for="" class="col-sm-3 control-label">SM Google+ </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="sm_google" value="<?php echo get_data('setting','type_name' , 'sm_google', 'type_value'); ?>" placeholder="">
                </div>
                <div class="form-group">
                <label for="" class="col-sm-3 control-label">SM Twitter </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="sm_twitter" value="<?php echo get_data('setting','type_name' , 'sm_twitter', 'type_value'); ?>" placeholder="">
                </div>
              </div>


              <!-- end link.... -->


              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Footer credit</label>
                <div class="col-sm-8">
                  <textarea name="site_fc" rows="4" cols="60"><?php echo get_data('setting','type_name' , 'site_fc', 'type_value'); ?></textarea>
               
                </div>
              </div>

              
          </div>
          <div class="panel-footer text-center">
            <button name="add_setting" class="btn btn-sm btn-primary">Save</button>
          </div>
        </div>
        </form>
    </div><!--col-md-12 end-->


<?php
get_footer();

?>
