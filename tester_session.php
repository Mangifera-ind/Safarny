<?php
// Include session_start() at the beginning of the file
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    echo "Welcome back, " . $_SESSION['username'] . ". ";

    // Check if the subscription status is set in the session
    if (isset($_SESSION['is_subscribed'])) {
        if ($_SESSION['is_subscribed'] == 0) {
            echo "You are not subscribed.";
        } else {
            echo "You are subscribed.";
        }
    } else {
        echo "Subscription status is not available.";
    }
} else {
    echo "You are not logged in.";
}
?>
