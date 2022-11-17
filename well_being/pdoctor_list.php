<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor List</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="style.css" />

    <script src="js/script.js"></script>
</head>


<body>
    <!-- header section starts  -->

    <header class="header">
        <a href="index.php" class="logo"><img src="logo/logo.png" alt="Well Being" /></a>

        <nav class="navbar">
            <a href="pdoctor_list.php">Search Doctor</a>
            <a href="pprofile.php">Profile</a>
            <a href="index.php">Logout</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <!-- header section ends -->
    <section style="margin-top: 140px">
        <div class="container">
            <h2>Search Doctor</h2>
            <div class="box_container">
                <table class="element">
                    <tr>
                        <td>
                            <input type="text" placeholder="Search a specialist" class="search" />
                        </td>
                        <td>
                            <a href="#"><i class="fas fa-search"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <?php
    
        include "connection.php";
        
        $query1 = mysqli_query($con, "select * from doctor_registration");
        $query2 = mysqli_query($con, "select * from schedule");
        
    ?>

    <div>
        <h2 style="margin-top: 70px">Doctor List</h2>
        <div class="container">
            <table>
                <tr class="trow">
                    <th class="thead">Name</th>
                    <th class="thead">Designation</th>
                    <th class="thead">Gender</th>
                    <th class="thead">Place</th>
                    <th class="thead">Weekdays</th>
                    <th class="thead">Time</th>
                    <th class="thead">Consult Fee</th>
                </tr>
                <tr class="trow">
                    <?php while($bma1 = mysqli_fetch_array($query1) and $bma2 = mysqli_fetch_array($query2)){?>
                    <td class="tdata"><?php echo $bma1['fname']." ".$bma1['lname']; ?></td>
                    <td class="tdata"><?php echo $bma1['designation']; ?></td>
                    <td class="tdata"><?php echo $bma1['gender']; ?></td>

                    <td class="tdata"><?php echo $bma2['place']; ?></td>
                    <td class="tdata"><?php echo $bma2['weekdays']; ?></td>
                    <td class="tdata"><?php echo $bma2['time']; ?></td>
                    <td class="tdata"><?php echo $bma2['fee']; ?></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</body>

</html>