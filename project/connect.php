<?php //SIGN UP. similar to logincnt

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $connect = mysqli_connect('localhost', 'root', '', 'php_proj') or die("Connection Failed:".mysqli_connect_error());

        if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "INSERT INTO `user` (`fname`, `lname`, `email`, `username`, `password`) VALUES ('$fname', '$lname', '$email', '$username', '$password')";

            $query = mysqli_query($connect, $sql);

            if($query){
                header("location: login.php");
            }
            else {
                echo 'Error!!';
            }
        }

    }


?>