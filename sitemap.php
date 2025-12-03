<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap - Luca's Loaves</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="templates/template.css">
    <style>
        .sitemap-section {
            margin-bottom: 30px;
        }
        .sitemap-link {
            display: block;
            padding: 10px;
            margin: 5px 0;
            background-color: #f8f9fa;
            border-left: 4px solid #c5a880;
            text-decoration: none;
            color: #000;
            transition: all 0.3s ease;
        }
        .sitemap-link:hover {
            background-color: #c5a880;
            color: #fff;
            padding-left: 20px;
        }
        .sitemap-description {
            font-size: 0.9em;
            color: #666;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" id="navLogo" href="index.php">Luca's Loaves</a>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-4">Sitemap</h1>
        <hr class="mb-5" style="border-top: 3px solid #c5a880; width: 100px; margin: 0 auto;">

        <div class="row">
            <div class="col-md-6">
                <div class="sitemap-section">
                    <h4 style="color: #c5a880;">Main Pages</h4>
                    <a href="index.php" class="sitemap-link">
                        <strong>Home</strong>
                        <span class="sitemap-description">Welcome page with featured products</span>
                    </a>
                    <a href="aboutUs.php" class="sitemap-link">
                        <strong>About Us</strong>
                        <span class="sitemap-description">Learn about our story and values</span>
                    </a>
                    <a href="contact.php" class="sitemap-link">
                        <strong>Contact</strong>
                        <span class="sitemap-description">Get in touch with us</span>
                    </a>
                </div>

                <div class="sitemap-section">
                    <h4 style="color: #c5a880;">Products & Classes</h4>
                    <a href="products.php" class="sitemap-link">
                        <strong>Products</strong>
                        <span class="sitemap-description">Browse our artisan sourdough breads</span>
                    </a>
                    <a href="productDetails.php" class="sitemap-link">
                        <strong>Product Details</strong>
                        <span class="sitemap-description">View individual product information</span>
                    </a>
                    <a href="breadMakingClass.php" class="sitemap-link">
                        <strong>Bread Making Class</strong>
                        <span class="sitemap-description">Join our monthly sourdough class</span>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="sitemap-section">
                    <h4 style="color: #c5a880;">Shopping</h4>
                    <a href="shoppingCart.php" class="sitemap-link">
                        <strong>Shopping Cart</strong>
                        <span class="sitemap-description">Review and checkout your order</span>
                    </a>
                    <a href="orderSummary.php" class="sitemap-link">
                        <strong>Order Summary</strong>
                        <span class="sitemap-description">View your order confirmation</span>
                    </a>
                </div>

                <div class="sitemap-section">
                    <h4 style="color: #c5a880;">Careers</h4>
                    <a href="careers.php" class="sitemap-link">
                        <strong>Careers</strong>
                        <span class="sitemap-description">Explore job opportunities</span>
                    </a>
                    <a href="jobDetails.php" class="sitemap-link">
                        <strong>Job Details</strong>
                        <span class="sitemap-description">View job details and apply</span>
                    </a>
                </div>

                <div class="sitemap-section">
                    <h4 style="color: #c5a880;">Legal</h4>
                    <a href="privacy.php" class="sitemap-link">
                        <strong>Privacy Policy</strong>
                        <span class="sitemap-description">Our commitment to your privacy</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="index.php" class="btn btn-lg" style="background-color: #c5a880; color: #000;">
                Back to Home
            </a>
        </div>
    </div>

    <footer>
        <div class="container-fluid bg-dark">
            <div class="container">
                <div class="row copyright text-center py-3">
                    <p class="mb-0">COPYRIGHT© 2025 Luca's Loaves Pty Ltd. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
