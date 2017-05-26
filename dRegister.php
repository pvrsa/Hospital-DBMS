<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Succesfull</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <span class="right">
                    <a href="MAIN.html">
                        <strong>Back to the MAIN PAGE</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
        </div>

        <nav class="codrops-demos">
        <h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "HospitalDMS";
        extract($_POST);

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO Doctor(d_fname,d_lname,d_uname,d_speciality,d_max_app,d_age_bound,d_contact) values('$dfname','$dlname','$dusernamesignup','$dspecial',$dapp,$dbound,'$dcontact')";

            // use exec() because no results are returned
            $conn->exec($sql);

            echo "Congrats";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

        $conn = null;
        ?>



        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "HospitalDMS";
        extract($_POST);
        $dpasscodeen = hash('sha256',$dpasswordsignup);

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO DLogin(d_username,d_password) values('$dusernamesignup','$dpasscodeen')";

            // use exec() because no results are returned
            $conn->exec($sql);

            echo "New record created successfully";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

        $conn = null;
        redirect("admin/index.php");

        function redirect($url)
        {
            ob_start();
            header('Location: '.$url.'?no=1');
            ob_end_flush();
            die();
        }
        ?>
    </h2>
    </nav>
    </body>
</html>
