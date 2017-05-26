<?php

create_csv_string();

function create_csv_string() {

    $con= mysqli_connect("localhost","root","","HospitalDMS");


    $data = mysqli_query($con,"SELECT d_speciality,count(*)  FROM Doctor,Appointment where d_id=app_doc_id GROUP BY d_speciality INTO OUTFILE 'patreport.csv';");

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
