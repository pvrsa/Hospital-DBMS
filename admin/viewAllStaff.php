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
            <h2 align="center"> List of all staff </h2>
            <table class="table table-striped table-bordered table-hover">
            <tr class="active">
                <th>Staff's Name</th>
                <th>Staff's Designation</th>
                <th>Staff's Contact</th>
                <th>Remove Staff</th>
            </tr>
            <?php
            $que=mysqli_query($con,"select * from Team_mem;");

             while($row_list2=mysqli_fetch_assoc($que))
            {
                $sid=$row_list2['t_id'];

                ?>
                 <tr>
                  <td class="success"><?php echo strtoupper($row_list2['t_fname'])." ".strtoupper($row_list2['t_lname']); ?>
                    </td>
                     <td class="success"><?php echo $row_list2['t_type']; ?>
                     </td>

                     <td class="success"><?php echo $row_list2['t_contact']; ?>
                     </td>
                     <td class="success">
                         <?php
                         $next = "removeStaff.php?sid=".$sid; ?>
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
