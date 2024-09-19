<?php
    session_start();
     $connect = mysqli_connect('localhost', 'root', '', 'php_proj') or die("Connection Failed:".mysqli_connect_error());

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Edit items</title>
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

    <?php
        //Fetch everything from the DB for the selected item to be edited by ID.
        $id = $_GET['item_id'];
        $sqlslct = "SELECT * FROM products WHERE item_id = $id";
        $query = mysqli_query($connect, $sqlslct);
        $row = mysqli_fetch_array($query);

    ?>

    <div class="add_wrapper">

        <h1 style="margin:20px 0 0 10px;">Edit an existing item!</h1>

        <form action="edit.php?item_id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" role="form">

            Name:
            <input type="text" name="name" value="<?php echo $row['name']?>" required>
            Price:
            <input type="tex" name="price" value="<?php echo $row['price']?>" required>
            Quantity:
            <input type="text" name="quantity" value="<?php echo $row['quantity']?>" required>
            Image:
            <input type="file" name="uploadfile" value="<?php echo $row['image']?>">

            <button type="submit" name="submit">Edit</button>

        </form>

    </div>

    <?php
        //When the submit button is clicked:
        if(isset($_POST['submit'])){

            $iName = $_POST['name'];
            $iPrice = $_POST['price'];
            $iQuan = $_POST['quantity'];

            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "./media/" . $filename;

            $editsql = "UPDATE `products` SET `name`='$iName',`price`='$iPrice',
                        `quantity`=$iQuan,`image`='$filename' WHERE `products`.`item_id` = $id";
                       
           $editquery = "";
           $editquery = mysqli_query($connect, $editsql);            
        }
    
        if(empty($editquery)){
            echo '';
        }
        else if($editquery){
            echo 'Item edited!';
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