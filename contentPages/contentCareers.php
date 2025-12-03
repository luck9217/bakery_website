<?php
require_once 'Processes/dbConnection.php';
require_once 'Processes/lucasLoavesFunctions.php';

$jobs = getAllJobs($dbConnection);
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-3">Careers at Luca's Loaves</h1>
            <hr class="mb-4" style="border-top: 3px solid #c5a880; width: 100px; margin: 0 auto;">
            <p class="text-center lead mb-5">Join our passionate team and be part of the artisan bread revolution!</p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-8 offset-md-2">
            <div class="alert" style="background-color: #f8f9fa; border-left: 4px solid #c5a880;">
                <h4 style="color: #c5a880;"><i class="fas fa-briefcase me-2"></i>Ongoing Opportunities</h4>
                <p class="mb-0">At Luca's Loaves, we're always looking for talented, passionate individuals to join our growing team. We believe in creating a supportive work environment where everyone can thrive and grow their skills in the art of artisan baking.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Current Job Openings</h2>
        </div>
    </div>

    <?php if(count($jobs) > 0): ?>
        <div class="row">
            <?php foreach($jobs as $job): ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header" style="background-color: #c5a880; color: #000;">
                        <h4 class="mb-0"><?php echo htmlspecialchars($job['title']); ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="mb-2">
                            <strong><i class="fas fa-clock me-2"></i>Employment Type:</strong> 
                            <span class="badge bg-secondary"><?php echo htmlspecialchars($job['employment_type']); ?></span>
                        </p>
                        <p class="mb-3">
                            <strong><i class="fas fa-map-marker-alt me-2"></i>Location:</strong> 
                            <?php echo htmlspecialchars($job['location']); ?>
                        </p>
                        <p class="card-text"><?php echo htmlspecialchars($job['short_summary']); ?></p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="jobDetails.php?id=<?php echo $job['job_id']; ?>" 
                           class="btn w-100" 
                           style="background-color: #000; color: #c5a880;">
                            View Details & Apply
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info">
                    <p class="mb-0">We don't have any open positions at the moment, but we're always interested in hearing from talented individuals. Please check back soon!</p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-5 py-5" style="background-color: #f8f9fa; border-radius: 10px;">
        <div class="col-md-8 offset-md-2">
            <h3 class="text-center mb-4">Why Work With Us?</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="d-flex">
                        <i class="fas fa-check-circle fa-2x me-3" style="color: #c5a880;"></i>
                        <div>
                            <h5>Competitive Pay</h5>
                            <p class="text-muted">We value our team and offer competitive wages and benefits.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex">
                        <i class="fas fa-check-circle fa-2x me-3" style="color: #c5a880;"></i>
                        <div>
                            <h5>Learning Opportunities</h5>
                            <p class="text-muted">Develop your skills in artisan baking with hands-on training.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex">
                        <i class="fas fa-check-circle fa-2x me-3" style="color: #c5a880;"></i>
                        <div>
                            <h5>Great Team Culture</h5>
                            <p class="text-muted">Join a supportive, friendly team that feels like family.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex">
                        <i class="fas fa-check-circle fa-2x me-3" style="color: #c5a880;"></i>
                        <div>
                            <h5>Flexible Hours</h5>
                            <p class="text-muted">We work with you to find schedules that fit your life.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 text-center">
        <div class="col-12">
            <h4 class="mb-3">Don't see the right position?</h4>
            <p class="lead mb-4">We're always interested in meeting talented individuals. Feel free to send us your details!</p>
            <a href="contact.php" class="btn btn-lg" style="background-color: #c5a880; color: #000;">
                <i class="fas fa-envelope me-2"></i>Contact Us
            </a>
        </div>
    </div>
</div>

<script>
    document.querySelector('.pageTitle').textContent = 'Careers - Luca\'s Loaves';
</script>
