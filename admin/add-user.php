<?php
require_once ('functions/function.php');

get_header();
get_sidebar();
get_bread();

if (!empty($_POST)) {
  $name = $_POST['name'];
 $email = $_POST['email'];
  $user = $_POST['user'];
  $pw =sha1(md5($_POST['pass']));
  $role=$_POST['role'];
  $image=$_FILES['pic'];
  $imageName='User-'.time().rand(10000,1000000).rand(1000,10000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
  $insert = "INSERT INTO users(name,email, username,password,role,user_photo, created_at)
      VALUES('$name','$email','$user','$pw','$role', '$imageName',NOW())";
  $msg='';
  if (!empty($name)) {
    if (!empty($email)) {
      if (!empty($user)) {
        if (mysqli_query($con, $insert)) {
            move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
          echo "Good";
        }else{
          echo "Try again".mysqli_error($con);

        }
      }else{
        $msg = 'Please Enter your Username';
      }
    }else {
      $msg = "plese Enter your email";
    }
  }else {
    $msg = "plese Enter your name";
  }

}

?>

    <div class="col-md-12">
    	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <div class="col-md-9 heading_title">
                    User Registration
                 </div>
                 <div class="col-md-3 text-right">
                 	<a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User</a>
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
                  <input type="text" class="form-control" name="name" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="user" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="pass" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Re-Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="repass" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">user Role</label>
                <div class="col-sm-4">
                  <select class="form-control select_cus" name="role">
                      <option>select Role</option>
                      <option value="admin">Admin</option>
                      <option value="user">User</option>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-8">
                  <input type="file" name="pic">
                </div>
              </div>
          </div>
          <div class="panel-footer text-center">
            <button class="btn btn-sm btn-primary">REGISTRATION</button>
          </div>
        </div>
        </form>
    </div><!--col-md-12 end-->
<?php
get_footer();

?>
