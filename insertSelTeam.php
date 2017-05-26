<?php
require("mysqli_connect.php");
$tid=$_GET['tid'];
$did=$_GET['did'];

$que=mysqli_query($con,"insert into d_team values($tid,$did);");

$c = $_GET['success_user'];

redirect("dd2.php",$c);

function redirect($url,$myusername)
{
    ob_start();
    header('Location: '.$url.'?success_user='.$myusername);
    ob_end_flush();
    die();
}


 ?>
