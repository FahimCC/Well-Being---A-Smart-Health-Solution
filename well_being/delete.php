<?php

    include 'connection.php';

    $id = $_GET['id'];

    $query = mysqli_query($con, "delete from schedule where serial='$id'");

    header('location:schedule.php');
?>