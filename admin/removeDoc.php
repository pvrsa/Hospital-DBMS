<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'HospitalDMS');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to mysqli: ");

$did=$_GET['did'];

$que=mysqli_query($con,"delete from Doctor where d_id=$did");


redirect("viewAllDocs.php");

function redirect($url)
{
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}


 ?>
