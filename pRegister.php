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

            $sql = "INSERT INTO Patient(p_fname,p_lname,p_uname,p_contact,p_age) values('$pfname','$plname','$usernamesignup','$pcontact',$page)";

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
        $passcodeen = hash('sha256',$passwordsignup);

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO PLogin(p_username,p_password) values('$usernamesignup','$passcodeen')";

            // use exec() because no results are returned
            $conn->exec($sql);

            echo "New record created successfully";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

        $conn = null;
        redirect("patient.php");

        function redirect($url)
        {
            ob_start();
            header('Location: '.$url);
            ob_end_flush();
            die();
        }
        ?>
    </h2>
    </nav>
    </body>
</html>
