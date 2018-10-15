<?php
require_once ('functions/function.php');

if (isset($_GET['delete-user'])) {

	$id=$_GET['delete-user'];
	if ($_SESSION['user_role']=='admin') {
	  $sel="DELETE FROM users WHERE id='$id'";
	  mysqli_query($con,$sel);
	}else{
	  echo 'Not Allowed';
	}
	header('location: all-user.php');
}

if (isset($_GET['delete-post'])) {

	$id=$_GET['delete-post'];
	if ($_SESSION['user_role']=='admin') {
	  $sel="DELETE FROM posts WHERE id='$id'";
	  mysqli_query($con,$sel);
	}else{
	  echo 'Not Allowed';
	}
	if (isset($_GET['type'])) {
		$type = $_GET['type'];
		if($type=='review'){
			header('location: review.php');;
		}
	}else{
		header('location: index.php');;
	}
}


if (isset($_GET['delete-contact'])) {

	$id=$_GET['delete-contact'];
	
	if ($_SESSION['user_role']=='admin') {
	  $sel="DELETE FROM contact WHERE id='$id'";
	  mysqli_query($con,$sel);
	  
	}else{
	  echo 'Not Allowed';
	}
	header('location: contact.php');
}




if (isset($_GET['delete-gallery'])) {

	$id=$_GET['delete-gallery'];
	$old = get_data('galary', 'id',$id,'images');
	
	if ($_SESSION['user_role']=='admin') {
	  $sel="DELETE FROM galary WHERE id='$id'";
	  if(mysqli_query($con,$sel)){
	  	unlink('../uploads/'.$old);
	  }
	}else{
	  echo 'Not Allowed';
	}
	header('location: gallery.php');
}