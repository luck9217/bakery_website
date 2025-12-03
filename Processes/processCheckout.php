<?php
session_start();
include_once 'dbConnection.php';
include_once 'lucasLoavesFunctions.php';

if(isset($_POST['CHECKOUT'])) {
    // Store customer information in session
    $_SESSION['CUSTOMER_FIRST_NAME'] = $_POST['firstName'];
    $_SESSION['CUSTOMER_LAST_NAME'] = $_POST['lastName'];
    $_SESSION['CUSTOMER_EMAIL'] = $_POST['customerEmail'];
    $_SESSION['CUSTOMER_PHONE'] = $_POST['contactPhone'];
    
    // Save order to database
    $orderId = saveOrderToDatabase($connection);
    
    if($orderId) {
        $_SESSION['ORDER_ID'] = $orderId;
        header('Location: ../orderSummary.php');
        exit;
    } else {
        // If order save fails, redirect back to cart with error
        $_SESSION['CHECKOUT_ERROR'] = "Failed to process order. Please try again.";
        header('Location: ../shoppingCart.php');
        exit;
    }
}

header('Location: ../shoppingCart.php');
exit;
?>
