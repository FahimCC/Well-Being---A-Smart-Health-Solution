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
    <title>Patient Profile</title>
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
            <a href="pdoctor_list.php">Search Doctor</a>
            <a href="pprofile.php">
                <?php echo $_SESSION['fname']; ?>
            </a>
            <a href="index.php">Logout</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <!-- header section ends -->


    <?php
        
        include "connection.php";
        
        $id = $_SESSION['patientid'];
        $query = mysqli_query($con, "select * from patient_registration where patientid='$id'");
        $patientid = mysqli_fetch_assoc($query);

     ?>

    <section class="profile">
        <div class="profile_picture">
            <img src="picture/<?php echo $patientid['picture']; ?>" alt="Profile Picture" />
        </div>
        <div class="profile_info">
            <h3>Personal Information</h3>
            <div class="info">
                <div class="box">
                    <h4>Name</h4>
                    <p>
                        <?php echo $patientid['fname']." ".$patientid['lname']; ?>
                    </p>
                </div>
                <div class="box">
                    <h4>Patient ID</h4>
                    <p><?php echo $patientid['patientid']; ?></p>
                </div>
                <div class="box">
                    <h4>Email</h4>
                    <p><?php echo $patientid['email']; ?></p>
                </div>
                <div class="box">
                    <h4>Mobile No</h4>
                    <p><?php echo $patientid['mobile']; ?></p>
                </div>
                <div class="box">
                    <h4>Birth Certificate No</h4>
                    <p><?php echo $patientid['bcn']; ?></p>
                </div>
                <div class="box">
                    <h4>National ID</h4>
                    <p><?php echo $patientid['nid']; ?></p>
                </div>
                <div class="box">
                    <h4>Gender</h4>
                    <p><?php echo $patientid['gender']; ?></p>
                </div>
                <div class="box">
                    <h4>Blood Group</h4>
                    <p><?php echo $patientid['blood']; ?></p>
                </div>
                <div class="box">
                    <h4>Date of Birth</h4>
                    <p><?php echo $patientid['dob']; ?></p>
                </div>
            </div>

            <h3>Present Address</h3>
            <div class="info">
                <div class="box">
                    <h4>District</h4>
                    <p><?php echo $patientid['district']; ?></p>
                </div>
                <div class="box">
                    <h4>Thana</h4>
                    <p><?php echo $patientid['thana']; ?></p>
                </div>
                <div class="box">
                    <h4>Area</h4>
                    <p><?php echo $patientid['area']; ?></p>
                </div>
                <div class="box">
                    <h4>Building No</h4>
                    <p><?php echo $patientid['buildingno']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="prescription" style="background: #fff;">
        <h2>Prescription</h2>
        <table style="font-size: 18px;">
            <tr style="background-color: #f2f2f2;">
                <th>Doctor Name</th>
                <th>Disease Name</th>
                <th>Solution</th>
                <th>Medicine</th>
                <th>Date</th>
            </tr>
            <?php include "connection.php";

            $query = mysqli_query($con, "select * from prescribe_table where patientid='$id'");

            while($rows = mysqli_fetch_array($query)){?>
            <tr>
                <td><?php echo $rows['doctorname']; ?></td>
                <td><?php echo $rows['diseasename']; ?></td>
                <td><?php echo $rows['solution']; ?></td>
                <td><?php echo $rows['medicine']; ?></td>
                <td><?php echo $rows['date']; ?></td>
            </tr>
            <?php    }
    ?>
        </table>
    </section>
    <script src="js/script.js"></script>
</body>

</html>