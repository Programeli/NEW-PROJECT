<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />

</head>

<body class="contbody">

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

    <h1 class="conth1">Contact Us!</h1>

    <div class="contactwrapper">

        <form action="contact_us.php" class="contform" method="post">

            <label for="name">Name</label>
            <input type="text" name="name" class="labelinput" required>

            <label for="email">Email</label>
            <input type="mail" name="email" class="labelinput" required>

            <label for="name">Context</label>
            <textarea name="context" rows="10"></textarea>

            <input type="button" value="Submit" name="submit" class="contsubmit">
        </form>

    </div>

    <pre class="contactpre">Or you can reach us by:
Calling us at: 04-1234567.
Sending us a letter at: P.O. BOX: 2248, Haifa.
Sending an E-mail at: info@uherb.co.il.</pre>

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