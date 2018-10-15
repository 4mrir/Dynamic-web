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
               Contact-us Massage
             </div>
          
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <table class="table table-responsive table-striped table-hover table_cus">
          		<thead class="table_head">
            		<tr>
                    	<th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Manage</th>
                    </tr>
            	</thead>
                <tbody>
                  <?php
                  $sel="SELECT * FROM contact";

                  $qry=mysqli_query($con,$sel);
                  while($data=mysqli_fetch_assoc($qry)){
                  ?>
                <tr>
                	<td><?= $data['name'];?></td>
                    <td><?= $data['email'];?></td>
                    <td><?= $data['subject'];?></td>
                    
                    
                    <td>
                    	<a href="view-contact.php?v=<?= $data['id'];?>"><i class="fa fa-plus-square fa-lg"></i></a>
                      <?php if ($_SESSION['user_role']=='admin' || $_SESSION['contact_id']==$data['id']): ?>
                         
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
      window.location="delete.php?delete-contact="+arg;
    }
  }
</script>


<?php
get_footer();
?>
