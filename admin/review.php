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
                    Review
                 </div>
                 <div class="col-md-3 text-right">
                   <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Add Review</button>
                </div>
                <div class="clearfix"></div>
            </div>
          <div class="panel-body">
            <table class="table table-responsive table-striped table-hover table_cus">
          		<thead class="table_head">
            		<tr>
                    	<th>Name</th>
                        <th>Description</th>
                         <th>photo</th>
                        <th>Manage</th>
                    </tr>
            	</thead>
                <tbody>
                  <?php
                  $sel="SELECT * FROM posts WHERE type = 'front_about_review'";

                  $qry=mysqli_query($con,$sel);
                  while($data=mysqli_fetch_assoc($qry)){
                  ?>
                <tr>
                	<td><?= $data['name'];?></td>
                    <td><?= $data['description'];?></td>
                    <td>
                        <?php
                        if($data['images']!=''){
                            if(file_exists('../uploads/'.$data['images'])){
                           ?><img height="80" src="../uploads/<?= $data['images'];?>"/>
                          <?php
                            }else{ ?>
                            <img height="80" src="uploads/new.jpg"/>
                            <?php }
                        }else{

                        ?>
                        <img height="80" src="uploads/new.jpg"/>
                        <?php
                        }
                        ?>


                    </td>
                    <td>
                    	<a href="view-re.php?v=<?= $data['id'];?>"><i class="fa fa-plus-square fa-lg"></i></a>
                      <?php if ($_SESSION['user_role']=='admin' || $_SESSION['user_id']==$data['id']): ?>
                      
                          <?php if($_SESSION['user_role']=='admin'): ?>
                          <a href="javascript: delete_confirm(<?= $data['id'];?>)"><i class="fa fa-trash fa-lg"></i></a>
                          <?php endif; ?>
                      <?php endif; ?>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
          </table>
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
            <h4 class="modal-title">Modal Header</h4>
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
              <label for="" class="col-sm-3 control-label">Description</label>
              <div class="col-sm-8">
                <textarea name="desc" rows="8" cols="40"></textarea>
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
            <button name="add_review" class="btn btn-sm btn-primary">Save</button>
          </div>
        </form>
        </div>

      </div>
    </div>
<script type="text/javascript">
  function delete_confirm(arg) {
    var a=confirm('Do yOU reAlly waNt To dEletE !');
    if (a==true) {
      window.location="delete.php?type=review&delete-post="+arg;
    }
  }
</script>
<?php
get_footer();

?>
