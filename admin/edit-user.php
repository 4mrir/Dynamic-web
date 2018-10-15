<?php
require_once ('functions/function.php');
   get_header () ;
   get_sidebar ();
   get_bread () ;
  $id=$_GET['u'];
  $sel="SELECT * FROM users WHERE id='$id'";
  $Q=mysqli_query($con,$sel);
  $data=mysqli_fetch_assoc($Q);

  $allow_type  = array('jpg', 'png', 'jpeg', 'gif');
  
  if(!empty($_POST)){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $role= $_POST['role'];
    $image=$_FILES['pic'];
    $pwd= ($_POST['pass']!='' ? sha1(md5($_POST['pass'])) : $data['password']);
    if(isset($image['tmp_name'])){
        $imageName='User-'.time().rand(10000,1000000).rand(1000,10000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    }
    $ext = strtolower(pathinfo($_FILES['pic']['name'],PATHINFO_EXTENSION));
    $i = ( $image['error'] > 0 ? $data['user_photo'] :$imageName);
    $edit = '';
    if(!empty($name)){
      if(!empty($email)){
        // start if
        if($_SESSION['user_role']=='admin'){
          if($_SESSION['user_id']==$data['id']){
            $edit="UPDATE users SET name='$name',email='$email', role='$role', password='$pwd', user_photo='$i' WHERE id='$id'";
          }else{
            $edit="UPDATE users SET name='$name',email='$email', role='$role', user_photo='$i' WHERE id='$id'";
          }

        }else{ // if not admin that mean the user
          if($_SESSION['user_id']==$data['id']){
            $edit="UPDATE users SET name='$name',email='$email', password='$pwd', user_photo='$i' WHERE id='$id'";
          }else{
            echo 'You have not permission to edit this...!<br>';
          }
        }
        // End if
        if(mysqli_query($con,$edit)){
            if($ext==in_array($allow_type)){
             move_uploaded_file($img['tmp_name'],'../uploads/'.$imageName);
             echo 'Uploaded';
            }else{
              echo 'not allow';
            }
            header('Location: view-user.php?v='.$id);
        }else{
          echo "Update Failed! Please Try Again.".mysqli_error($con);
        }
      }else{
        echo "Please enter your email address!";
      }
    }else{
      echo "Please enter your name!";
    }
  }

?>
    <div class="col-md-12">
    	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <div class="col-md-9 heading_title">
                     Update User informations
                 </div>
                 <div class="col-md-3 text-right">
                 	<a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User</a>
                </div>
                <div class="clearfix"></div>
            </div>
          <div class="panel-body">
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" value="<?= $data['name'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" value="<?= $data['email'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="user" value="<?= $data['username'];?>" disabled="disabled">
                </div>
              </div>
             <?php if ($_SESSION['user_role']=='admin'): ?>


              <div class="form-group">
                <label for="" class="col-sm-3 control-label">user Role</label>
                <div class="col-sm-4">
                  <select class="form-control select_cus" name="role">
                      <option>select Role</option>
                      <option <?php echo $data['role']=='admin' ? 'selected' : ''; ?> value="admin">Admin</option>
                      <option <?php echo $data['role']=='user' ? 'selected' : ''; ?> value="user">User</option>

                  </select>
                </div>
              </div>  <?php endif; ?>

              <?php if ($data['id']==$_SESSION['user_id']): ?>


              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="pass" placeholder="Enter Your Password ">
                </div>
              </div>
              <?php endif; ?>

              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-8">
                  <input class="form-control" type="file" name="pic">
                </div>
              </div>
          </div>
          <div class="panel-footer text-center">
            <button class="btn btn-sm btn-primary">Update</button>
          </div>
        </div>
        </form>
    </div>
<?php
get_footer();

?>
