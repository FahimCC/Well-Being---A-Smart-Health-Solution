<?php
session_start();

if(!isset($_SESSION['fname'])){
    echo ("You are logout");
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Profile</title>
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/profile.css" />

</head>

<body>
    <!-- header section starts  -->

    <header class="header">
        <a href="index.php" class="logo"><img src="logo/logo.png" alt="Well Being" /></a>

        <nav class="navbar">
            <a href="schedule.php">Add Schedule</a>
            <a href="prescribe.php">Prescribe</a>
            <a href="dprofile.php"><?php echo $_SESSION['fname']; ?></a>
            <a href="index.php">Logout</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <!-- header section ends -->


    <?php
        
        include "connection.php";
        
        $id = $_SESSION['bma'];
        $query = mysqli_query($con, "select * from doctor_registration where bma='$id'");
        $bma = mysqli_fetch_assoc($query);

    ?>


    <section class="profile">
        <div class="profile_picture">
            <img src="picture/<?php echo $bma['picture']; ?>" alt="Profile Picture" />
        </div>
        <div class="profile_info">
            <h3>Personal Information</h3>
            <div class="info">
                <div class="box">
                    <h4>Name</h4>
                    <p><?php echo $bma['fname']." ".$bma['lname']; ?></p>
                </div>
                <div class="box">
                    <h4>Email</h4>
                    <p><?php echo $bma['email']; ?></p>
                </div>
                <div class="box">
                    <h4>Mobile No</h4>
                    <p><?php echo $bma['mobile']; ?></p>
                </div>
                <div class="box">
                    <h4>Specialist</h4>
                    <p><?php echo $bma['speciality']; ?></p>
                </div>
                <div class="box">
                    <h4>Designation</h4>
                    <p><?php echo $bma['designation']; ?></p>
                </div>
                <div class="box">
                    <h4>BMA No</h4>
                    <p><?php echo $bma['bma']; ?></p>
                </div>
                <div class="box">
                    <h4>National ID</h4>
                    <p><?php echo $bma['nid']; ?></p>
                </div>
                <div class="box">
                    <h4>Gender</h4>
                    <p><?php echo $bma['gender']; ?></p>
                </div>
                <div class="box">
                    <h4>Blood Group</h4>
                    <p><?php echo $bma['blood']; ?></p>
                </div>
                <div class="box">
                    <h4>Date of Birth</h4>
                    <p><?php echo $bma['dob']; ?></p>
                </div>
            </div>

            <h3>Present Address</h3>
            <div class="info">
                <div class="box">
                    <h4>District</h4>
                    <p><?php echo $bma['district']; ?></p>
                </div>
                <div class="box">
                    <h4>Thana</h4>
                    <p><?php echo $bma['thana']; ?></p>
                </div>
                <div class="box">
                    <h4>Area</h4>
                    <p><?php echo $bma['area']; ?></p>
                </div>
                <div class="box">
                    <h4>Building No</h4>
                    <p><?php echo $bma['buildingno']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="schedule" style="background: #fff;">
        <h2>Schedule</h2>
        <table style="font-size: 18px;">
            <tr style="background-color: #f2f2f2;">
                <th>Place</th>
                <th>Weekdays</th>
                <th>Time</th>
                <th>Consult Fee(Tk)</th>
            </tr>
            <?php //include "connection.php";

            $query = mysqli_query($con, "select * from schedule where bma='$id'");

            while($schedule = mysqli_fetch_array($query)){?>
            <tr>
                <td><?php echo $schedule['place']; ?></td>
                <td><?php echo $schedule['weekdays']; ?></td>
                <td><?php echo $schedule['time']; ?></td>
                <td><?php echo $schedule['fee']; ?></td>
            </tr>
            <?php    }
    ?>
        </table>
    </section>
    <script src="js/script.js"></script>
</body>

</html>