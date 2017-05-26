<?php
require("mysqli_connect.php");

	if($_SERVER['REQUEST_METHOD']=='POST')
	{

		if(!empty($_POST['dusername']) and !empty($_POST['dpassword']))
		{

			$myusername = mysqli_real_escape_string($con,$_POST['dusername']);
			$mypassword = mysqli_real_escape_string($con,$_POST['dpassword']);
			$pascodeen = hash('sha256',$mypassword);
			$query = "SELECT * FROM DLogin where d_username = '$myusername' AND d_password = '$pascodeen'";
			$result = mysqli_query($con,$query) or die(mysqli_error($con));
			//echo "haha";
			$count = mysqli_num_rows($result);
			//echo "string";

			if($count!=0)
			{
				echo "asdstring";
				$row = mysqli_fetch_assoc($result) or die(mysqli_error($con));
				session_start();
				$_SESSION['d_username'] = $row['d_password'];
				redirect("dd2.php",$myusername);
			}
			else
			{
					header("location:staff.php?flag2=1");
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
