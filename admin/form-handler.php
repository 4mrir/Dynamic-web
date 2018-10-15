<?php

require_once ('functions/function.php');

$allow_type  = array('jpg', 'png', 'jpeg', 'gif');

if ($_SERVER['REQUEST_METHOD']=='POST') {

// HTTP REQUEST START 

  if (isset($_POST['add_about'])) {
    $type="front_about";
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $img=$_FILES['pic'];

    if(isset($img['tmp_name'])){
        $imageName='about-'.time().rand(10000,1000000).rand(1000,10000).'.'.pathinfo($img['name'],PATHINFO_EXTENSION);
    }
    $ext = pathinfo($_FILES['pic']['name'],PATHINFO_EXTENSION);
    $chk = chk_data('posts','type' , 'front_about');

    if ($chk==true) {
      $old_name=get_data('posts','type' , 'front_about', 'images');
      $img_name = ( $img['error'] > 0 ? $old_name : $imageName);
      $update = "UPDATE posts SET name='$name', description='$desc', images='$img_name' WHERE type='front_about'";
      if (mysqli_query($con, $update)) {
        if(isset($img)){
          
           move_uploaded_file($img['tmp_name'],'../uploads/'.$imageName);
        }
      }
    }else {
      $insert="INSERT INTO posts (name, type, description,status,images,created_at )
            VALUES('$name', '$type', '$desc', '1', '$imageName', NOW() )";
      if (mysqli_query($con, $insert)) {
        move_uploaded_file($img['tmp_name'],'../uploads/'.$imageName);
      }

    }
    header('Location: about.php');

  }


  if (isset($_POST['add_review'])) {
    $type="front_about_review";
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $img=$_FILES['pic'];

    if(isset($img['tmp_name'])){
        $imageName='about-review-'.time().rand(10000,1000000).rand(1000,10000).'.'.pathinfo($img['name'],PATHINFO_EXTENSION);
    }
    $insert="INSERT INTO posts (name, type, description,status,images,created_at )
          VALUES('$name', '$type', '$desc', '1', '$imageName', NOW() )";
    if (mysqli_query($con, $insert)) {
      move_uploaded_file($img['tmp_name'],'../uploads/'.$imageName);
    }


    header('Location: review.php');

  }

  if (isset($_POST['add_gallery'])) {
    $name=$_POST['name'];
    $img=$_FILES['pic'];

    if(isset($img['tmp_name'])){
        $imageName='gallery-'.time().rand(10000,1000000).rand(1000,10000).'.'.pathinfo($img['name'],PATHINFO_EXTENSION);
    }
    $insert="INSERT INTO galary (name,images )
          VALUES('$name', '$imageName' )";
    if (mysqli_query($con, $insert)) {
      move_uploaded_file($img['tmp_name'],'../uploads/'.$imageName);
    }


    header('Location: gallery.php');

  }




  if (isset($_POST['add_setting'])) {
   // FOR SITE Title
    if (!empty($_POST['site_title'])) {
      $t = $_POST['site_title'];
      $chk = chk_data('setting','type_name' , 'site_title');
      if($chk!=true){
        $insert="INSERT INTO setting (type_name, type_value )
              VALUES('site_title', '$t' )";
        mysqli_query($con, $insert);
      }else{
        $update="UPDATE setting SET type_value='$t' WHERE type_name='site_title'";
        mysqli_query($con, $update);
      }
    }
    // For Site Name
    if (!empty($_POST['site_name'])) {
      $t = $_POST['site_name'];
      $chk = chk_data('setting','type_name' , 'site_name');
      if($chk==false){
        $insert="INSERT INTO setting (type_name, type_value )
              VALUES('site_name', '$t' )";
        mysqli_query($con, $insert);
      }else{
        $update="UPDATE setting SET type_value='$t' WHERE type_name='site_name'";
        mysqli_query($con, $update);
      }
    }//End site name
    // start Site Address
     if (!empty($_POST['site_address'])) {
      $t = $_POST['site_address'];
      $chk = chk_data('setting','type_name' , 'site_address');
      if($chk!=true){
        $insert="INSERT INTO setting (type_name, type_value )
              VALUES('site_address', '$t' )";
        mysqli_query($con, $insert);
      }else{
        $update="UPDATE setting SET type_value='$t' WHERE type_name='site_address'";
        mysqli_query($con, $update);
      }
    }
    // end Site Address
        // start Site email
     if (!empty($_POST['site_email'])) {
      $t = $_POST['site_email'];
      $chk = chk_data('setting','type_name' , 'site_email');
      if($chk!=true){
        $insert="INSERT INTO setting (type_name, type_value )
              VALUES('site_email', '$t' )";
        mysqli_query($con, $insert);
      }else{
        $update="UPDATE setting SET type_value='$t' WHERE type_name='site_email'";
        mysqli_query($con, $update);
      }
    }
    // end Site email

    // start Site phone
     if (!empty($_POST['site_phone'])) {
      $t = $_POST['site_phone'];
      $chk = chk_data('setting','type_name' , 'site_phone');
      if($chk!=true){
        $insert="INSERT INTO setting (type_name, type_value )
              VALUES('site_phone', '$t' )";
        mysqli_query($con, $insert);
      }else{
        $update="UPDATE setting SET type_value='$t' WHERE type_name='site_phone'";
        mysqli_query($con, $update);
      }
    }
    // end Site phone



    // start Site fb link
     if (!empty($_POST['sm_fb'])) {
      $t = $_POST['sm_fb'];
      $chk = chk_data('setting','type_name' , 'sm_fb');
      if($chk!=true){
        $insert="INSERT INTO setting (type_name, type_value )
              VALUES('sm_fb', '$t' )";
        mysqli_query($con, $insert);
      }else{
        $update="UPDATE setting SET type_value='$t' WHERE type_name='sm_fb'";
        mysqli_query($con, $update);
      }
    }
    // end Site fb link
    // start Site Google link
     if (!empty($_POST['sm_google'])) {
      $t = $_POST['sm_google'];
      $chk = chk_data('setting','type_name' , 'sm_google');
      if($chk!=true){
        $insert="INSERT INTO setting (type_name, type_value )
              VALUES('sm_google', '$t' )";
        mysqli_query($con, $insert);
      }else{
        $update="UPDATE setting SET type_value='$t' WHERE type_name='sm_google'";
        mysqli_query($con, $update);
      }
    }
    // end Site google link
    // start Site twitter
     if (!empty($_POST['sm_twitter'])) {
      $t = $_POST['sm_twitter'];
      $chk = chk_data('setting','type_name' , 'sm_twitter');
      if($chk!=true){
        $insert="INSERT INTO setting (type_name, type_value )
              VALUES('sm_twitter', '$t' )";
        mysqli_query($con, $insert);
      }else{
        $update="UPDATE setting SET type_value='$t' WHERE type_name='sm_twitter'";
        mysqli_query($con, $update);
      }
    }
    // end Site twitter




    // start Site footer credit
     if (!empty($_POST['site_fc'])) {
      $t = $_POST['site_fc'];
      $chk = chk_data('setting','type_name' , 'site_fc');
      if($chk!=true){
        $insert="INSERT INTO setting (type_name, type_value )
              VALUES('site_fc', '$t' )";
        mysqli_query($con, $insert);
      }else{
        $update="UPDATE setting SET type_value='$t' WHERE type_name='site_fc'";
        mysqli_query($con, $update);
      }
    }
    // end Site credit
    header('Location: setting.php');
  }






// HTTP REQUEST END 
}



 ?>
