<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/style.css" />


    <script src="js/login.js"></script>
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

    <h1>Login...</h1>

    <div class="choose_option" id="blr">
        <a href="#" onclick="openForm('patientLogin')">

            <div class="patient option">
                <center>
                    <img src="images/patient.gif" alt="Patient" />
                </center>
                <p>As a Patient</p>
            </div>
        </a>

        <a href="#" onclick="openForm('doctorLogin')">
            <div class="doctor option">
                <center>
                    <img src="images/doctor.gif" alt="Doctor" />
                </center>
                <p>As a Doctor</p>
            </div>
        </a>
        <a href="#" onclick="openForm('adminLogin')">
            <div class="admin option">
                <center>
                    <img src="images/admin.gif" alt="Admin" />
                </center>
                <p>As an Admin</p>
            </div>
        </a>
    </div>

    <!-- Choose section ends -->

    <?php include("connection.php");?>

    <!-- Patient login form popup starts -->

    <div class="form-popup" id="patientLogin">
        <form action="" class="form-container" method="POST">
            <h2>Patient Login</h2>

            <input type="text" placeholder="Enter Patient ID" name="patientid" required class="box" />
            <input type="password" placeholder="Enter password" name="password" required class="box" />

            <input type="submit" name="submit1" value=" Login" class="btn" />

            <a href="#" class="btn cancel" onclick="closeForm('patientLogin')">
                Close
            </a>
            <?php
			
				if(isset($_POST['submit1'])){
					$patientid = $_POST['patientid'];
                    $_SESSION['patientid'] = $_POST['patientid'];
                    
					$password = $_POST['password'];
				
				
                    $query = mysqli_query($con, "select * from patient_registration where patientid='$patientid'");
                    
                    $idcount = mysqli_num_rows($query);
                    
                    if($idcount){
                        $id = mysqli_fetch_assoc($query);
                        $idpassword = $id['password'];
                        $_SESSION['fname'] = $id['fname'];
                        
                        // if(password_verify($password, $id['password'])){
                            if($password === $idpassword){
                            ?>
            <script>
            location.replace('pprofile.php');
            </script>
            <?php }
                else{
                ?>
            <script>
            alert('Password Incorrect');
            </script>
            <?php
                }
                }else{
                ?>
            <script>
            alert('Invalid Patient ID');
            </script>
            <?php
                }
            }
            ?>
        </form>
    </div>

    <!-- Doctor login form popup starts -->

    <div class="form-popup" id="doctorLogin">
        <form action="" class="form-container" method="POST">
            <h2>Dcotor Login</h2>

            <input type="text" placeholder="Enter BMA No" name="bma" required class="box" />
            <input type="password" placeholder="Enter password" name="password" required class="box" />

            <input type="submit" name="submit2" value="Login" class="btn" />

            <a href="#" class="btn cancel" onclick="closeForm('doctorLogin')">
                Close
            </a>

            <?php
			
				if(isset($_POST['submit2'])){
					$bma = $_POST['bma'];
                    $_SESSION['bma'] = $_POST['bma'];
					$password = $_POST['password'];
				
				
                    $query = mysqli_query($con, "select * from doctor_registration where bma='$bma'");
                    
                    $bmacount = mysqli_num_rows($query);
                    
                    if($bmacount){
                        $bma = mysqli_fetch_assoc($query);
                        $bmapassword = $bma['password'];
                        $_SESSION['fname'] = $bma['fname'];
                        
                        // if(password_verify($password, $bma['password'])){
                            if($password === $bma['password']){
						?>
            <script>
            location.replace('dprofile.php');
            </script>
            <?php }
                else{
                ?>
            <script>
            alert('Password Incorrect');
            </script>
            <?php
                }
                }else{
                ?>
            <script>
            alert('Invalid BMA No');
            </script>
            <?php
                }
            }

            ?>
        </form>
    </div>

    <!-- Admin login form popup starts -->

    <div class="form-popup" id="adminLogin">
        <!-- ../dashboard/dashboard.html -->
        <form action="" class="form-container" method="POST">
            <h2>Admin Login</h2>

            <input type="text" placeholder="Enter User Name" name="username" required class="box" />
            <input type="password" placeholder="Enter password" name="password" required class="box" />

            <input type="submit" name="submit3" value="Login" class="btn" />

            <a href="#" class="btn cancel" onclick="closeForm('adminLogin')">
                Close
            </a>

            <?php
			
				if(isset($_POST['submit3'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
                    $_SESSION['username'] = $_POST['username'];


                    if($username == "admin" and $password == "admin"){
                        ?><script>
            location.replace('../dashboard/dashboard.php');
            </script><?php
                    }
                    else{
                        ?><script>
            alert('username and password are incorrect');
            </script><?php
                    }
                    
				}

            ?>

        </form>
    </div>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>