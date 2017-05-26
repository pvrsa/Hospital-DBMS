<?php

create_csv_string();

function create_csv_string() {

    $con= mysqli_connect("localhost","root","","HospitalDMS");


    $data = mysqli_query($con,"SELECT d_fname,d_lname,count(*)  FROM Appointment,Doctor where app_type='SURGERY' GROUP BY d_fname INTO OUTFILE 'docsurgeryreport.csv';");


    redirect("reports.html");

}

function redirect($url)
{
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}


 ?>
