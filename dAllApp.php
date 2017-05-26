<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View All</title>
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
            <h2 align="center"> Your registered Appointments </h2>
            <table class="table table-striped table-bordered table-hover">

            <?php
            $que=mysqli_query($con,"select app_pat_id,app_date,app_type from Appointment where app_doc_id=$var;");
            if(mysqli_num_rows($que)){?>
                <tr class="active">
                    <th>Patient's Name</th>
                    <th>Date of Appointment</th>
                    <th>Patient's Contact</th>
                    <th>Patient's Age</th>
                    <th>Type</th>

                </tr>
                <?php
             while($fet=mysqli_fetch_assoc($que))
             {
                 $a=$fet['app_date'];
                 $b=$fet['app_pat_id'];
                 $c=$fet['app_type'];
                 $que2=mysqli_query($con,"select * from Patient where p_id=$b;");
                 $row_list2=mysqli_fetch_assoc($que2);
                ?>
                 <tr>
                  <td class="success"><?php echo strtoupper($row_list2['p_fname'])." ".strtoupper($row_list2['p_lname']); ?>
                    </td>
                     <td class="success"><?php echo $a; ?>
                     </td>
                     <td class="success"><?php echo $row_list2['p_contact']; ?>
                     </td>
                     <td class="success"><?php echo $row_list2['p_age']; ?>
                     </td>
                     <td class="success"><?php echo $c; ?>
                     </td>

             </tr>
             <?php
            }
        }else{ ?>
            <div class="container text-center">
                <br>
                <br>
                <br>

                <h1>YOU HAVE NO APPOINTMENTS</h1>
                <br>
                <br>
                <br>
                <br>
            </div>

        <?php } ?>
        </table>
    </body>
</html>
