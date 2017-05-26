<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DOCTOR LOGGED IN</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>

    <body style="background-color:#abb8ce">
        <div class="container text-right">
                <span class="right">
                    <a href="staff.php">
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
               ?>
               <?php
               $c=$_GET["success_user"];
               $a=mysqli_query($con,"select * from Doctor where d_uname='$c'");
               $b=mysqli_fetch_assoc($a);
               $thope=$b['d_id'];
               $doccy=mysqli_query($con,"select count(*) from Appointment where app_doc_id=$thope and app_type= 'SURGERY' GROUP BY app_doc_id;");
               $doccyfet=mysqli_fetch_assoc($doccy);
               $doccy2=mysqli_query($con,"select count(*) from Appointment where app_doc_id=$thope and app_type= 'NORMAL' GROUP BY app_doc_id;");
                $doccyfet2=mysqli_fetch_assoc($doccy2);
               $countmax=$doccyfet['count(*)'];
               $countmax2=$doccyfet2['count(*)'];
               $getSal = mysqli_query($con,"select * from rate;");
              $fetSal = mysqli_fetch_assoc($getSal);
              $sur=$fetSal['SURGERY'];
              $nor=$fetSal['NORMAL'];
               $salary=$countmax * $sur + $countmax2 * $nor;

               $maxapp=mysqli_query($con,"select d_max_app from Doctor where d_id=$thope ;");
               $maxappfet=mysqli_fetch_assoc($maxapp);
               $maxappfet2=$maxappfet['d_max_app'];


               $id = $b['d_id'];
               echo strtoupper($b['d_fname'].' '.$b['d_lname']);
                ?>

            </h2>
        </div>
        <table class="table table-bordered table-inverse">
            <thead>
                <tr>
                    <th style="padding-top:10px">
                        <div class="bg-success text-white text-center" style="font-size:30px">
                            <?php $lala="dTodayApp.php?id=".$id; ?>
                                <a href=<?php echo $lala; ?> >View Today's Appointments
                                </a>
                        </div>

                    </th>
                    <th style="padding-top:10px">
                        <div class="bg-warning text-white text-center" style="font-size:30px">
                            <?php $lala="dAllApp.php?id=".$id; ?>
                                <a href=<?php echo $lala; ?> >View all appointments
                            </a>
                        </div>
                    </th>

                </tr>
            </thead>
        </table>

        <?php
        $que=mysqli_query($con,"select * from Team_mem,d_team where t_id=mem_id and dteam_id=$id;");
        $cnt=mysqli_num_rows($que);?>
        <h2 align="center"> Your Team Members</h2>
        <?php
        if($cnt){
         ?>
        <table class="table table-striped table-bordered table-hover">
        <tr class="active">
            <th>Name</th>
            <th>Contact</th>
            <th>Type</th>
            <th>Remove</th>

        </tr>
        <?php
         while($row_list2=mysqli_fetch_assoc($que))
         {
            $tid= $row_list2['mem_id'];
            ?>
             <tr>
                 <td class="success"><?php echo strtoupper($row_list2['t_fname'])." ".strtoupper($row_list2['t_lname']); ?>
                </td>
                 <td class="success"><?php echo $row_list2['t_contact']; ?>
                 </td>
                 <td class="success"><?php echo $row_list2['t_type']; ?>
                 </td>
                 <td class="success">
                     <?php
                     $next = "removeTM.php?tid=".$tid."&did=".$id."&success_user=".$c; ?>
                 <form action=<?php echo $next; ?> method="post">
                         <button type="submit" class="btn btn-danger"  data-dissmiss="alert" style="text-align:left">Remove</button>
                 </form>
                 </td>

         </tr>
         <?php
            }
        }else{?>
            <div class="container text-center">
                YOU HAVE NO TEAM MEMBERS
                <br>
            </div>

        <?php } ?>
        <br>
        </table>

        <hr>
        <br>
        <br>
        <div class="container text-center">
                <span class="center">
                    <?php $adding="insertTeam.php?did=".$id."&success_user=".$c; ?>
                    <a href=<?php echo $adding; ?>>
                        <h5>Click Here to add Team members</h5>
                    </a>
                </span>
                <br>
                <br>
                
                <span class="center" style="font-size:20px">
                    <?php echo "Your current max appoitments per day is : ".$maxappfet2;  ?>
                </span>
                <span class="center">
                    <?php $adding="changeMaxApp.php?did=".$id."&success_user=".$c; ?>
                    <a href=<?php echo $adding; ?>>
                        <h5>Click Here to Change Max Appointments per day</h5>
                    </a>
                </span>
                <br>
                <br>
                <span class="left">
                        <h5>CURRENT SALARY IS : <?php echo $salary; ?></h5>
                    </a>
                </span>
                <div class="clr"></div>
        </div>

    </body>
</html>
