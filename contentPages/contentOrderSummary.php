<?php
if(!isset($_SESSION['ARRAY_ORDERS']) || count($_SESSION['ARRAY_ORDERS']) == 0) {
    header('Location: products.php');
    exit;
}

$cartItems = $_SESSION['ARRAY_ORDERS'];
$totalAmount = 0;
$orderNumber = 'LL' . date('Ymd') . rand(1000, 9999);
$customerName = isset($_SESSION['CUSTOMER_FIRST_NAME']) && isset($_SESSION['CUSTOMER_LAST_NAME']) 
    ? $_SESSION['CUSTOMER_FIRST_NAME'] . ' ' . $_SESSION['CUSTOMER_LAST_NAME'] 
    : 'Customer';
$orderDateTime = date('F j, Y g:i A');

foreach($cartItems as $item) {
    $totalAmount += $item->getTotalAmount();
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-5x" style="color: #28a745;"></i>
                    </div>
                    
                    <h1 class="mb-3" style="color: #c5a880;">Order Confirmed!</h1>
                    
                    <p class="lead mb-4">Thank you for your order!</p>
                    
                    <div class="alert alert-success">
                        <p class="mb-0"><strong>Your order has been successfully placed.</strong></p>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-header" style="background-color: #f8f9fa;">
                    <h4 class="mb-0">Order Details</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <p class="mb-1 text-muted">Order Number</p>
                            <p class="fw-bold"><?php echo $orderNumber; ?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-1 text-muted">Customer Name</p>
                            <p class="fw-bold"><?php echo htmlspecialchars($customerName); ?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-1 text-muted">Order Date & Time</p>
                            <p class="fw-bold"><?php echo $orderDateTime; ?></p>
                        </div>
                    </div>

                    <h5 class="mb-3">Order Items</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: #f8f9fa;">
                                <tr>
                                    <th>Item</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Pick-up Date</th>
                                    <th>Pick-up Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cartItems as $item): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item->getProductName()); ?></td>
                                    <td>$<?php echo number_format($item->getUnitPrice(), 2); ?></td>
                                    <td><?php echo $item->getQuantityOrdered(); ?></td>
                                    <td>$<?php echo number_format($item->getTotalAmount(), 2); ?></td>
                                    <td><?php echo date('M d, Y', strtotime($item->getPickUpDate())); ?></td>
                                    <td><?php echo date('g:i A', strtotime($item->getPickUpTime())); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr class="table-active">
                                    <td colspan="3" class="text-end fw-bold">Grand Total:</td>
                                    <td colspan="3" class="fw-bold" style="color: #c5a880; font-size: 1.2em;">
                                        $<?php echo number_format($totalAmount, 2); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-info-circle me-2" style="color: #c5a880;"></i>Important Information</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            A confirmation email has been sent to <?php echo isset($_SESSION['CUSTOMER_EMAIL']) ? htmlspecialchars($_SESSION['CUSTOMER_EMAIL']) : 'your email'; ?>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-clock text-info me-2"></i>
                            Please pick up your order at the scheduled date and time
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            Pick-up Location: 123 Pitt Street, Sydney NSW 2000
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone text-primary me-2"></i>
                            For any questions, call us at (02) 9999 9999
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="products.php" class="btn btn-lg me-2" style="background-color: #c5a880; color: #000;">
                    <i class="fas fa-shopping-basket me-2"></i>Continue Shopping
                </a>
                <a href="index.php" class="btn btn-lg btn-outline-secondary">
                    <i class="fas fa-home me-2"></i>Back to Home
                </a>
            </div>
        </div>
    </div>
</div>

<?php
// Clear the cart after displaying the order summary
unset($_SESSION['ARRAY_ORDERS']);
unset($_SESSION['CUSTOMER_FIRST_NAME']);
unset($_SESSION['CUSTOMER_LAST_NAME']);
unset($_SESSION['CUSTOMER_EMAIL']);
unset($_SESSION['CUSTOMER_PHONE']);
?>

<script>
    document.querySelector('.pageTitle').textContent = 'Order Summary - Luca\'s Loaves';
</script>
