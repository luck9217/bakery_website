<?php
require_once 'Processes/dbConnection.php';
require_once 'Processes/lucasLoavesFunctions.php';

$breadClass = getBreadClass($dbConnection);

if (!$breadClass) {
    echo "<div class='container my-5'><div class='alert alert-warning'>Class information not available at this time.</div></div>";
    exit;
}
?>

<div class="container-fluid p-0 mb-5" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo htmlspecialchars($breadClass['image_url']); ?>') center/cover; min-height: 400px;">
    <div class="container text-center text-white d-flex flex-column justify-content-center" style="min-height: 400px;">
        <h1 class="display-3 fw-bold mb-3"><?php echo htmlspecialchars($breadClass['name']); ?></h1>
        <p class="lead fs-4">Learn the art of traditional sourdough baking</p>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">About the Class</h2>
            <p class="lead"><?php echo nl2br(htmlspecialchars($breadClass['description'])); ?></p>
            
            <div class="mt-5">
                <h3 class="mb-4">What You'll Learn</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <i class="fas fa-check-circle fa-2x me-3" style="color: #c5a880;"></i>
                            <div>
                                <h5>Sourdough Starter</h5>
                                <p class="text-muted">Create and maintain your own sourdough starter</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <i class="fas fa-check-circle fa-2x me-3" style="color: #c5a880;"></i>
                            <div>
                                <h5>Mixing & Kneading</h5>
                                <p class="text-muted">Master the techniques of dough preparation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <i class="fas fa-check-circle fa-2x me-3" style="color: #c5a880;"></i>
                            <div>
                                <h5>Shaping & Scoring</h5>
                                <p class="text-muted">Learn to shape and score like a professional</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex">
                            <i class="fas fa-check-circle fa-2x me-3" style="color: #c5a880;"></i>
                            <div>
                                <h5>Baking Techniques</h5>
                                <p class="text-muted">Perfect your baking for the ideal crust and crumb</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h3 class="mb-4">Class Details</h3>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <i class="fas fa-calendar-alt me-2" style="color: #c5a880;"></i>
                        <strong>Schedule:</strong> <?php echo htmlspecialchars($breadClass['schedule']); ?>
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-clock me-2" style="color: #c5a880;"></i>
                        <strong>Duration:</strong> Full day (9am - 5pm)
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-utensils me-2" style="color: #c5a880;"></i>
                        <strong>Lunch:</strong> Included (homemade soup and bread)
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-user-friends me-2" style="color: #c5a880;"></i>
                        <strong>Class Size:</strong> Small groups (max 12 people)
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-map-marker-alt me-2" style="color: #c5a880;"></i>
                        <strong>Location:</strong> 123 Pitt Street, Sydney NSW 2000
                    </li>
                </ul>
            </div>

            <div class="mt-5">
                <h3 class="mb-4">What's Included</h3>
                <div class="row">
                    <div class="col-md-4 mb-3 text-center">
                        <i class="fas fa-book fa-3x mb-2" style="color: #c5a880;"></i>
                        <p class="fw-bold">Recipe Book</p>
                        <small class="text-muted">Take home our curated sourdough recipes</small>
                    </div>
                    <div class="col-md-4 mb-3 text-center">
                        <i class="fas fa-bread-slice fa-3x mb-2" style="color: #c5a880;"></i>
                        <p class="fw-bold">Your Own Loaf</p>
                        <small class="text-muted">Bake and take home your creation</small>
                    </div>
                    <div class="col-md-4 mb-3 text-center">
                        <i class="fas fa-flask fa-3x mb-2" style="color: #c5a880;"></i>
                        <p class="fw-bold">Starter Culture</p>
                        <small class="text-muted">Get your own sourdough starter to continue at home</small>
                    </div>
                </div>
            </div>

            <div class="mt-5 embed-responsive embed-responsive-16by9 mb-4">
                <iframe class="embed-responsive-item w-100" 
                        style="height: 400px;" 
                        src="https://www.youtube.com/embed/h6XVAUZJ3QI" 
                        allowfullscreen></iframe>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm sticky-top" style="top: 20px;">
                <div class="card-header text-center" style="background-color: #c5a880; color: #000;">
                    <h4 class="mb-0">Register Now</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <p class="text-muted mb-1">Price</p>
                        <h2 class="fw-bold" style="color: #c5a880;">
                            $<?php echo number_format($breadClass['price_inc_gst'], 2); ?>
                        </h2>
                        <small class="text-muted">Inc. GST</small>
                    </div>

                    <div class="alert alert-info">
                        <small>
                            <i class="fas fa-info-circle me-1"></i>
                            Price: $<?php echo number_format($breadClass['price_ex_gst'], 2); ?> + GST ($<?php echo number_format($breadClass['price_ex_gst'] * $breadClass['gst_rate'], 2); ?>)
                        </small>
                    </div>

                    <form action="Processes/processBreadClass.php" method="post">
                        <input type="hidden" name="class_id" value="<?php echo $breadClass['class_id']; ?>">
                        
                        <button type="submit" 
                                name="JOIN_CLASS" 
                                class="btn btn-lg w-100 mb-3" 
                                style="background-color: #000; color: #c5a880;">
                            <i class="fas fa-calendar-check me-2"></i>Register for Next Class
                        </button>
                    </form>

                    <div class="mt-4">
                        <h6 class="fw-bold mb-3">Why Join?</h6>
                        <ul class="list-unstyled small">
                            <li class="mb-2">✓ Hands-on learning experience</li>
                            <li class="mb-2">✓ Expert instruction from Luca</li>
                            <li class="mb-2">✓ Small, intimate class sizes</li>
                            <li class="mb-2">✓ All materials included</li>
                            <li class="mb-2">✓ Take home everything you need</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Questions?</h6>
                    <p class="small text-muted mb-3">Contact us for more information about the class</p>
                    <a href="contact.php" class="btn btn-outline-secondary btn-sm w-100">
                        <i class="fas fa-envelope me-2"></i>Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.pageTitle').textContent = 'Bread Making Class - Luca\'s Loaves';
</script>

