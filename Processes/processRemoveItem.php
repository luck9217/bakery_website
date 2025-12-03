<?php
session_start();

if(isset($_POST['item_index']) && isset($_SESSION['ARRAY_ORDERS'])) {
    $index = intval($_POST['item_index']);
    
    // Remove item from array
    if(isset($_SESSION['ARRAY_ORDERS'][$index])) {
        array_splice($_SESSION['ARRAY_ORDERS'], $index, 1);
    }
}

header('Location: ../shoppingCart.php');
exit;
?>
