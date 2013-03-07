<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['username']);
// Delete all session variables
// session_destroy();
setcookie("username", "", time()-3600);

// Jump to login page
header('Location: login.php');

?>