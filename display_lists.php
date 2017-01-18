<?php
/**
 * Shopping list page
 * Loads layout and scripts for message board
 */
session_start();
if (isset($_SESSION['username'])) {
    /* Parameters for layout */
    $title = "Shopping List";
    /* Including style sheets */
    $style = array("display_lists-style.css");
    /* Requiring top layout */
    require_once('views/layout_top.phtml');
    /* Requiring display list view */
    require_once('views/pages/display_lists_view.phtml');
    /* Requiring bottom layout */
    require_once('views/layout_bottom.phtml');
} else {
    header('Location: login.php');
}