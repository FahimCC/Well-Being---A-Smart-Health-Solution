<?php
session_start();

if(!isset($_SESSION['username'])){
    echo ("You are logout");
    header('location:index.php');
}
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="logo/logo.ico" type="image/x-icon">
    <title>Dashboard</title>

    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/dashboard.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <a href="dashboard.php"><img src="logo/logo.png" alt="Well Being" /></a>
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
                    <a href="index.php"><i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <div class="main_content">
            <h1>Welcome!! Have a nice day.</h1>
            <div class="image">
                <img src="images/engineer.gif" alt="Backend Developer" />
            </div>
        </div>
    </div>
</body>

</html>