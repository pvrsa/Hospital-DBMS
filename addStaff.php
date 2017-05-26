<!DOCTYPE html>

 <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>ADD Staff</title>
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

                            <form  action="sRegister.php" autocomplete="on" method="post">
                                <h1> Sign up </h1>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Staff's Firstname</label>
                                    <input id="usernamesignup" name="sfname" required="required" type="text" placeholder="myfirstname" />
                                </p>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Staff's Lastname</label>
                                    <input id="usernamesignup" name="slname"  type="text" placeholder="mylastname" />
                                </p>

                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Type of Staff</label>
                                    <input id="usernamesignup" name="stype" required="required" type="text" placeholder="myusername" />
                                </p>
                                <p>
                                    <label for="emailsignup" class="youmail" data-icon="e" > Staff's Contact Number</label>
                                    <input id="emailsignup" name="scontact" type="text" placeholder="1234567890"/>
                                </p>

                                <p class="signin button">
									<input type="submit" value="Sign up"/>
								</p>

                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </body>
</html>
