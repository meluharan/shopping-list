<?php
/**
 * Handler of user input action
 * Catches data from ajax and call appropriate functions
 */

/* Requiring handler of database for calling functions */
require_once("database_handler.php");

session_start();

/* Checks if select list was requested */
if (isset($_GET['selectedList'])) {
    /* Retrive data from GET and save into SESSION */
    $_SESSION['listname'] = $_GET['selectedList'];
    /* Redirecting to display items page */
    header('Location: display_items.php');
    header( "Refresh: 3;" );
}

/* Checks if remove list was called */
if (isset($_GET['removeList'])) {
    /* Calling function to remove list from shopping list database */
    removeList($_GET['removeList']);
    /* Redirecting to display lists page */
    header('Location: display_lists.php');
    header( "Refresh: 3;" );
}

/* Checks if add list was called */
if (isset($_GET['listname'])) {
    /* Calling function to add list into shopping list database */
    addList($_GET['listname']);
    /* Redirecting to display lists page */
    header('Location: display_lists.php');
    header( "Refresh: 3;" );
}

/* Checks if add item was called */
if ( isset($_GET['itemname']) ) {
    /* Calling function to add item into a specific list */
    addProductToList($_SESSION['listname'], $_GET['itemname'], rand());
    /* Redirecting to display_items page */
    header('Location: display_items.php');
    header( "Refresh: 3;" );
}

/* Checks if remove item was called */
if ( isset($_GET['removeItem']) ) {
    /* Calling function to remove item from a specific list */
    removeProductFromList($_SESSION['listname'], $_GET['removeItem']);
    /* Redirecting to display items page */
    header('Location: display_items.php');
    header( "Refresh: 3;" );
}


 /* Checks if logout was called */
if (isset($_GET['logout'])) {
    session_unset();
    /* Redirecting to login page */
    header("Location: login.php");
}

