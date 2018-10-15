<?php
session_start();
if(file_exists('../includes/config.php')){
    require_once ('../includes/config.php');
}
// Check session
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']!=null ){
    header("location: index.php");
    exit;
}
$msg = '';
/* Check Login form submitted */
if(isset($_POST['login'])){
	/* Check and assign submitted Username and Password to new variable */
	$Username = isset($_POST['username']) ? $_POST['username'] : '';
	$Passwords = isset($_POST['password']) ? $_POST['password'] : '';
	$Password = sha1(md5($Passwords));

	/* Check Username and Password existence in defined array */
	$sql =  "SELECT * FROM users WHERE username = '$Username' AND password = '$Password'";
	$run = mysqli_query($con, $sql);
	if(mysqli_num_rows($run) > 0){
	    $res = mysqli_fetch_array($run);

		$_SESSION['logged_in'] = 1;
		$_SESSION['user_id'] = $res['id'];
		$_SESSION['user_role'] = $res['role'];
		header("location:index.php");
		exit;
	} else{
	    $msg = 'Username or Password is wrong...!!';//'Err '.mysqli_error($con);
	}
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel :: Login </title>
        <link type="text/css" rel="stylesheet" href="assets/css/font-awesome.min.css"/>
        <link type="text/css" href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>
    </head>
    <body>
        <div class="container">
            <div id="loginbox" style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>
                    <div style="padding-top:30px" class="panel-body" >
                      <?php if($msg!='' ){ ?>
                          <div class="alert alert-danger col-sm-12" id="login-alert" ><?php echo $msg; ?></div>
                        <?php } ?>

                        <form action="" id="loginform" class="form-horizontal" role="form" method="post">

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                    </label>
                                </div>
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->

                                <div class="col-sm-12 controls">
                                    <input type="submit" name="login" value="Login" id="btn-login" class="btn btn-success">
                                    <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        Don't have an account!
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>
    </body>
</html>
