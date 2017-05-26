<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Appointment Select</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <style media="screen">
        body {
            background: url(patient.jpg) no-repeat;
            background-size: 100%;
        }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>

    <body>
        <?php
            extract($_POST);
            $speciality=$_GET['speciality'];
            $date=$_GET['sdate'];
            $age=$_GET['age'];
            $pid = $_GET['id'];

            $bound;
            if($age <= 10)
            {
                $bound=10;
            }
            else if($age <= 30)
            {
                $bound=30;
            }
            else if($age <= 60)
            {
                $bound=60;
            }
            else
            {
                $bound=100;
            }
            $con= mysqli_connect ("localhost","root","","HospitalDMS");
            $temp = mysqli_query($con,"select d_id,count(*) from Appointment,Doctor where d_speciality='$speciality' and app_date='$date' and app_doc_id=d_id and d_age_bound=$bound group by d_id;");
            $temp2 = mysqli_query($con,"select d_id,d_fname from Doctor where d_id not in (select d_id from Appointment,Doctor where d_speciality='$speciality' and app_date='$date' and app_doc_id=d_id group by d_id) and d_speciality='$speciality'and d_age_bound=$bound;");

            if(mysqli_num_rows($temp2)+mysqli_num_rows($temp)){
            ?>
        <table class="table table-striped table-bordered table-hover">
            <tr class="active">
                <th>Doctor's Name</th>
                <th>Date of Appointment</th>
                <th>Doctor's Contact</th>
                <th>Type of Appointment</th>
                <th>Select Here</th>
            </tr>


        <?php
    }else {?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 style="text-align:center">NO DOCTORS AVAILABLE</h1>
        
    <?php }
            while($temp_list=mysqli_fetch_assoc($temp)){

                $a = $temp_list['d_id'];
                $b = $temp_list['count(*)'];
                $list = mysqli_query($con,"select d_id,d_fname,d_lname,d_contact from Doctor where d_id='$a' and d_max_app>$b and d_age_bound=$bound;");

                $lists = mysqli_query($con,"select d_max_app from Doctor where d_id='$a';");
                $x=mysqli_fetch_assoc($lists);
                if($list && $b<$x['d_max_app']){
                    $row_list=mysqli_fetch_assoc($list);
            ?>
            <tr>
            <td class="success"><?php echo strtoupper($row_list['d_fname'])." ".strtoupper($row_list['d_lname']); ?>
            </td>
            <td class="success"><?php echo $date; ?>
            </td>
            <td class="success"><?php echo $row_list['d_contact']; ?>
            </td>
            <td class="success">
            <div class = "btn-group">
               <button type = "button" class = "btn btn-primary" data-toggle = "dropdown">
                  Select
                  <span class = "caret"></span></button>
                  <ul class = "dropdown-menu" role = "menu">
                      <?php
                      $x = "appointment.php?speciality=".$speciality."&sdate=".$date."&age=".$age."&id=".$pid;
                       ?>
                      <li><a href=<?php echo $x."&tApp=NORMAL"; ?>> NORMAL</a></li>
                      <li class = "divider"></li>
                      <li><a href=<?php echo $x."&tApp=SURGERY"; ?>>SURGERY</a></li>
                  </ul>


            </div>
            </td>
            <td class="success">
                <?php
                $tApp=$_GET['tApp'];

                $next = "insertApp.php?pid=".$pid."&did=".$a."&date=".$date."&tApp=".$tApp ; ?>
            <form action=<?php echo $next; ?> method="post">
                    <button type="submit" class="btn btn-danger"  data-dissmiss="alert" style="text-align:left">Select</button>
            </form>
            </td>
        </tr>
            <?php
                }
            }


            while($temp2_list=mysqli_fetch_assoc($temp2)){

                $a = $temp2_list['d_id'];
                $aname = $temp2_list['d_fname'];

                $list2 = mysqli_query($con,"select d_id,d_fname,d_lname,d_contact from Doctor where d_fname='$aname' and d_speciality='$speciality' and d_age_bound=$bound;");
                if($list2){
                    $row2_list=mysqli_fetch_assoc($list2);

                    ?>
                    <tr>
                    <td class="success"><?php echo strtoupper($row2_list['d_fname'])." ".strtoupper($row2_list['d_lname']); ?>
                    </td>
                    <td class="success"><?php echo $date; ?>
                    </td>
                    <td class="success"><?php echo $row2_list['d_contact']; ?>
                    </td>
                    <td class="success">
                    <div class = "btn-group">
                       <button type = "button" class = "btn btn-primary" data-toggle = "dropdown">
                          Select
                          <span class = "caret"></span></button>
                          <ul class = "dropdown-menu" role = "menu">
                              <?php
                              $x = "appointment.php?speciality=".$speciality."&sdate=".$date."&age=".$age."&id=".$pid;
                               ?>
                              <li><a href=<?php echo $x."&tApp=NORMAL"; ?>>NORMAL</a></li>
                              <li class = "divider"></li>
                              <li><a href=<?php echo $x."&tApp=SURGERY"; ?>>SURGERY</a></li>
                          </ul>
                     </div>
                    </td>
                    <td class="success">
                        <?php
                        $tApp=$_GET['tApp'];

                        $next = "insertApp.php?pid=".$pid."&did=".$a."&date=".$date."&tApp=".$tApp ; ?>
                        <form action=<?php echo $next; ?> method="post">
                            <button type="submit" class="btn btn-danger"  data-dissmiss="alert" style="text-align:left">Select</button>
                        </form>
                    </td>
                </tr>
            <?php

                }
            }

         ?>


        </table>
    </body>
</html>
