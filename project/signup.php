<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Join Us</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />

</head>
<body class="signbody">
    
<header class="header">

    <div style="margin-left: 40px;"></div>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="contact_us.php">Contact</a></li>
    </ul>
    <div class="heddiv">
     <?php //WILL BE REMOVED/AJUSTED
       if(!isset($_SESSION['username'])){
            echo "<a href='login.php' style='text-decoration:none; color:white; margin-right:10px;'>Log In</a>";
        }
        else{
            echo  "<button class='userp' onclick='myfunc()'>".$_SESSION['username']."</button>";
        }

    ?>
    </div>

</header>

    <a href="logout.php" class="logoutbtn" id="logoutbtn" style="display: none;">LOG OUT</a>

    <h1 style="margin:20px 0 0 10px;">Join us today by signing up!</h1>

    <form action="connect.php" method="POST">

        First Name:
        <input type="text" name="fname" required>
        Last Name:
        <input type="text" name="lname" required>
        Email:
        <input type="email" name="email" required>
        Username:
        <input type="text" name="username" required>
        Password:
        <input type="password" name="password" required>

        <button type="submit" name="submit">Sign Up</button>

    </form>

    <script>

        function myfunc(){

            let button = document.getElementById("logoutbtn");
            console.log(button.style.display);
            if(button.style.display == "block"){
                button.style.display = "none";
            }
            else{
                button.style.display = "block";
            }
        }

    </script>
	

</body>
</html>