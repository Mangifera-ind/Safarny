<?php
session_start();
// Destroy the session
session_destroy();
// Redirect to the index page after logout
header("Location: index.php");
exit();
?>