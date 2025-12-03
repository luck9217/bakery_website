<?php
session_start();
?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-5x" style="color: #28a745;"></i>
                    </div>
                    
                    <h1 class="mb-3" style="color: #c5a880;">Application Submitted!</h1>
                    
                    <p class="lead mb-4">Thank you for applying to join the Luca's Loaves team!</p>
                    
                    <div class="alert alert-success">
                        <p class="mb-2"><strong>Your application has been successfully submitted.</strong></p>
                        <p class="mb-0">We've received your application and our team will review it carefully. If your qualifications match our requirements, we'll be in touch soon.</p>
                    </div>

                    <div class="my-4 py-4" style="background-color: #f8f9fa; border-radius: 10px;">
                        <h5 class="mb-3">What Happens Next?</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <i class="fas fa-envelope-open-text fa-2x mb-2" style="color: #c5a880;"></i>
                                <p class="small mb-0"><strong>Review</strong><br>We'll review your application</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <i class="fas fa-phone fa-2x mb-2" style="color: #c5a880;"></i>
                                <p class="small mb-0"><strong>Contact</strong><br>We'll reach out if you're a good fit</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <i class="fas fa-handshake fa-2x mb-2" style="color: #c5a880;"></i>
                                <p class="small mb-0"><strong>Interview</strong><br>Meet with our team</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted mb-3">While you wait, why not explore more about us?</p>
                        <div class="d-flex justify-content-center flex-wrap gap-2">
                            <a href="aboutUs.php" class="btn btn-outline-secondary">
                                <i class="fas fa-info-circle me-2"></i>About Us
                            </a>
                            <a href="products.php" class="btn" style="background-color: #c5a880; color: #000;">
                                <i class="fas fa-bread-slice me-2"></i>View Products
                            </a>
                            <a href="careers.php" class="btn btn-outline-secondary">
                                <i class="fas fa-briefcase me-2"></i>Other Positions
                            </a>
                        </div>
                    </div>

                    <hr class="my-4">

                    <p class="text-muted small mb-0">
                        <i class="fas fa-question-circle me-1"></i>
                        Questions? Feel free to <a href="contact.php">contact us</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.pageTitle').textContent = 'Application Submitted - Luca\'s Loaves';
</script>
