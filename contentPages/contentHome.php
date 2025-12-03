<?php
require_once 'Processes/dbConnection.php';
require_once 'Processes/lucasLoavesFunctions.php';

$products = getAllProducts($dbConnection);
?>

<div class="container-fluid hero-section py-5 mb-5" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('images/bread_hero.jpg') center/cover; min-height: 400px; color: white;">
    <div class="container text-center d-flex flex-column justify-content-center" style="min-height: 400px;">
        <h1 class="display-3 fw-bold mb-3">Welcome to Luca's Loaves</h1>
        <p class="lead fs-4">Artisan sourdough bread baked fresh daily</p>
        <div class="mt-4">
            <a href="products.php" class="btn btn-lg me-3" style="background-color: #c5a880; color: #000; border: none;">Shop Now</a>
            <a href="breadMakingClass.php" class="btn btn-outline-light btn-lg">Join Our Class</a>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">Our Artisan Sourdough Breads</h2>
    <p class="text-center text-muted mb-5">Handcrafted with love, using traditional methods and the finest ingredients</p>
    
    <div class="row">
        <?php foreach($products as $product): ?>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" 
                     class="card-img-top" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>"
                     style="height: 250px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                    <p class="card-text text-muted"><?php echo htmlspecialchars($product['description']); ?></p>
                    <div class="mt-auto">
                        <p class="fs-4 fw-bold mb-3" style="color: #c5a880;">$<?php echo number_format($product['price'], 2); ?></p>
                        <a href="productDetails.php?id=<?php echo $product['product_id']; ?>" 
                           class="btn w-100" 
                           style="background-color: #c5a880; color: #000;">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container-fluid py-5 mb-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="images/bread_class.jpg" alt="Bread Making Class" class="img-fluid rounded shadow" onerror="this.src='images/placeholder.jpg'">
            </div>
            <div class="col-md-6">
                <h2 class="mb-4">Learn the Art of Sourdough</h2>
                <p class="lead">Join our monthly bread making class and discover the secrets of traditional sourdough baking.</p>
                <ul class="list-unstyled">
                    <li class="mb-2">✓ First Saturday of every month</li>
                    <li class="mb-2">✓ 9am to 5pm with lunch included</li>
                    <li class="mb-2">✓ Hands-on experience</li>
                    <li class="mb-2">✓ Take home your own loaf</li>
                </ul>
                <a href="breadMakingClass.php" class="btn btn-lg mt-3" style="background-color: #c5a880; color: #000;">Learn More</a>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 text-center">
    <h2 class="mb-4">Why Choose Luca's Loaves?</h2>
    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="p-4">
                <i class="fas fa-award fa-3x mb-3" style="color: #c5a880;"></i>
                <h4>Premium Quality</h4>
                <p class="text-muted">Only the finest organic ingredients in every loaf</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4">
                <i class="fas fa-heart fa-3x mb-3" style="color: #c5a880;"></i>
                <h4>Made with Love</h4>
                <p class="text-muted">Traditional methods passed down through generations</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4">
                <i class="fas fa-clock fa-3x mb-3" style="color: #c5a880;"></i>
                <h4>Baked Fresh Daily</h4>
                <p class="text-muted">Fresh bread every morning, just for you</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.pageTitle').textContent = 'Luca\'s Loaves - Artisan Sourdough Bakery';
</script>
