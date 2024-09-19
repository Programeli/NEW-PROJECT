<?php

    session_start();
    $connect = mysqli_connect('localhost', 'root', '', 'php_proj') or die("Connection Failed:".mysqli_connect_error());
    $sql = "SELECT * FROM products";
    $result = mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Editing Page</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />


</head>
<body style="background-color:  rgb(197, 212, 224);">

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

    <div class="edit_wrapper">

        <a href="add_item.php" class="add_item">Add item</a>
        <h1>Products table:</h1><br>
        
        <table class="edit_table">

            <tr>

                <td>Item_ID</td>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Img</td>
                <td>Sold</td>
                <td>Edit</td>
                <td>Delete</td>

            </tr>

            <tr>

                <?php //Creates an array and prints it into the table that was created in html.
                while($row = mysqli_fetch_assoc($result)){ ?>
                
                <td><?php echo $row['item_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php if(isset($row['image'])){
                    echo 'YES';}
                    else{
                        echo 'NO!';
                    } ?></td>
                <td><?php echo $row['sold']; ?></td>
                <td><a href="edit.php?item_id=<?php echo $row['item_id'] ?>">EDIT</a></td>
                <td><a href="delete_item.php?item_id=<?php echo $row['item_id'] ?>">DELETE</a></td>
            </tr>

            <?php } ?>

        </table>

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