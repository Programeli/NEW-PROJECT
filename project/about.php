<?php //INCLUDE logincnt.php so that the session continues running and we can detect the user type.
include 'logincnt.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>About</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />

</head>
<body class="aboutBody">
    
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

    <h1 class="abouth1">A little bit about us!</h1>
    <pre class="aboutpre">
We are Elias and Hamzah, two college students, that wanted to create this website as their project!
In this about us page, we will be showing you, the customer, some of our products that you can purchase in the future.

Here are our top 3 products of last month:
    </pre>

    <?php
        //SELECT all products from our database in a descending order so that we can find the most sold and least sold units.
        $descsql = $connect->query("SELECT * FROM `products` ORDER BY `products`.`sold` DESC");

        //Create an array to contain all the items sorted from bigger to smaller. ([0] = biggest) 
        while($row = $descsql->fetch_assoc()){
            $products[] = $row;
        }
    
    ?>

    <div class="images">

        <div class="topItems">
          
            <?php //Prints the image and name of top 3 items. each in their own div.
            echo '<img src="./media/'.$products[0]['image']. '">'; 
                 echo "<p>{$products[0]['name']}</p>";?>
        </div>
        
        <div class="topItems">
            <?php echo '<img src="./media/'.$products[1]['image']. '">'; 
                echo "<p>{$products[1]['name']}</p>";?>
        </div>

        <div class="topItems">
            <?php echo '<img src="./media/'.$products[2]['image']. '">'; 
                echo "<p>{$products[2]['name']}</p>";?>
        </div>

    </div>

    <div class="leastSold">

        <p class="leastP">Our least sold item of last month is:</p>

        <div class="leastItem">

            <?php //Prints the image and name of the least sold item.
            echo '<img src="./media/'.$products[count($products)-1]['image']. '">'; 
                echo "<p>{$products[count($products)-1]['name']}</p>";?>

        </div>

    </div>

   

<script>
//This function can be found in almost every HTML page we have. Its purpose is to show and hide the user's/admin's options.
function myfunc(){

    let button = document.getElementById("logoutbtn");

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