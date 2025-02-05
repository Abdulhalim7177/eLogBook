<?php
// Start the session if not already started
session_start();

// Clear all session variables
$_SESSION = array();

// Delete the session cookie if it exists
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Destroy the session
session_destroy();

// Redirect to login page
header("location:../index.php");
exit(); // Ensure script stops executing after redirect
?>