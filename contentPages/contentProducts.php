<?php
require_once 'Processes/dbConnection.php';
require_once 'Processes/lucasLoavesFunctions.php';

$products = getAllProducts($dbConnection);
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-3">Our Artisan Sourdough Breads</h1>
            <hr class="mb-4" style="border-top: 3px solid #c5a880; width: 100px; margin: 0 auto;">
            <p class="text-center lead mb-5">Handcrafted daily using traditional methods and the finest organic ingredients</p>
        </div>
    </div>

    <div class="row">
        <?php foreach($products as $product): ?>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm product-card">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" 
                     class="card-img-top" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>"
                     style="height: 300px; object-fit: cover;"
                     onerror="this.src='images/placeholder.jpg'">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                    <p class="card-text text-muted flex-grow-1"><?php echo htmlspecialchars($product['description']); ?></p>
                    <div class="mt-auto">
                        <p class="fs-3 fw-bold mb-3" style="color: #c5a880;">$<?php echo number_format($product['price'], 2); ?></p>
                        <a href="productDetails.php?id=<?php echo $product['product_id']; ?>" 
                           class="btn w-100 mb-2" 
                           style="background-color: #c5a880; color: #000;">
                            <i class="fas fa-info-circle me-2"></i>View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="row mt-5 py-5" style="background-color: #f8f9fa; border-radius: 10px;">
        <div class="col-12">
            <h3 class="text-center mb-4">What Makes Our Bread Special?</h3>
            <div class="row">
                <div class="col-md-3 text-center mb-3">
                    <i class="fas fa-seedling fa-3x mb-3" style="color: #c5a880;"></i>
                    <h5>100% Organic</h5>
                    <p class="text-muted">All ingredients are certified organic and locally sourced</p>
                </div>
                <div class="col-md-3 text-center mb-3">
                    <i class="fas fa-hand-holding-heart fa-3x mb-3" style="color: #c5a880;"></i>
                    <h5>Handcrafted</h5>
                    <p class="text-muted">Each loaf is shaped by hand with care and precision</p>
                </div>
                <div class="col-md-3 text-center mb-3">
                    <i class="fas fa-hourglass-half fa-3x mb-3" style="color: #c5a880;"></i>
                    <h5>Slow Fermented</h5>
                    <p class="text-muted">24+ hours fermentation for better flavor and digestion</p>
                </div>
                <div class="col-md-3 text-center mb-3">
                    <i class="fas fa-fire fa-3x mb-3" style="color: #c5a880;"></i>
                    <h5>Stone Baked</h5>
                    <p class="text-muted">Baked in traditional stone ovens for perfect crust</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 text-center">
        <div class="col-12">
            <h3 class="mb-4">Want to Learn How to Make Your Own?</h3>
            <p class="lead mb-4">Join our monthly sourdough bread making class</p>
            <a href="breadMakingClass.php" class="btn btn-lg" style="background-color: #c5a880; color: #000;">
                <i class="fas fa-graduation-cap me-2"></i>View Class Details
            </a>
        </div>
    </div>
</div>

<style>
.product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
}
</style>

<script>
    document.querySelector('.pageTitle').textContent = 'Products - Luca\'s Loaves';
</script>
