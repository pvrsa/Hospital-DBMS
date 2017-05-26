<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'HospitalDMS');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to mysqli: ");

	if($_SERVER['REQUEST_METHOD']=='POST')
	{

		if(!empty($_POST['nMax']))
		{

            $duser=$_GET['duser'];
			$nMax = $_POST['nMax'];
			$query = "update Doctor set d_max_app = $nMax where d_uname='$duser';";
            $lala=mysqli_query($con,$query);
				redirect("dd2.php?success_user=".$duser);
		}
	}

	function redirect($url)
	{
		ob_start();
		header('Location: '.$url);
		ob_end_flush();
		die();
	}

?>
