<?php
/**
 * Product/item list page
 * Loads layout and scripts for item page
 */
session_start();
if (isset($_SESSION['username'])) {
    /* Parameters for layout */
    $title = "Item List";
    /* Including style sheets */
    $style = array("shoppinglist-style.css");
    /* Requiring top layout */
    require_once('views/layout_top.phtml');
    /* Requiring item page specific view */
    require_once('views/pages/items_list_view.phtml');
    /* Requiring bottom layout */
    require_once('views/layout_bottom.phtml');
} else {
    header('Location: login.php');
}