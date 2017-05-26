<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>view all</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style media="screen">
    body {
        background: url(patient.jpg) no-repeat;
        background-size: 100%;
    }
    </style>
</head>
    <body>
        
            <?php
            $var=$_GET['id'];
            $con= mysqli_connect("localhost","root","","HospitalDMS");
            ?>
            <br>
            <br>
            <br>
            <h2 align="center"> Your registered appointments </h2>
            <table class="table table-striped table-bordered table-hover">
            <tr class="active">
                <th>Doctor's Name</th>
                <th>Date of Appointment</th>
                <th>Doctor's Contact</th>
                <th>Type</th>
                <th>Cancel Appointment</th>

            </tr>
            <?php
            $que=mysqli_query($con,"select app_id,app_doc_id,app_date,app_type from Appointment where app_pat_id=$var;");
             while($fet=mysqli_fetch_assoc($que))
             {
                 $a=$fet['app_date'];
                 $b=$fet['app_doc_id'];
                 $c=$fet['app_type'];
                 $d=$fet['app_id'];
                 $que2=mysqli_query($con,"select d_fname,d_lname ,d_contact from Doctor where d_id=$b;");
                 $row_list2=mysqli_fetch_assoc($que2);
                ?>
                 <tr>
                  <td class="success"><?php echo strtoupper($row_list2['d_fname'])." ".strtoupper($row_list2['d_lname']); ?>
                    </td>
                     <td class="success"><?php echo $a; ?>
                     </td>
                     <td class="success"><?php echo $row_list2['d_contact']; ?>
                     </td>
                     <td class="success"><?php echo $c; ?>
                     </td>

                     <td class="success">
                         <?php
                         $next = "removeApp.php?aid=".$d."&pid=".$var; if($a>=date("Y-m-d")){?>
                     <form action=<?php echo $next; ?> method="post">
                             <button type="submit" class="btn btn-danger"  data-dissmiss="alert" style="text-align:right">Cancel</button>
                     </form><?php } ?>
                     </td>

             </tr>
             <?php
            }
            ?>
        </table>
    </body>
</html>
