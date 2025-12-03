<?php
require_once 'Processes/dbConnection.php';
require_once 'Processes/lucasLoavesFunctions.php';

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = getProductById($dbConnection, $productId);

if (!$product) {
    header('Location: products.php');
    exit;
}

// Store in session for cart processing
$_SESSION['PRODUCT_NUMBER'] = $product['product_id'];
$_SESSION['PRODUCT_NAME'] = $product['name'];
$_SESSION['UNIT_PRICE'] = $product['price'];
$_SESSION['PRODUCT_IMAGE'] = $product['image_url'];
$_SESSION['PRODUCT_DESCRIPTION'] = $product['description'];
?>

<div class="container my-5">
    <div class="row mb-3">
        <div class="col-12">
            <a href="products.php" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Products
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" 
                 class="img-fluid rounded shadow" 
                 alt="<?php echo htmlspecialchars($product['name']); ?>"
                 onerror="this.src='images/placeholder.jpg'">
        </div>
        
        <div class="col-md-6">
            <h1 class="mb-3"><?php echo htmlspecialchars($product['name']); ?></h1>
            <h2 class="mb-4" style="color: #c5a880;">$<?php echo number_format($product['price'], 2); ?></h2>
            
            <div class="mb-4">
                <h5>Description</h5>
                <p class="lead"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Order Details</h5>
                    
                    <form action="Processes/processShoppingCart.php" method="post" id="orderForm">
                        <input type="hidden" name="productNumber" value="<?php echo $product['product_id']; ?>">
                        <input type="hidden" name="unitPrice" value="<?php echo $product['price']; ?>">
                        
                        <div class="mb-3">
                            <label for="tbQuantity" class="form-label">Quantity</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="tbQuantity" 
                                   name="tbQuantity" 
                                   min="1" 
                                   value="1" 
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="tbPickUpDate" class="form-label">Pick-up Date</label>
                            <input type="date" 
                                   class="form-control" 
                                   id="tbPickUpDate" 
                                   name="tbPickUpDate" 
                                   min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                                   required>
                            <small class="form-text text-muted">Orders must be placed at least 1 day in advance</small>
                        </div>
                        
                        <div class="mb-4">
                            <label for="tbPickUpTime" class="form-label">Pick-up Time</label>
                            <input type="time" 
                                   class="form-control" 
                                   id="tbPickUpTime" 
                                   name="tbPickUpTime" 
                                   min="07:00" 
                                   max="18:00" 
                                   value="09:00"
                                   required>
                            <small class="form-text text-muted">Available 7:00 AM - 6:00 PM</small>
                        </div>
                        
                        <button type="submit" 
                                name="SHOPPINGCART" 
                                class="btn btn-lg w-100" 
                                style="background-color: #c5a880; color: #000;">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-4">Product Features</h3>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center p-3">
                        <i class="fas fa-leaf fa-2x mb-2" style="color: #c5a880;"></i>
                        <p class="fw-bold mb-1">100% Organic</p>
                        <small class="text-muted">Certified organic ingredients</small>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center p-3">
                        <i class="fas fa-bread-slice fa-2x mb-2" style="color: #c5a880;"></i>
                        <p class="fw-bold mb-1">Handcrafted</p>
                        <small class="text-muted">Made with traditional methods</small>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center p-3">
                        <i class="fas fa-clock fa-2x mb-2" style="color: #c5a880;"></i>
                        <p class="fw-bold mb-1">Slow Fermented</p>
                        <small class="text-muted">24+ hours fermentation</small>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center p-3">
                        <i class="fas fa-heart fa-2x mb-2" style="color: #c5a880;"></i>
                        <p class="fw-bold mb-1">Made Fresh</p>
                        <small class="text-muted">Baked daily in small batches</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.pageTitle').textContent = '<?php echo htmlspecialchars($product['name']); ?> - Luca\'s Loaves';
    
    // Set minimum pickup date to tomorrow
    document.getElementById('tbPickUpDate').min = '<?php echo date('Y-m-d', strtotime('+1 day')); ?>';
</script>

