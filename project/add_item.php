<?php
    session_start();
     $connect = mysqli_connect('localhost', 'root', '', 'php_proj') or die("Connection Failed:".mysqli_connect_error());

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        if(isset($_POST['item_id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity'])) {

            $item_id = $_POST['item_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

        // Include the database configuration file
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./media/" . $filename;
        

            // Insert image file name into database
            $insert = "INSERT INTO `products` (`item_id`, `name`, `price`, `quantity`,`image`) VALUES ('$item_id', '$name', '$price', '$quantity', '$filename')";
            $query="";
            $query = mysqli_query($connect, $insert);

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Add items</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />

</head>
<body>

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

    <div class="add_wrapper">

        <h1 style="margin:20px 0 0 10px;">Add a new item here!</h1>

        <form action="add_item.php" method="POST" enctype="multipart/form-data" role="form">

            Item_ID
            <input type="text" name="item_id" required>
            Name:
            <input type="text" name="name" required>
            Price:
            <input type="tex" name="price" required>
            Quantity:
            <input type="text" name="quantity" required>
            Image:
            <input type="file" name="uploadfile">

            <button type="submit" name="submit">Add</button>

        </form>

    </div>

    <?php
    
        if(empty($query)){
            echo '';
        }
        else if($query){
            echo 'Item added!';
        }
        else {
            echo 'Error!!';
        }


    ?>

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