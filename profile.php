<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style-profile.css">
    <title>My Profile</title>
</head>
<body>
    <header>
        <a href="index.html" class="logo">FITNESS <span>POWER</span></a>
        <nav class="navigation">
            <a href="index.html">Home</a>
            <a href="programs.html">Programs</a>
            <a href="about-us.html">About Us</a>
            <a href="nutrition.html">Nutrition</a>
        </nav>
    </header>

    <section class="main">
        <div>
            <h1>WELCOME TO MY PROFILE</h1>
        </div>
    </section>

    <?php    
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM members WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_id = $result['Id'];
            }
            ?>

    <section class="nav-bar">
        <nav>
            <ul>
                <li><a href="home.php"><i class="fa-solid fa-house"></i><br>Home</a></li>
                <li><a href="profile.php"><i class="fa-solid fa-address-card"></i><br>My Profile</a></li>
                <li><a href="php/logout.php"><i class="fa-solid fa-right-from-bracket"></i><br>Log Out</a></li>
            </ul>
        </nav>
    </section>

    <section class="title">
        <h1>PROFILE</h1>
    </section>

    <section class="personal-infos">
        <p>Your Profile Personal Informations</p>
    </section>

    <section class="la-table">
    <div>
            <table>
                <thead>
                    <tr>
                        <th><i class="fa-solid fa-user"></i> Username</th>
                        <th><i class="fa-solid fa-envelope"></i> Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b><?php echo $res_Uname ?></b></td>
                        <td><b><?php echo $res_Email ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="home">
        <a href="home.php" class="home-btn">Go Back Home</a>
    </section>

    <footer class="footer">
        <p class="footer-title">Copyright © 2024. All rights reserved.</p>
        <div class="social-icons">
            <a href="https://web.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://x.com" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>
</body>
</html>



