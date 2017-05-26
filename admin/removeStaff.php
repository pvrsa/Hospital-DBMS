<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'HospitalDMS');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to mysqli: ");

$sid=$_GET['sid'];

$que=mysqli_query($con,"delete from Team_mem where t_id=$sid");


redirect("viewAllStaff.php");

function redirect($url)
{
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}


 ?>
