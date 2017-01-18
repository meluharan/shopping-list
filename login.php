<?php
/**
 * Login page
 * Verifies if user entered username by checking POST value
 * if username has been entered it's being written into SESSION
 * otherwise shows login page view
 */

if (isset($_POST['username'])) {
    session_start();

    /* Retrieving data from POST and write into SESSION */
    $_SESSION['username'] = $_POST['username'];

    /* Redirecting to display lists page */
    header('Location: display_lists.php');
} else {
    /* Parameters for layout */
    $title = "Login";
    /* Including style sheets */
    $style = array("style.css", "login-style.css");
    /* Including js */
    $scripts = array("userNames.js");
    /* Requiring layout */
    require_once('views/layout_top.phtml');
    require_once('views/pages/login_view.phtml');
    require_once('views/layout_bottom.phtml');
}
