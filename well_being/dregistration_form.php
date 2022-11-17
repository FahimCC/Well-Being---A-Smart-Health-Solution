<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Registration Form</title>
    <link rel="shortcut icon" href="../../logo/logo.png" type="image/x-icon" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/registration_form.css" />
</head>

<body>
    <!-- header section starts  -->

    <header class="header">
        <a href="index.php" class="logo"><img src="logo/logo.png" alt="Well Being" /></a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="login.php">Login</a>
            <a href="registration.php">Register</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <!-- header section ends -->

    <!-- form section starts -->

    <h2>Doctor Registration Form</h2>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Personal Information</h3>
            <div class=" info">
                <label for="fname">First Name
                    <input type="text" class="box" placeholder="First name" name="fname" id="fname" required /></label>
                <label for="lname">Last Name
                    <input type="text" class="box" placeholder="Last name" name="lname" id="lname" required /></label>

                <label for="email">Email
                    <input type="email" class="box" placeholder="Email" name="email" id="email" required /></label>
                <label for="mobile">Mobile Number
                    <input type="text" class="box" placeholder="Mobile Number" name="mobile" id="mobile"
                        required /></label>
                <label for="speciality">Speciality
                    <input type="text" class="box" placeholder="Speciality" name="speciality" id="speciality"
                        required /></label>
                <label for="designation">Designation
                    <input type="text" class="box" placeholder="Designation" name="designation" id="designation"
                        required /></label>
                <label for="nid">National ID
                    <input type="text" class="box" placeholder="National ID" name="nid" id="nid" required /></label>
                <label for="bcn">BMA Number
                    <input type="text" class="box" placeholder="BMA Number" name="bma" id="bma" required /></label>
                <label for="dob">Date of Birth
                    <input type="date" class="box" placeholder="Date of Birth" name="dob" id="dob" required /></label>
                <label for="blood">Blood Group
                    <select id="blood" name="blood" class="box" required>
                        <option value="">Select Blood Group</option>
                        <option value="O(+)">O(+)</option>
                        <option value="O(-)">O(-)</option>
                        <option value="A(+)">A(+)</option>
                        <option value="A(-)">A(-)</option>
                        <option value="B(+)">B(+)</option>
                        <option value="B(-)">B(-)</option>
                        <option value="AB(+)">AB(+)</option>
                        <option value="AB(-)">AB(-)</option>
                    </select></label>
                <label for="gender">Gender
                    <select id="gender" name="gender" class="box" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select></label>
                <label for="picture">Upload your Profile Picture:
                    <input type="file" id="image" name="image" class="box" required /></label>
            </div>
            <h3>Present Address</h3>
            <div class="info">
                <label for="district">District
                    <input type="text" class="box" placeholder="District" name="district" id="district"
                        required /></label>
                <label for="thana">Thana
                    <input type="text" class="box" placeholder="Thana" name="thana" id="thana" required /></label>
                <label for="area">Area
                    <input type="text" class="box" placeholder="Area" name="area" id="area" required /></label>
                <label for="buildingno">Building No
                    <input type="text" class="box" placeholder="Building No" name="buildingno" id="buildingno"
                        required /></label>
            </div>
            <h3>Password</h3>
            <div class="info">
                <label for="npassword">New Password
                    <input type="password" class="box" placeholder="Password" name="npassword" id="npassword"
                        required /></label>
                <label for="cpassword">Confirm Password
                    <input type="password" class="box" placeholder="Password" name="cpassword" id="cpassword"
                        required /></label>
            </div>
            <div class="info">
                <input type="submit" value="SUBMIT" name="submit" class="btn" />
            </div>
        </form>
    </div>
    <!-- form section ends -->
    <script src="js/script.js"></script>
</body>

</html>
<?php
	include "connection.php";

	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$speciality = $_POST['speciality'];
		$designation = $_POST['designation'];
		$nid = $_POST['nid'];
		$bma = $_POST['bma'];
		$dob = $_POST['dob'];
		$blood = $_POST['blood'];
		$gender = $_POST['gender'];

        // $file = $_FILES['file'];
        // print_r($file);
        
            $target = 'picture/'.basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                echo "Image Upload";
            }

		$district = $_POST['district'];
		$thana = $_POST['thana'];
		$area = $_POST['area'];
		$buildingno = $_POST['buildingno'];
		$npassword = $_POST['npassword'];
		$cpassword = $_POST['cpassword'];
		

		$bmaquery = mysqli_query($con, "select * from doctor_registration where bma='$bma'");
		
		$bmacount = mysqli_num_rows($bmaquery);
		
        $x = 0;
        $query = mysqli_query($con, "select * from bma_table");
            while($row = mysqli_fetch_array($query)){
                if($_POST['bma'] == $row['bmano']){
                    $x = 1;
                }
            }


		if($bmacount > 0){
            echo ("BMA no already exists.");  
            ?>
<script>
alert('BMA no already exists.')
</script>
<?php
        } 
        elseif($x === 0){
            echo ("BMA no does not exists in BMA list.");
            ?>
<script>
alert('BMA no does not exists in BMA list.')
</script>
<?php
        }
        else{
            
            
            if($_POST['npassword'] === $_POST['cpassword']){
                $npassword = $_POST['npassword'];
                // $password = password_hash($npassword, PASSWORD_BCRYPT);
                
                $password = $npassword;
                
                $insertquery = mysqli_query($con, "insert into doctor_registration(fname,lname,email,mobile,speciality,designation,nid,bma,dob,blood,gender,picture,district,thana,area,buildingno,password)values('$fname', '$lname', '$email', '$mobile', '$speciality','$designation','$nid', '$bma', '$dob', '$blood', '$gender', '$image', '$district', '$thana', '$area', '$buildingno', '$password')");

                if($insertquery){
                    ?><script>
alert("Registration is Successful");
</script><?php
                } 
                else{
                    echo ("not inserted");
                }
            }
            else{
                echo ("password are not match");
                ?>
<script>
alert('password are not match.')
</script>
<?php
            }
        }
    }
?>