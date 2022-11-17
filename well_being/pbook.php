<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="logo/logo.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Appointment</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css" />
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

    <!-- booking section starts   -->

    <section class="book" id="book" style="padding-bottom: 0px">
        <h1 class="heading" style="padding: 100px 0 0 0; margin: 0">
            <span>book</span> now
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/book-img.svg" alt="" />
            </div>

            <form action="">
                <h3>book appointment</h3>
                <input type="text" placeholder="your name" class="box" />
                <input type="number" placeholder="your number" class="box" />
                <input type="email" placeholder="your email" class="box" />
                <input type="date" class="box" />
                <input type="submit" value="book now" class="btn" />
            </form>
        </div>
    </section>

    <!-- booking section ends -->

    <script src="js/script.js"></script>
</body>

</html>