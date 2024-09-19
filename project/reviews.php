<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Reviews</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />

</head>
<body class="revbody">
    
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

    <h1 class="revh1">Some of our customers' reviews:</h1>

    <div class="rev_wrapper">

        <div class="review">

            <div class="inReviewDiv">
                <h2>Customer123:</h2>
                <h3>title here about opinion.</h3>
                <h3>5/5</h3>
            </div>

            <p>Reviewed on 01.06.2023</p>
        
            <pre>alshdasidhaiosdasd
asdljasdasd
asdljasdasd</pre>
        
        </div>

        <div class="review">

            <div class="inReviewDiv">
                <h2>Customer123:</h2>
                <h3>title here about opinion.</h3>
                <h3>5/5</h3>
            </div>

            <p>Reviewed on 01.06.2023</p>
        
            <pre>alshdasidhaiosdasd
asdljasdasd
asdljasdasd</pre>
        
        </div>

        <div class="review">

            <div class="inReviewDiv">
                <h2>Customer123:</h2>
                <h3>title here about opinion.</h3>
                <h3>5/5</h3>
            </div>

            <p>Reviewed on 01.06.2023</p>
        
            <pre>alshdasidhaiosdasd
asdljasdasd
asdljasdasd</pre>
        
        </div>

        <div class="review">

            <div class="inReviewDiv">
                <h2>Customer123:</h2>
                <h3>title here about opinion.</h3>
                <h3>5/5</h3>
            </div>

            <p>Reviewed on 01.06.2023</p>
        
            <pre>alshdasidhaiosdasd
asdljasdasd
asdljasdasd</pre>
        
        </div>

        <div class="review">

            <div class="inReviewDiv">
                <h2>Customer123:</h2>
                <h3>title here about opinion.</h3>
                <h3>5/5</h3>
            </div>

            <p>Reviewed on 01.06.2023</p>
        
            <pre>alshdasidhaiosdasd
asdljasdasd
asdljasdasd</pre>
        
        </div>

        <div class="review">

            <div class="inReviewDiv">
                <h2>Customer123:</h2>
                <h3>title here about opinion.</h3>
                <h3>5/5</h3>
            </div>

            <p>Reviewed on 01.06.2023</p>
        
            <pre>alshdasidhaiosdasd
asdljasdasd
asdljasdasd</pre>
        
        </div>
    
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