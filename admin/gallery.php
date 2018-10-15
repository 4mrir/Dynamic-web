<?php
require_once ('functions/function.php');

get_header();
get_sidebar();
get_bread();



?>

    <div class="col-md-12">
      <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="col-md-9 heading_title">
                    Gallery
                 </div>
                 <div class="col-md-3 text-right">
                   <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Add Gallery Image</button>
                </div>
                <div class="clearfix"></div>
            </div>
          <div class="panel-body">
            <div class="gallery">
              <ul>
                <?php 
                    $sql = "SELECT * FROM galary";
                    $q = mysqli_query($con, $sql);
                    
                    while ($gallery = mysqli_fetch_assoc($q)) {
                ?>
                <!-- Start Image  -->
                <li>
                  <div class="g-img">
                      <img src="../uploads/<?= $gallery['images'] ?>" alt="<?= $gallery['name'] ?>">
                    <div class="delete">
                      <a href="javascript: delete_confirm(<?= $gallery['id'] ?>)"><i class="fa fa-trash"></i></a>
                      <div class="title"><?= $gallery['name'] ?></div>
                    </div>
                  </div>
                </li>
                <!-- End Image  -->
                <?php } ?>
              </ul>
            </div>
        </div>
            </div>

    </div><!--col-md-12 end-->



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form class="form-horizontal" action="form-handler.php" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Gallery Image</h4>
          </div>
          <div class="modal-body">
            <!-- hhhh -->
            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Photo</label>
              <div class="col-sm-8">
                <input type="file" name="pic" class="form-control">
              </div>

            </div>
            <!-- hhh -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button name="add_gallery" class="btn btn-sm btn-primary">Save</button>
          </div>
        </form>
        </div>

      </div>
    </div>
<script type="text/javascript">
  function delete_confirm(arg) {
    var a=confirm('Do yOU reAlly waNt To dEletE !');
    if (a==true) {
      window.location="delete.php?delete-gallery="+arg;
    }
  }
</script>
<?php
get_footer();

?>
