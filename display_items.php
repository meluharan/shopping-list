<?php

/**
 * Display item page
 * Loads layout and scripts for the display items page view
 */
session_start();
if (isset($_SESSION['username'])) {
  if (isset($_SESSION['listname'])) {
    /* Set parameters for layout */
    $title = "Items List";
    /* Including style sheets */
    $style = array("display_lists-style.css");
    /* Requiring top layout */
    require_once('views/layout_top.phtml');
    /* Requiring display items  view */
    require_once('views/pages/display_items_view.phtml');
    /* Requiring bottom layout */
    require_once('views/layout_bottom.phtml');
  } else {
    echo 'Unexpected error!';
  }
} else {
    header('Location: login.php');
}
?>
