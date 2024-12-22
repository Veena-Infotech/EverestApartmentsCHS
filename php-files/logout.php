<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page with a logout message
header("Location: ../index.php?logged_out=true");
exit;
?>
