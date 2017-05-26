<?php

create_csv_string();

function create_csv_string() {

    $con= mysqli_connect("localhost","root","","HospitalDMS");


    $data = mysqli_query($con,"SELECT t_fname,t_lname,t_type,count(*)  FROM Doctor,Team_mem,d_team where mem_id=t_id and d_id=dteam_id
        group by t_fname INTO OUTFILE 'staffreport.csv';");




}

redirect("reports.html");

        function redirect($url)
        {
            ob_start();
            header('Location: '.$url);
            ob_end_flush();
            die();
        }

 ?>
