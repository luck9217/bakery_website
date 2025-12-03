<?php
// About Us page content
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">About Luca's Loaves</h1>
            <hr class="mb-5" style="border-top: 3px solid #c5a880; width: 100px; margin: 0 auto;">
        </div>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="images/luca_bakery.jpg" alt="Luca's Bakery" class="img-fluid rounded shadow" onerror="this.src='images/placeholder.jpg'">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Our Story</h2>
            <div class="about-content">
                <h4 style="color: #c5a880;">Key Facts About Luca and the Bread!</h4>
                
                <p class="lead">Welcome to Luca's Loaves, where tradition meets passion in every sourdough loaf we create.</p>
                
                <p>Luca's Loaves is a small artisan bakery located in the heart of Sydney, specializing in traditional sourdough bread. Founded by Luca, a passionate baker with years of experience in the craft, our bakery is dedicated to producing high-quality, handmade sourdough using only the finest organic ingredients.</p>
                
                <p>At Luca's Loaves, we believe in the art of slow fermentation. Each loaf is carefully crafted using a natural sourdough starter that has been nurtured for years, giving our bread its distinctive flavor and texture. We use traditional baking methods, combined with modern techniques, to ensure every loaf meets our exacting standards.</p>
                
                <p>Our commitment goes beyond just making bread. We're dedicated to building a community of bread lovers and sharing our knowledge through monthly bread-making classes. Whether you're a seasoned baker or just starting out, we invite you to join us and discover the joy of creating your own artisan sourdough.</p>
                
                <p class="mt-4">Located at <strong>123 Pitt Street, Sydney NSW 2000</strong>, we welcome you to visit our bakery, taste our breads, and experience the difference that passion and dedication make.</p>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4">Our Values</h3>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-leaf fa-3x mb-3" style="color: #c5a880;"></i>
                    <h5 class="card-title">Quality Ingredients</h5>
                    <p class="card-text">We source only organic, locally-sourced ingredients to ensure the highest quality in every loaf.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x mb-3" style="color: #c5a880;"></i>
                    <h5 class="card-title">Community First</h5>
                    <p class="card-text">We're more than a bakery - we're a community hub where bread lovers gather and learn.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-history fa-3x mb-3" style="color: #c5a880;"></i>
                    <h5 class="card-title">Traditional Methods</h5>
                    <p class="card-text">We honor time-tested baking techniques while embracing innovation for the perfect loaf.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 py-5" style="background-color: #f8f9fa; border-radius: 10px;">
        <div class="col-12 text-center">
            <h3 class="mb-4">What Makes Our Sourdough Special?</h3>
            <div class="row mt-4">
                <div class="col-md-3 mb-3">
                    <h1 style="color: #c5a880;">24+</h1>
                    <p class="text-muted">Hours of Fermentation</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h1 style="color: #c5a880;">100%</h1>
                    <p class="text-muted">Organic Ingredients</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h1 style="color: #c5a880;">0</h1>
                    <p class="text-muted">Artificial Additives</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h1 style="color: #c5a880;">∞</h1>
                    <p class="text-muted">Love & Passion</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 text-center">
        <div class="col-12">
            <h3 class="mb-4">Join Our Journey</h3>
            <p class="lead mb-4">Whether you're here for our delicious bread, interested in learning the craft, or looking to join our team, we'd love to hear from you.</p>
            <a href="products.php" class="btn btn-lg me-2 mb-2" style="background-color: #c5a880; color: #000;">Shop Our Breads</a>
            <a href="breadMakingClass.php" class="btn btn-lg me-2 mb-2" style="background-color: #000; color: #c5a880;">Join a Class</a>
            <a href="careers.php" class="btn btn-lg mb-2" style="background-color: #000; color: #c5a880;">Careers</a>
        </div>
    </div>
</div>

<script>
    document.querySelector('.pageTitle').textContent = 'About Us - Luca\'s Loaves';
</script>
