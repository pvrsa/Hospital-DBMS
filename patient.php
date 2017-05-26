<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Patient Login</title>
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
            <header>
                <h1>Please fill in the details</h1>
            </header>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="pLogin2.php" autocomplete="on" method = "POST">
                                <h1>Patient Login</h1>
                                <label for="username" class="uname" data-icon="u" >Your username </label>
                                    <input id="username" name="luname" required="required" type="text" placeholder="myusername"/>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="lpass" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <?php
                                $flag=0;
                                    if(isset($_GET["flag2"]) ){
                                        echo "Wrong password";
                                    }
                                 ?>
                                <p class="login button">
                                    <input type="submit" value="Login" />
								</p>

                                <p class="change_link">

									Not registered yet ?
									<a href="#toregister" class="to_register">Register</a>
								</p>
                            </form>

                        </div>

                        <div id="register" class="animate form">
                            <form  action="pRegister.php" autocomplete="on" method="post">
                                <h1> Sign up </h1>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Your Firstname</label>
                                    <input id="usernamesignup" name="pfname" required="required" type="text" placeholder="myfirstname" />
                                </p>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Your Lastname</label>
                                    <input id="usernamesignup" name="plname"  type="text" placeholder="mylastname" />
                                </p>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Your Age</label>
                                    <input id="usernamesignup" name="page"  type="number" placeholder="35" />
                                </p>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="myusername" />
                                </p>
                                <p>
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your Contact Number</label>
                                    <input id="emailsignup" name="pcontact" type="tel" pattern="^\d{10}$" placeholder="1234567890"/>
                                </p>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button">
									<input type="submit" value="Sign up"/>
								</p>
                                <p class="change_link">
									Already registered?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </body>
</html>
