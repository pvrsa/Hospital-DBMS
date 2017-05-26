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
    </head>

    <body>
        <?php
            $did=$_GET['did'];
            $success_user = $_GET['success_user'];
            $con= mysqli_connect ("localhost","root","","HospitalDMS");
            $temp = mysqli_query($con,"select * from Team_mem where t_id not in(select mem_id from d_team where dteam_id=$did);");

            if(mysqli_num_rows($temp)){
            ?>
        <table class="table table-striped table-bordered table-hover">
            <tr class="active">
                <th>Staff's Name</th>
                <th>Staff's Contact</th>
                <th>Designation</th>
                <th>Select Here</th>
            </tr>


        <?php
    }else {
        echo "NO Staff Available";
    }
            while($row_list=mysqli_fetch_assoc($temp)){
                $tid=$row_list['t_id'];
            ?>
            <tr>
            <td class="success"><?php echo strtoupper($row_list['t_fname'])." ".strtoupper($row_list['t_lname']); ?>
            </td>
            <td class="success"><?php echo $row_list['t_contact']; ?>
            </td>
            <td class="success"><?php echo $row_list['t_type']; ?>
            </td>
            <td class="success">
                <?php
                $pid = $_GET['did'];
                $next = "insertSelTeam.php?tid=".$tid."&did=".$did."&success_user=".$success_user ; ?>
            <form action=<?php echo $next; ?> method="post">
                    <button type="submit" class="btn btn-danger"  data-dissmiss="alert" style="text-align:left">Add</button>
            </form>
            </td>
        </tr>
            <?php
                }
                ?>

        </table>
    </body>
</html>
