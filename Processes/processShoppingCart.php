<?php
require_once 'dbConnection.php';
require_once 'lucasLoavesFunctions.php';

// Include OrderItem class if it exists
if(file_exists('OrderItem.php')) {
    require_once 'OrderItem.php';
}

session_start();

if(isset($_POST['SHOPPINGCART'])) {
    // Process adding item to cart
    addItemsToOrder($dbConnection);
    
    // Redirect to shopping cart page
    header('Location: ../shoppingCart.php');
    exit;
}

// If no action specified, redirect to products page
header('Location: ../products.php');
exit;
?>
