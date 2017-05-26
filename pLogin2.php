<?php
require("mysqli_connect.php");

	if($_SERVER['REQUEST_METHOD']=='POST')
	{

		if(!empty($_POST['luname']) and !empty($_POST['lpass']))
		{

			$myusername = mysqli_real_escape_string($con,$_POST['luname']);
			$mypassword = mysqli_real_escape_string($con,$_POST['lpass']);
			$pascodeen = hash('sha256',$mypassword);
			$query = "SELECT * FROM PLogin where p_username = '$myusername' AND p_password = '$pascodeen'";
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
			//echo "haha";
			$count = mysqli_num_rows($result);
			//echo "string";

			if($count!=0)
			{
				echo "asdstring";
				$row = mysqli_fetch_assoc($result) or die(mysqli_error($con));
				session_start();
				$_SESSION['p_username'] = $row['p_password'];
				redirect("tt2.php",$myusername);
			}
			else
			{
					header("location:patient.php?flag2=1");
			}
		}
	}

	function redirect($url,$myusername)
	{
		ob_start();
		header('Location: '.$url.'?success_user='.$myusername);
		ob_end_flush();
		die();
	}

?>
