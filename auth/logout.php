<?php
session_start(); // Start or resume the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
header("Location: ../pages/login.php"); // Redirect to login page after logout
exit(); // Terminate script execution
?>