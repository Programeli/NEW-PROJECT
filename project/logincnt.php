<?php
    //Session start.
    session_start();
    //connect to the database via server name, username, password, and DB name. if there is no connection, then show an error.
    $connect = mysqli_connect('localhost', 'root', '', 'php_proj') or die("Connection Failed:".mysqli_connect_error());

    //Checks if method is post, and if the submit button has been clicked.
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        //Checks if username and password were inserted.
        if(isset($_POST['username']) && isset($_POST['password'])) {

            //Save the username and password in 2 vars.
            $username = $_POST['username'];
            $password = $_POST['password'];

            //SELECTS inserted details from both user and admins tables (if they exist)
            $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND  `password` = '$password'";
            $sqlAdmin = "SELECT * FROM `admins` WHERE `username` = '$username' AND  `password` = '$password'";

            //Runs the queries query on said tables and checks if the details exist in one of them.
            $query = mysqli_query($connect, $sql);
            $queryAdmin = mysqli_query($connect, $sqlAdmin);
            $count = mysqli_num_rows($query);
            $countAdmin = mysqli_num_rows($queryAdmin);

            //If countAdmin has content, then its bigger than 0, then the user is an admin.
            if($countAdmin > 0){
                $_SESSION['username'] = $username;
                $_SESSION['admin'] = $_SESSION['username'];
                include_once 'shop.php';
            }

             //Else if count has content, then its bigger than 0, then the user is a regular user.
            else if($count > 0){
                $_SESSION['username'] = $username;
                $_SESSION['user'] = $_SESSION['username'];
                include_once 'shop.php';
            }
            else {
                echo 'LOGIN FAILED!';
            }
        }

    }


?>