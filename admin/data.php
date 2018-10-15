<?php
require_once ('functions/function.php');

$sql='SELECT * FROM users WHERE username="roton"';
$q=mysqli_query($con,$sql);
$ran=mysqli_fetch_assoc($q);
echo $ran['email'];
 ?>
