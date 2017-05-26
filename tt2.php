<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <style media="screen">
            h3{
                border-left: 6px solid blue;
                background-color: #D6C6C6;
                padding-top: 10px;
            }

            .dropdown-menu{
                font-style: oblique;
                background-color:#afc6d6;
            }
            body {
                background: url(patient.jpg) no-repeat;
                background-size: 100%;
            }
        </style>

    </head>
    <body  >

        <div class="container text-right">
                <span class="right">
                    <a href="patient.php">
                        <h4><strong>LOGOUT</strong></h4>
                    </a>
                </span>
                <div class="clr"></div>
        </div>

        <br>
        <br>
        <div class="container text-center">
            <h2>
                WELCOME
                <?php
                    $con= mysqli_connect ("localhost","root","","HospitalDMS");
                    $speciality;
                    $sdate;
               ?>
               <?php
               $c=$_GET["success_user"];
               $a=mysqli_query($con,"select p_id,p_fname,p_lname,p_age from Patient where p_uname='$c'");
               $b=mysqli_fetch_assoc($a);
               $age = $b['p_age'];
               $id = $b['p_id'];
               echo strtoupper($b['p_fname'].' '.$b['p_lname']);
                ?>

            </h2>


        </div>
        <br>
        <br>

            <table class="table table-bordered table-inverse">
                <thead>
                    <tr>
                        <th style="padding-top:10px">
                            <div class="bg-success text-white text-center" style="font-size:30px">
                                <?php
                                $datetake = date("Y-m-d");
                                $take=mysqli_query ($con,"select app_id,app_date from Appointment where app_pat_id=$id and app_date > '$datetake' order by app_date;");
                                $cou=mysqli_num_rows($take);
                                if($cou)
                                {
                                    $res=mysqli_fetch_assoc($take);
                                    $f=$res['app_date'];
                                    $g=$res['app_id'];

                                    $dname=mysqli_query($con,"select d_fname,d_lname from Appointment,Doctor where d_id=app_doc_id and app_id=$g");

                                    $res2=mysqli_fetch_assoc($dname);
                                    $h=$res2['d_fname'];
                                    $i=$res2['d_lname'];
                                    $h2=strtoupper($h);
                                    $i2=strtoupper($i);

                                        echo "Your next appointment is on"." ".$f." with"." ".$h2." ".$i2;
                                }
                                else {
                                    echo " you have no appointments";
                                }
                                 ?>
                            </div>

                        </th>
                        <th style="padding-top:10px">
                            <div class="bg-warning text-white text-center" style="font-size:30px">
                                <?php $lala="pastapp.php?id=".$id; ?>
                                    <a href=<?php echo $lala; ?> >View all appointments
                                </a>
                            </div>
                        </th>

                    </tr>
                </thead>

            </table>


          <br>
          <br>
          <br>
          <br>
          <br>

          <div class="container">
                  <div class="row text-center">
                      <div class="col-sm-6">
                          <div class = "btn-group">
                             <button type = "button" class = "btn btn-primary dropdown" data-toggle = "dropdown">
                                Specality
                                <span class = "caret"></span>
                           </button>
                           <ul class = "dropdown-menu" role = "menu">

                              <?php
                                $list=mysqli_query($con,"select d_speciality from Doctor group by d_speciality");
                                while($row_list=mysqli_fetch_assoc($list)){
                                    $temp = $row_list['d_speciality'];
                                    $url = "tt2.php?success_user=".$c."&speciality=".$temp;

                                ?>
                              <li class = "divider"></li>

                              <li><a href = <?php echo $url; ?>><?php

                              echo strtoupper($row_list['d_speciality']);
                               ?></a>
                               <?php
                               }
                               ?>
                           </li>
                           </ul>
                          </div>
                          <br>
                          <h4 style="color:#2e127a">
                          <?php
                          if(!empty($_GET['speciality'])){
                          $speciality = $_GET['speciality'];
                          echo "You selected ".$speciality;
                            }
                           ?></h4>
                      </div>

                      <div class="col-sm-3">
                          <div class = "btn-group">
                             <button type = "button" class = "btn btn-primary" data-toggle = "dropdown">
                                Selected Date
                                <span class = "caret"></span>
                           </button>
                           <ul class = "dropdown-menu" role = "menu">
                               <?php
                               $no = 0;
                               while ($no < 7) {
                                   $no++;
                                   $date = date("Y-m-d",strtotime("+$no day"));

                                  $url = "tt2.php?success_user=".$c."&speciality=".$speciality."&sdate=".$date;
                              ?>
                              <li class = "divider"></li>
                              <li><a href = <?php echo $url; ?>>

                                  <?php
                                    // echo "2017-04-".(date("d")+$no);
                                    echo $date;
                                   ?>
                                   </a></li>
                              <?php } ?>
                           </ul>
                          </div>
                          <br>
                          <h4 style="color=#2e127a">
                          <?php
                          if(!empty($_GET['sdate']))
                            echo $_GET['sdate'];
                           ?>
                       </h4>
                      </div>

                      <div class="col-sm-3">
                          <?php
                          $x="#";
                          if(!empty($_GET['speciality']) & !empty($_GET['sdate']))
                          $x = "appointment.php?speciality=".$speciality."&sdate=".$_GET['sdate']."&age=".$age."&id=".$id."&tApp=";

                           ?>
                          <form action=<?php echo $x; ?> method="post">
                              <button type="submit" class="btn btn-success">
                                  GO
                              </button>
                          </form>

                      </div>

              </div>
              <div class="row">
                  <div class="col-sm-6">

                  </div>
                  <div class="col-sm-3">

                  </div>

              </div>
              <br>
              <br>
              <p class="p text-center">OR </p>
              <br>
              <br>

              <div class="row text-center">
                  <form action="viewAllDocs.php" method="post">
                      <button type="submit" class="btn btn-info">
                          VIEW ALL DOCS
                      </button>
                  </form>
              </div>
          </div>


    </body>
</html>
