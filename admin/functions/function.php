<?php session_start();
require_once ('../includes/config.php');

if($_SESSION['logged_in']!=1){
  header('Location: login.php');
}

function get_header(){
   require_once 'includes/header.php';
}

function get_sidebar(){
   require_once 'includes/sidebar.php';
}

function get_bread(){
   require_once 'includes/bread.php';
}

function get_footer(){
   require_once 'includes/footer.php';
}
function get_data($table='', $key='',$val='',$col='')
{
  global $con;
  $sql = "SELECT * FROM $table WHERE $key = '$val'";
  $res = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($res);
  return $data[$col];
}
function chk_data($table='', $key='',$val='')
{
  global $con;
  $sql = "SELECT * FROM $table WHERE $key = '$val'";
  $res = mysqli_query($con, $sql);
  $data = mysqli_num_rows($res);
  return $data > 0 ? true : false;
}


// Logout Section
if (isset($_GET['action'])) {
  if ($_GET['action']=='logout') {
    session_destroy();
    header('Location: login.php');
  }
}
