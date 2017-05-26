<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <span class="right">
                    <a href="MAIN.html">
                        <strong>Back to the main page</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->

            <?php
            extract($_POST);
            $failed = 0;
                if($auname && $auname == 'admin' && $apass == 'manager'){
                    echo "REST OF HTML GOES HERE";
                }else {
                    $failed = 1;
                    header("location:admin.php?flag=$failed");
                }

            ?>

            <a href="addDoctor.php">ADD DOCTORS</a>
        </div>



    </body>
</html>
