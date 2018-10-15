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
                    About
                 </div>
                <div class="clearfix"></div>
            </div>
          <div class="panel-body">
            <div class="row">
           <div class="col-md-4 col-md-offset-4">

              </div>
            </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" value="<?php echo get_data('posts','type' , 'front_about', 'name'); ?>" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-8">
                  <textarea name="desc" rows="8" cols="80"><?php echo get_data('posts','type' , 'front_about', 'description'); ?></textarea>
                  <img style="width: 300px;" src="../uploads/<?php echo get_data('posts','type' , 'front_about', 'images'); ?>" class="img-responsive" alt="Current Image">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-8">
                  <input type="file" name="pic" class="form-control">
                </div>

              </div>
          </div>
          <div class="panel-footer text-center">
            <button name="add_about" class="btn btn-sm btn-primary">Save</button>
          </div>
        </div>
        </form>
    </div><!--col-md-12 end-->


<?php
get_footer();

?>
