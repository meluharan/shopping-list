<?php
/**
 * Index page
 * redirects to appropriate page by checking SESSION if a user is already logged in
 */
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else {
    header('Location: shoppingLists.php');
}