<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'HospitalDMS');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to mysqli: ");

	if($_SERVER['REQUEST_METHOD']=='POST')
	{

		if(!empty($_POST['nrn']) and !empty($_POST['nrs']))
		{

			$nrn = $_POST['nrn'];
			$nrs = $_POST['nrs'];
			$query = "update rate set NORMAL = $nrn;";
            $lala=mysqli_query($con,$query);
            $query = "update rate set SURGERY = $nrs;";
            $lala2=mysqli_query($con,$query);

				redirect("index.php?no=1");
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
