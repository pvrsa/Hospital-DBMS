<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page</title>

    <!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>


</head>

<body style="background-color:#a4b6db">
    <?php
    extract($_POST);
    $failed = 0;

        if(isset($_GET['no']) || $auname && $auname == 'admin' && $apass == 'manager'){
        }else {
            $failed = 1;
            header("location:../admin.php?flag=$failed");
        }

    ?>
    <?php
    $con= mysqli_connect("localhost","root","","HospitalDMS");
    $que=mysqli_query($con,"select * from Doctor;");
    $dcount=mysqli_num_rows($que);
    $que2=mysqli_query($con,"select * from Patient;");
    $pcount=mysqli_num_rows($que2);
    $que3=mysqli_query($con,"select * from Team_mem;");
    $scount=mysqli_num_rows($que3);
    $rateque=mysqli_query($con,"select * from rate;");
    $ratefet=mysqli_fetch_assoc($rateque);
     ?>

<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">

                <a class="navbar-brand" href="index.html">Administrator-Hospital Management System</a>
            </div>

            <div class="navbar-header" style="margin-left:800px;padding-top:10px">
                <a href="../MAIN.html" style="font-size:20px">LOGOUT</a>
            </div>
            <!-- /.navbar-header -->
        </nav>

        <div style="margin:30px">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" >Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-plus-sign" style="font-size: 50px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $dcount; ?></div>
                                    <div>No of Doctors</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="viewAllDocs.php">View all Doctors</a></span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-user" style="font-size: 50px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $pcount; ?></div>
                                    <div>No of Patients Registered</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="viewAllPat.php">View Info of Patients</a></span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-tint" style="font-size: 50px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $scount; ?></div>
                                    <div>No of staff</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="viewAllStaff.php">View Staff Details</a></span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-heart" style="font-size: 50px"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div><a href="../addDoctor.php" style="color:white;font-size:30px">Add Doctors</a></div>
                                    <div><a href="../addStaff.php" style="color:white;font-size:30px">Add Staff</a></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-3">

                </div>

                <div class="col-sm-3">
                    <div class="panel panel-info" style="background-color:#42b6f4">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-euro" style="font-size: 50px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $ratefet['NORMAL']; ?></div>
                                    <div>Rate for each Appointment</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="changeRate.php">Change rate</a></span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-euro" style="font-size: 50px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $ratefet['SURGERY']; ?></div>
                                    <div>Rate for each Surgery</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="changeRate.php">Change rate</a></span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-3">

                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-3">
                    <div class="panel panel-danger" style="background-color:#42b6f4">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-duplicate" style="font-size: 50px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Reports</div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="reports.html">Generate Reports</a></span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">

                </div>
            </div>
        </div>
    </div>

</body>

</html>
