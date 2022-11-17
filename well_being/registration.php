<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/registration.css" />
    <link rel="stylesheet" href="css/style.css" />


</head>

<body>
    <!-- header section starts  -->

    <header class="header">
        <a href="index.php" class="logo"><img src="logo/logo.png" alt="Well Being" /></a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="registration.php">Register</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <!-- header section ends -->

    <!-- Choose section ends -->

    <h1 style="margin-top: 140px">Registration...</h1>

    <div class="choose_option">
        <a href="pregistration_form.php">
            <div class="patient option">
                <center>
                    <img src="images/patient.gif" alt="Patient" />
                </center>
                <p>As a Patient</p>
            </div>
        </a>
        <a href="dregistration_form.php">
            <div class="doctor option">
                <center>
                    <img src="images/doctor.gif" alt="Doctor" />
                </center>
                <p>As a Doctor</p>
            </div>
        </a>
    </div>
</body>
<script src="js/script.js"></script>

</html>