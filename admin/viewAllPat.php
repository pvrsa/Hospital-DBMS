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
            <h2 align="center"> List of all patients </h2>
            <table class="table table-striped table-bordered table-hover">
            <tr class="active">
                <th>Patient's Name</th>
                <th>Patient's Contact</th>
                <th>Patient's Age</th>
            </tr>
            <?php
            $que=mysqli_query($con,"select * from Patient;");

             while($row_list2=mysqli_fetch_assoc($que))
            {
                $sid=$row_list2['p_id'];

                ?>
                 <tr>
                  <td class="success"><?php echo strtoupper($row_list2['p_fname'])." ".strtoupper($row_list2['p_lname']); ?>
                    </td>
                     <td class="success"><?php echo $row_list2['p_contact']; ?>
                     </td>
                     <td class="success"><?php echo $row_list2['p_age']; ?>
                     </td>

             </tr>
             <?php
            }
            ?>
        </table>
    </body>
</html>
