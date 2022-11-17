<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prescribe</title>
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/prescribe.css" />

</head>

<body>
    <!-- header section starts  -->

    <header class="header">
        <a href="index.php" class="logo"><img src="logo/logo.png" alt="Well Being" /></a>

        <nav class="navbar">
            <a href="prescribe.php">Prescribe</a>
            <a href="dprofile.php">Profile</a>
            <a href="index.php">Logout</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <!-- header section ends -->

    <div class="container">
        <div class="element">
            <form action="" method="POST">
                <input type="text" placeholder="Doctor Name" name="doctorname" class="box" required />
                <input type="text" placeholder="Patient ID" name="patientid" class="box" />
                <input type="text" placeholder="Disease Name" name="diseasename" class="box" required />
                <input type="textarea" placeholder="Solution" name="solution" class="box" rows="3" cols="50" />
                <input type="textarea" placeholder="Medicine" name="medicine" class="box" rows="3" cols="50" />
                <input type="submit" value="PRESCRIBE" name="submit" class="btn" />
            </form>
        </div>
    </div>
    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>
<?php
	include "connection.php";

	if(isset($_POST['submit'])){
		$doctorname = $_POST['doctorname'];
		$patientid = $_POST['patientid'];
		$diseasename = $_POST['diseasename'];
		$solution = $_POST['solution'];
		$medicine = $_POST['medicine'];
        $date = date("Y-m-d, H:i");
		

        $insertquery = mysqli_query($con, "insert into prescribe_table(doctorname,patientid,diseasename,solution,medicine,date)values('$doctorname', '$patientid', '$diseasename', '$solution', '$medicine', '$date')");

        if($insertquery){
             echo ("Inserted Successful");
             header('location:dprofile.php');
        } 
        else{
            echo ("not inserted");
        }
    }
?>

</html>