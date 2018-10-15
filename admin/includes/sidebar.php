<?php
$id = $_SESSION['user_id'];
 ?>
<div class="container-fluid content_full">
        <div class="row">
            <div class="col-md-2 sidebar pd0">
            	<div class="side_user">
                	<img class="img-responsive" src="uploads/<?php
                  $img = get_data('users','id',$id,'user_photo');

                  if(file_exists('uploads/'.$img) && $img!=null){
                    echo $img;
                  }else{
                    echo 'new.jpg';
                  }
                   ?>"/>
                    <h4><?php
                    echo get_data('users','id',$id,'name') ?></h4>
                    <span>@ <?= get_data('users','id',$id,'role')?></span>
                </div>
                <h2>MAIN NAVIGATION</h2>
                <ul>
                	<li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="all-user.php"><i class="fa fa-user-circle"></i> User</a></li>
                    <li><a href="about.php"><i class="fa fa-info"></i> About</a></li>
                    <li><a href="review.php"><i class="fa fa-ravelry"></i> Review</a></li>
                    <li><a href="gallery.php"><i class="fa fa-image"></i> Gallery</a></li>
                    <li><a href="contact.php"><i class="fa fa-comment"></i> Contact</a></li>
                    <li><a href="setting.php"><i class="fa fa-cog"></i> Setting</a></li>
                    <li><a href="../index.php" target='_blank'><i class="fa fa-globe"></i>Live Site</a></li>
                    <li><a href="?action=logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div><!--sidebar end-->
