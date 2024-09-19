<?php

    session_start();

    $connect = mysqli_connect('localhost', 'root', '', 'php_proj') or die("Connection Failed:".mysqli_connect_error());

    //If the "add item" button is pressed:
    if(isset($_POST['add_to_cart'])) {

        //If there is already a session cart:
        if(isset($_SESSION['cart'])) {

            //We save the item id here to check if its found in the cart or not (in order to know wether to add it or not).
            $session_arr_id = array_column($_SESSION['cart'], "id");

            //If its not found, add the item to the cart (object array first, then put it in a 2D array $_SESSION)
            if (!in_array($_POST['id'], $session_arr_id)) {

                $session_arr = array(
                    'id' => $_POST['id'],
                    "name" => $_POST['name'],
                    "price" => $_POST['price'],
                    "quantity" => $_POST['quantity']
                );
    
                $_SESSION['cart'][] = $session_arr;

            }

        }
        else {

            //If there is no cart yet, make one with the first item.
            $session_arr = array(
                'id' => $_POST['id'],
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity']
            );

            $_SESSION['cart'][] = $session_arr;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Adding</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />

</head>
<body class="shopcartbod">
    <p>Back to <a href="shop.php">shop</a></p>

    <div class="cartwrapper">
            <h1 style="margin-bottom: 5px;">Your cart:</h1>
            <?php 

                //If $_SESSION['cart'] is empty, show(echo) the following message:
                if(empty($_SESSION['cart']))
                    echo '<h2>Your cart is curently empty!</h2>';
                
                //Else:
                else{

                $output = "";
                $output .= "

                <table class='shop_table'>

                 <tr>
     
                     <td>Item</td>
                     <td>Name</td>
                     <td>Price</td>
                     <td>Quantity</td>
                     <td>Total Price</td>
                     <td>Action</td>
     
                 </tr>

                 
                
                ";

                //Here we want to show all of the items that were added to the cart with the total price to pay.
                if(!empty($_SESSION['cart'])){
                    
                    $total = 0;

                    //Here we start the printing proccess of said items in the cart.
                    foreach ($_SESSION['cart'] as $key => $value){

                        $output .= "
                        
                            <tr>
     
                                <td>".$value['id']."</td>
                                <td>".$value['name']."</td>
                                <td>".$value['price']."</td>
                                <td>".$value['quantity']."</td>
                                <td>".number_format($value['price'] * $value['quantity'])."</td>
                                <td>

                                    <a href='add-to-cart.php?action=remove&id=".$value['id']."'>
                                        <button>Remove</button>
                                    </a>
                                </td>
        
                            </tr>

                        ";

                        
                        $total += $value['quantity'] * $value['price'];
                    }

                    $output .= "
                    
                        <tr>
                        
                            <td colspan='3'></td>
                            <td>Final Price</td>
                            <td>".number_format($total,2)."</td>
                            <td>
                                <a href='add-to-cart.php?action=clearall'>
                                    <button>Clear All</button>
                                </a>
                            </td>

                        </tr></table>
                     
                    ";
                }

                //This will pring the whole HTML table.
                echo $output;
            }
            ?>

            <?php //Here we check if the cart isnt empty so that we show the pay option
                if(!empty($_SESSION['cart']))
                    echo "<a href='add-to-cart.php?action=pay'>
                            <button class='pay'>Pay Now</button>
                            </a>"
            ?>

            <!--  ITEM REMOVE   -->

            <?php
            
                //Here we check which of the actions was called.
                if(isset($_GET['action'])){

                    if($_GET['action'] == "clearall"){
                        //Deletes everything from the cart.
                        unset($_SESSION['cart']);
                        header("location: add-to-cart.php");
                    }

                    if($_GET['action'] == "remove"){

                        foreach($_SESSION['cart'] as $key=>$value){
                            //Deletes specific items by their ID.
                            if($value['id'] == $_GET['id'])
                                unset($_SESSION['cart'][$key]);
                        }
                        header("location: add-to-cart.php");
                    }

                    //Here we substract the quantity requested from the DB quantity and update it in our DB.
                    if($_GET['action'] == "pay"){
                        
                        foreach($_SESSION['cart'] as $key=>$value){

                            $payid = $value['id'];
                            $payquan = $value['quantity'];

                            $sqlpay1 = "SELECT `quantity` FROM `products` WHERE item_id = $payid";
                            $result1 = mysqli_query($connect, $sqlpay1);
                            foreach($result1 as $result){

                                $resquan = $result['quantity'];

                                $sqlpay2 = "UPDATE `products` SET `quantity` = $resquan-$payquan WHERE `item_id` = $payid";
                                $result2 = mysqli_query($connect, $sqlpay2);

                            }
                           
                        }
                        
                        header("location: add-to-cart.php?action=clearall");
        
                    }
                }
            
            ?>
    </div>

       
</body>
</html>