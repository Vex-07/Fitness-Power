<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styley.css">
    <title>Sign Up</title>
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
      <section>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

         $verify_query = mysqli_query($con,"SELECT Email FROM members WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO members (Username,Email,Password) VALUES('$username','$email','$password')") or die("Error");

            echo "<div class='message'>
                      <p>Registration successfully</p>
                  </div> <br>";
            echo "<a href='login.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>

            <h2>SIGN UP</h2>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text"  name="username" id="username" placeholder="Username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Sign Up" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
      </section>
</body>
</html>