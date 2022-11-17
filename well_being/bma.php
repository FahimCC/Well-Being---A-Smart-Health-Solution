<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BMA No</title>

    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bma.css" />
    <link rel="stylesheet" href="css/style.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <a href="dashboard.php"><img src="../logo/logo.png" alt="Well Being" /></a>
            </div>
            <ul>
                <li>
                    <a href="doctor_list.php"><i class="fas fa-user-md"></i>Doctor List</a>
                </li>
                <li>
                    <a href="patient_list.php"><i class="fas fa-user-injured"></i>Patient List</a>
                </li>
                <li>
                    <a href="bma.php"><i class="fas fa-plus"></i>Add BMA No</a>
                </li>
                <li>
                    <a href="index.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="element">
                <!-- otp.php -->
                <form action="" method="POST">
                    <input type="text" placeholder="BMA No" name="bmano" class="box" />
                    <input type="submit" value="ADD" name="submit" class="btn" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
	include "connection.php";

	if(isset($_POST['submit'])){
		$bmano = $_POST['bmano'];

		$bmanoquery = mysqli_query($con, "select * from  bma_table where bmano='$bmano'");
		
		$bmanocount = mysqli_num_rows($bmanoquery);
		

		if($bmanocount > 0){
            echo ("BMA no already exists.");  
        } 
        else{
            $insertquery = mysqli_query($con, "insert into bma_table(bmano)values('$bmano')");

            if($insertquery){
                echo ("Inserted Successful");
                header('location:bma.php');
            } 
            else{
                echo ("Not inserted");
                ?><script>
alert("Not inserted")
</script><?php
}
}
}

?>