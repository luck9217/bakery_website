<?php
require_once 'Processes/dbConnection.php';
require_once 'Processes/lucasLoavesFunctions.php';

$jobId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$job = getJobById($dbConnection, $jobId);

if (!$job) {
    header('Location: careers.php');
    exit;
}
?>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-12">
            <a href="careers.php" class="btn btn-outline-secondary mb-3">
                <i class="fas fa-arrow-left me-2"></i>Back to Careers
            </a>
            <h1 class="mb-3"><?php echo htmlspecialchars($job['title']); ?></h1>
            <div class="mb-3">
                <span class="badge bg-secondary me-2"><?php echo htmlspecialchars($job['employment_type']); ?></span>
                <span class="text-muted"><i class="fas fa-map-marker-alt me-1"></i><?php echo htmlspecialchars($job['location']); ?></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3">Job Description</h4>
                    <p class="lead"><?php echo htmlspecialchars($job['short_summary']); ?></p>
                    <hr>
                    <p><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3">Requirements</h4>
                    <p><?php echo nl2br(htmlspecialchars($job['requirements'])); ?></p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm sticky-top" style="top: 20px;">
                <div class="card-header" style="background-color: #c5a880; color: #000;">
                    <h5 class="mb-0">Apply Now</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Fill out the form below to apply for this position</p>
                    
                    <form action="Processes/processApplyJob.php" 
                          method="post" 
                          enctype="multipart/form-data">
                        
                        <input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
                        
                        <div class="mb-3">
                            <label for="applicant_name" class="form-label">Full Name *</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="applicant_name" 
                                   name="applicant_name" 
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="applicant_email" class="form-label">Email Address *</label>
                            <input type="email" 
                                   class="form-control" 
                                   id="applicant_email" 
                                   name="applicant_email" 
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="cover_letter" class="form-label">Cover Letter</label>
                            <input type="file" 
                                   class="form-control" 
                                   id="cover_letter" 
                                   name="cover_letter"
                                   accept=".pdf,.doc,.docx">
                            <small class="form-text text-muted">PDF, DOC, or DOCX format</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="resume" class="form-label">Resume *</label>
                            <input type="file" 
                                   class="form-control" 
                                   id="resume" 
                                   name="resume"
                                   accept=".pdf,.doc,.docx"
                                   required>
                            <small class="form-text text-muted">PDF, DOC, or DOCX format</small>
                        </div>
                        
                        <button type="submit" 
                                name="APPLY_JOB" 
                                class="btn w-100" 
                                style="background-color: #000; color: #c5a880;">
                            <i class="fas fa-paper-plane me-2"></i>Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.pageTitle').textContent = '<?php echo htmlspecialchars($job['title']); ?> - Luca\'s Loaves';
</script>
