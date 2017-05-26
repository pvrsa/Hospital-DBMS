
<?php
// require("mysqli_connect.php");

$a=$_GET['pid'];
$b=$_GET['did'];
$c=$_GET['date'];
$tApp=$_GET['tApp'];
$con= mysqli_connect ("localhost","root","","HospitalDMS");
$lala="insert into Appointment(app_pat_id,app_doc_id,app_date,app_type) values($a,$b,'$c','$tApp');";
$res=mysqli_query($con,$lala);

$que=mysqli_query($con,"select p_uname from Patient where p_id=$a");
$list = mysqli_fetch_assoc($que);
$d = $list['p_uname'];


// $url = "tt2.php";
redirect("tt2.php",$d);
?>
<?php
function redirect($url,$myusername)
{
    ob_start();
    header('Location: '.$url.'?success_user='.$myusername);
    ob_end_flush();
    die();
}


 ?>
