<?php

    include 'connection.php';

    $id = $_GET['id'];

    $query = mysqli_query($con, "delete from doctor_registration where bma='$id'");

    header('location:doctor_list.php');
?>