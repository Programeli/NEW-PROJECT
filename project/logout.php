<?php
//session_destroy() ends the session. then sends the user back to login.php.
session_start();
session_destroy();
header('Location: login.php');
exit;

?>