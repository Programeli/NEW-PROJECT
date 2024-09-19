<?php //INCLUDE logincnt.php so that the session continues running and we can detect the user type.
include_once 'logincnt.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Shop</title>
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
 <?php //This is shown at the extreme right of the header tag. It shows "Log in" if the user isnt logged in, or "logout" if the user is logged in.
   if(!isset($_SESSION['username'])){
        echo "<a href='login.php' style='text-decoration:none; color:white; margin-right:10px;'>Log In</a>";
    }
    else{
        echo  "<button class='userp' onclick='myfunc()'>".$_SESSION['username']."</button>";
    }

?>
</div>

    </header>
    
    <div id="logoutbtn" style="display: none; float:right;">

        <?php if(isset($_SESSION['admin'])){ //If the user is an admin, they will get an option to edit the products as well as to log out.
            echo "<a href='admin_edit.php' class='logoutbtn'>EDIT</a>";
        }?>
        <a href="logout.php" class="logoutbtn">LOG OUT</a>
    </div>

    <h1 style="margin:30px;">Shop now!</h1>

    <div class="images_shop">

        
        <?php //SELECT all producs so that we can present them in the shop.

            $imgsql = $connect->query("SELECT * FROM `products`") or die($connect->error);
           
            //Creates an array for all of our products.
            while($row = $imgsql->fetch_assoc()){
                $products[] = $row;
            }

            //A loop to go over all of selected products.
            foreach($products as $product){ ?>

                <form method="post" action="add-to-cart.php?id=<?= $product['item_id']?>" class="img_block">
                    
                    <h2><?= $product['name']?></h2>
                    <img src="./media/<?php echo $product['image']; ?>">
                    <p><?= $product['price']?>₪</p>
                    <input type="hidden" name="name" value="<?= $product['name']?>">
                    <input type="hidden" name="price" value="<?= $product['price']?>">
                    <input type="hidden" name="id" value="<?= $product['item_id']?>">
                    <input type="number" name="quantity" value="1" class="quan_num">
                    <input type="submit" name="add_to_cart" class="a_btn" value="Add item">

                </form>

               
          <?php  }?>
    
        
        </div>
    </div>

    <script>

        function myfunc(){

            let button = document.getElementById("logoutbtn");
            console.log(button.style.display);
            if(button.style.display == "flex"){
                button.style.display = "none";
            }
            else{
                button.style.display = "flex";
                button.style.flexDirection = "column";
            }
        }

    </script>

</body>

</html>