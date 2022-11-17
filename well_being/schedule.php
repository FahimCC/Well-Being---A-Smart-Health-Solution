<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Schedule</title>
    <link rel="shortcut icon" href="../logo/logo.png" type="image/x-icon" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/schedule.css" />

</head>

<body>
    <!-- header section starts  -->

    <header class="header">
        <a href="index.php" class="logo"><img src="logo/logo.png" alt="Well Being" /></a>

        <nav class="navbar">
            <a href="schedule.php">Add Schedule</a>
            <a href="dprofile.php">Profile</a>
            <a href="index.php">Logout</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <!-- header section ends -->

    <h2 style="margin-top: 140px">Add Schedule</h2>
    <div class="container">
        <div class="element">
            <form action="" method="POST">
                <input type="text" placeholder="BMA no" name="bma" class="box" />
                <input type="text" placeholder="Place" name="place" class="box" />
                <input type="text" placeholder="Weekdays" name="weekdays" class="box" />
                <input type="text" placeholder="Time" name="time" class="box" />
                <input type="text" placeholder="Consult Fee" name="fee" class="box" />
                <input type="submit" value="ADD" name="submit" class="btn" />
            </form>
        </div>
    </div>
    <?php
    session_start();
	include "connection.php";

	if(isset($_POST['submit'])){
		$bma = $_POST['bma'];
        $_SESSION['bma'] = $_POST['bma'];
		$place = $_POST['place'];
		$weekdays = $_POST['weekdays'];
		$time = $_POST['time'];
		$fee = $_POST['fee'];


        $insertquery = mysqli_query($con, "insert into schedule(bma,place,weekdays,time,fee)values('$bma','$place','$weekdays','$time','$fee')");

        if($insertquery){
            echo ("Inserted Successful");
            header('location:schedule.php');
        } 
        else{
            echo ("Not inserted");
            ?><script>
    alert("Not inserted")
    </script><?php
}
}

?>

    <div class="schedule">
        <h2 style="margin-top: 40px">Schedule</h2>
        <table style="font-size: 18px;">
            <tr style="background-color: #f2f2f2;">
                <th>Place</th>
                <th>Weekdays</th>
                <th>Time</th>
                <th>Consult Fee(Tk)</th>
                <th>Action</th>
            </tr>
            <?php //php include "../connection.php";

            $id = $_SESSION['bma'];

            $query = mysqli_query($con, "select * from schedule where bma='$id'");

            while($schedule = mysqli_fetch_array($query)){?>
            <tr>
                <td><?php echo $schedule['place']; ?></td>
                <td><?php echo $schedule['weekdays']; ?></td>
                <td><?php echo $schedule['time']; ?></td>
                <td><?php echo $schedule['fee']; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $schedule['serial']; ?>"><button id="delete">Delete</button></a>
                </td>
            </tr>
            <?php    }?>
        </table>
    </div>
    <script src="js/script.js"></script>
</body>

</html>