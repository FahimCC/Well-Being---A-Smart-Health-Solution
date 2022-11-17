<?php

    include 'connection.php';

    $id = $_GET['id'];

    $query = mysqli_query($con, "delete from patient_registration where patientid='$id'");

    header('location:patient_list.php');
?>