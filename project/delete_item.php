<?php 

    session_start();
    $connect = mysqli_connect('localhost', 'root', '', 'php_proj') or die("Connection Failed:".mysqli_connect_error()); 

    if(isset($_GET['item_id'])){
        
        $id = $_GET['item_id'];
        //A query to delete an item from a table
        $sql = "DELETE FROM `products` WHERE `item_id`= $id";
        $connect->query($sql);
    }

    header("location: admin_edit.php");
    exit;
?>