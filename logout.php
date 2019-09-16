<?php


// remove all session variables
session_start();
session_unset();
unset($_SESSION['mobile']);
unset($_SESSION['username']);
// destroy the session 
session_destroy(); 


header("Location: login.php");
?>