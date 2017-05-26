<?php
require("mysqli_connect.php");
$aid=$_GET['aid'];
$pid=$_GET['pid'];

$que=mysqli_query($con,"delete from Appointment where app_id=$aid");

redirect("pastapp.php",$pid);

function redirect($url,$id)
{
    ob_start();
    header('Location: '.$url.'?id='.$id);
    ob_end_flush();
    die();
}


 ?>
