<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Our Project</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
</head>

<body class="indexBody">

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
     <?php 
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
    
    <div class="div1">

        <h1 style="font-size: 40px;">Welcome to our website: uHerb!</h1>
        <pre style="font-size: 18px; font-weight: bold;">In our shop you can find many food supliments
and healthy recipes!

Hope you enjoy our products!
        </pre>

        

    </div>

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

