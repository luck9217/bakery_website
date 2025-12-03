<?php
require_once 'dbConnection.php';
require_once 'lucasLoavesFunctions.php';
require_once 'OrderItem.php';

session_start();

if(isset($_POST['JOIN_CLASS'])) {
    // Get class details from database
    $breadClass = getBreadClass($dbConnection);
    
    if($breadClass) {
        // Initialize cart if not exists
        if(!isset($_SESSION['ARRAY_ORDERS'])) {
            $_SESSION['ARRAY_ORDERS'] = [];
        }
        
        // Create order item for the class
        $orderItem = new OrderItem(
            'CLASS_' . $breadClass['class_id'],
            $breadClass['name'],
            $breadClass['price_inc_gst'],
            $breadClass['price_inc_gst'],
            1,
            date("Y-m-d", strtotime("first saturday of next month")),
            "09:00",
            $breadClass['image_url']
        );
        
        // Add to cart
        array_push($_SESSION['ARRAY_ORDERS'], $orderItem);
        
        // Redirect to shopping cart
        header('Location: ../shoppingCart.php');
        exit;
    }
}

// If something went wrong, redirect back to class page
header('Location: ../breadMakingClass.php');
exit;
?>
