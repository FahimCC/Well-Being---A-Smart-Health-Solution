<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="logo/logo.ico" type="image/x-icon">
    <title>Patient List</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="css/dashboard_list.css" />
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
                    <a href="index.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container" style="margin-top: 70px">
            <h2>Search Patient</h2>
            <div class="box_container">
                <table class="element">
                    <tr>
                        <td>
                            <input type="text" placeholder="Search..." class="search" />
                        </td>
                        <td>
                            <a href="#"><i class="fas fa-search"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>




    <section>
        <h2 style="margin-top: 70px">Patient List</h2>
        <div class="container">
            <table>
                <tr style="background-color: #f2f2f2;">
                    <th class="thead">Name</th>
                    <th class="thead">Patient ID</th>
                    <th class="thead">Action</th>
                </tr>
                <?php
    
        include "connection.php";
        
        $query = mysqli_query($con, "select * from patient_registration");

        while($patientid = mysqli_fetch_array($query)){?>
                <tr>
                    <td class="tdata" tdata><?php echo $patientid['fname']." ".$patientid['lname']; ?></td>
                    <td class="tdata" tdata><?php echo $patientid['patientid']; ?></td>
                    <td class="tdata" tdata>
                        <!-- <a href="#"><button id="edit">Edit</button></a> -->
                        <a href="pdelete.php?id=<?php echo $patientid['patientid']; ?>"><button
                                id="delete">Delete</button></a>
                    </td>
                </tr>
                <?php    }
    ?>
            </table>

        </div>
    </section>

</body>

</html>