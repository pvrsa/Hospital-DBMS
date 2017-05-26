<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>view all</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style media="screen">
    body {
        background: url(patient.jpg) no-repeat;
        background-size: 100%;
    }
    </style>
</head>
    <body>



            <?php
            $con= mysqli_connect("localhost","root","","HospitalDMS");
            ?>
            <br>
            <br>
            <br>
            <h2 align="center"> List of all doctors </h2>
            <table class="table table-striped table-bordered table-hover">
            <tr class="active">
                <th>Doctor's Name</th>
                <th>Doctor's Speciality</th>
                <th>Age bounds of the Doctor</th>
                <th>appointments per day</th>
                <th>Doctor's Contact</th>
                <th>Remove Doctor</th>
            </tr>
            <?php
            $que=mysqli_query($con,"select * from Doctor;");

             while($row_list2=mysqli_fetch_assoc($que))
            {
                $a=$row_list2['d_age_bound'];
                $id=$row_list2['d_id'];

                ?>
                 <tr>
                  <td class="success"><?php echo strtoupper($row_list2['d_fname'])." ".strtoupper($row_list2['d_lname']); ?>
                    </td>
                     <td class="success"><?php echo $row_list2['d_speciality']; ?>
                     </td>
                     <td class="success">
                    <?php
                    if($row_list2['d_age_bound']==10)
                        echo "1 - ".$row_list2['d_age_bound'];
                    else if($row_list2['d_age_bound']==30)
                        echo "10 - ".$row_list2['d_age_bound'];
                    else if($row_list2['d_age_bound']==60)
                        echo "30 - ".$row_list2['d_age_bound'];
                    else
                        echo "60 - ".$row_list2['d_age_bound'];
                     ?>
                     </td>
                     <td class="success"><?php echo $row_list2['d_max_app']; ?>
                     </td>
                     <td class="success"><?php echo $row_list2['d_contact']; ?>
                     </td>
                     <td class="success">
                         <?php
                         $next = "removeDoc.php?did=".$id; ?>
                     <form action=<?php echo $next; ?> method="post">
                             <button type="submit" class="btn btn-danger"  data-dissmiss="alert" style="text-align:left">Remove</button>
                     </form>
                     </td>
             </tr>
             <?php
            }
            ?>
        </table>
    </body>
</html>
