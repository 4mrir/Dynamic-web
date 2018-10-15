<?php

    require_once ('functions/function.php');
   get_header () ;
   get_sidebar ();
   get_bread () ;


?>
<div class="col-md-12">
	<div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                All-user Information
             </div>
             <div class="col-md-3 text-right">
             	<a href="add-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add user</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <table class="table table-responsive table-striped table-hover table_cus">
          		<thead class="table_head">
            		<tr>
                    	<th>Name</th>
                        <th>Email</th>
                        <th>username</th>
                        <th>user Role</th>
                         <th>photo</th>
                        <th>Manage</th>
                    </tr>
            	</thead>
                <tbody>
                  <?php
                  $sel="SELECT * FROM users";

                  $qry=mysqli_query($con,$sel);
                  while($data=mysqli_fetch_assoc($qry)){
                  ?>
                <tr>
                	<td><?= $data['name'];?></td>
                    <td><?= $data['email'];?></td>
                    <td><?= $data['username'];?></td>
                    <td><?= $data['role'];?></td>
                    <td>
                        <?php
                        if($data['user_photo']!=''){
                            if(file_exists('uploads/'.$data['user_photo'])){
                           ?><img height="50" src="uploads/<?= $data['user_photo'];?>"/>
                          <?php
                            }else{ ?>
                            <img height="50" src="uploads/new.jpg"/>
                            <?php }
                        }else{

                        ?>
                        <img height="50" src="uploads/new.jpg"/>
                        <?php
                        }
                        ?>


                    </td>
                    <td>
                    	<a href="view-user.php?v=<?= $data['id'];?>"><i class="fa fa-plus-square fa-lg"></i></a>
                      <?php if ($_SESSION['user_role']=='admin' || $_SESSION['user_id']==$data['id']): ?>
                          <a href="edit-user.php?u=<?= $data['id'];?>"><i class="fa fa-pencil-square fa-lg"></i></a>
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
      <div class="panel-footer">
        <div class="col-md-4">
        	<a href="#" class="btn btn-sm btn-warning">EXCEL</a>
            <a href="#" class="btn btn-sm btn-primary">PDF</a>
            <a href="#" class="btn btn-sm btn-danger">SVG</a>
            <a href="#" class="btn btn-sm btn-success">PRINT</a>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-right">
        	<nav aria-label="Page navigation">
              <ul class="pagination pagina_cus">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
</div><!--col-md-12 end-->


<script type="text/javascript">
  function delete_confirm(arg) {
    var a=confirm('Do yOU reAlly waNt To dEletE !');
    if (a==true) {
      window.location="delete.php?delete-user="+arg;
    }
  }
</script>


<?php
get_footer();
?>
