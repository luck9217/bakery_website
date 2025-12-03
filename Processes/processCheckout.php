<?php
session_start();

if(isset($_POST['CHECKOUT'])) {
    // Store customer information in session
    $_SESSION['CUSTOMER_FIRST_NAME'] = $_POST['firstName'];
    $_SESSION['CUSTOMER_LAST_NAME'] = $_POST['lastName'];
    $_SESSION['CUSTOMER_EMAIL'] = $_POST['customerEmail'];
    $_SESSION['CUSTOMER_PHONE'] = $_POST['contactPhone'];
    
    // In a real application, you would process payment here
    // For now, we'll just redirect to order summary
    
    header('Location: ../orderSummary.php');
    exit;
}

header('Location: ../shoppingCart.php');
exit;
?>
