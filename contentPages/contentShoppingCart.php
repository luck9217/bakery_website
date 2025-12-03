<?php
if(!isset($_SESSION['ARRAY_ORDERS'])) {
    $_SESSION['ARRAY_ORDERS'] = [];
}

$cartItems = $_SESSION['ARRAY_ORDERS'];
$totalAmount = 0;

foreach($cartItems as $item) {
    $totalAmount += $item->getTotalAmount();
}
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Shopping Cart</h1>
    <hr class="mb-5" style="border-top: 3px solid #c5a880; width: 100px; margin: 0 auto;">

    <?php if(count($cartItems) == 0): ?>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm text-center py-5">
                    <div class="card-body">
                        <i class="fas fa-shopping-cart fa-5x mb-4 text-muted"></i>
                        <h3 class="mb-3">Your Cart is Empty</h3>
                        <p class="text-muted mb-4">You haven't added any items to your cart yet.</p>
                        <a href="products.php" class="btn btn-lg" style="background-color: #c5a880; color: #000;">
                            <i class="fas fa-bread-slice me-2"></i>Browse Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: #f8f9fa;">
                        <h5 class="mb-0">Cart Items (<?php echo count($cartItems); ?>)</h5>
                    </div>
                    <div class="card-body p-0">
                        <?php foreach($cartItems as $index => $item): ?>
                        <div class="cart-item p-3 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="<?php echo htmlspecialchars($item->getProductImage()); ?>" 
                                         class="img-fluid rounded" 
                                         alt="<?php echo htmlspecialchars($item->getProductName()); ?>"
                                         onerror="this.src='images/placeholder.jpg'">
                                </div>
                                <div class="col-md-4">
                                    <h6 class="mb-1"><?php echo htmlspecialchars($item->getProductName()); ?></h6>
                                    <p class="text-muted small mb-0">$<?php echo number_format($item->getUnitPrice(), 2); ?> each</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="mb-1"><strong>Quantity:</strong> <?php echo $item->getQuantityOrdered(); ?></p>
                                    <p class="mb-0 small text-muted">
                                        <strong>Pickup:</strong><br>
                                        <?php echo date('M d, Y', strtotime($item->getPickUpDate())); ?><br>
                                        <?php echo date('g:i A', strtotime($item->getPickUpTime())); ?>
                                    </p>
                                </div>
                                <div class="col-md-2 text-end">
                                    <h5 class="mb-0" style="color: #c5a880;">
                                        $<?php echo number_format($item->getTotalAmount(), 2); ?>
                                    </h5>
                                </div>
                                <div class="col-md-1 text-end">
                                    <form action="Processes/processRemoveItem.php" method="post" style="display:inline;">
                                        <input type="hidden" name="item_index" value="<?php echo $index; ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm sticky-top" style="top: 20px;">
                    <div class="card-header" style="background-color: #c5a880; color: #000;">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal:</span>
                            <strong>$<?php echo number_format($totalAmount, 2); ?></strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <h5>Total:</h5>
                            <h5 style="color: #c5a880;">$<?php echo number_format($totalAmount, 2); ?></h5>
                        </div>

                        <form action="Processes/processCheckout.php" method="post">
                            <h6 class="mb-3">Customer Details</h6>
                            
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="customerEmail" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="contactPhone" class="form-label">Phone *</label>
                                <input type="tel" class="form-control" id="contactPhone" name="contactPhone" required>
                            </div>

                            <hr class="my-4">
                            
                            <h6 class="mb-3">Payment Information</h6>
                            
                            <div class="mb-3">
                                <label for="creditCardNumber" class="form-label">Card Number *</label>
                                <input type="text" class="form-control" id="creditCardNumber" name="creditCardNumber" placeholder="1234 5678 9012 3456" required>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="expiration" class="form-label">Expiry *</label>
                                    <input type="text" class="form-control" id="expiration" name="expiration" placeholder="MM/YY" required>
                                </div>
                                <div class="col-6">
                                    <label for="securityCode" class="form-label">CVV *</label>
                                    <input type="text" class="form-control" id="securityCode" name="securityCode" placeholder="123" required>
                                </div>
                            </div>
                            
                            <button type="submit" name="CHECKOUT" class="btn btn-lg w-100 mb-2" style="background-color: #000; color: #c5a880;">
                                <i class="fas fa-lock me-2"></i>Proceed to Checkout
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-secondary w-100" onclick="fillTestData()">
                                Generate Test Data
                            </button>
                        </form>

                        <div class="mt-3 text-center">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt me-1"></i>
                                Secure checkout
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <a href="products.php" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Continue Shopping
            </a>
        </div>
    </div>
</div>

<script>
    document.querySelector('.pageTitle').textContent = 'Shopping Cart - Luca\'s Loaves';
    
    function fillTestData() {
        document.getElementById('firstName').value = 'John';
        document.getElementById('lastName').value = 'Doe';
        document.getElementById('customerEmail').value = 'john.doe@email.com';
        document.getElementById('contactPhone').value = '0412345678';
        document.getElementById('creditCardNumber').value = '4111111111111111';
        document.getElementById('expiration').value = '12/25';
        document.getElementById('securityCode').value = '123';
    }
</script>

<style>
.cart-item:last-child {
    border-bottom: none !important;
}

.cart-item:hover {
    background-color: #f8f9fa;
}
</style>
