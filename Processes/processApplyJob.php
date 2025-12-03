<?php
require_once 'dbConnection.php';
require_once 'lucasLoavesFunctions.php';
session_start();

if(isset($_POST['APPLY_JOB'])) {
    $jobId = intval($_POST['job_id']);
    $name = trim($_POST['applicant_name']);
    $email = trim($_POST['applicant_email']);
    
    // Handle file uploads
    $uploadDir = '../uploads/applications/';
    
    // Create upload directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $coverLetterPath = '';
    $resumePath = '';
    
    // Handle cover letter upload
    if(isset($_FILES['cover_letter']) && $_FILES['cover_letter']['error'] == 0) {
        $coverLetterName = time() . '_cover_' . basename($_FILES['cover_letter']['name']);
        $coverLetterPath = $uploadDir . $coverLetterName;
        move_uploaded_file($_FILES['cover_letter']['tmp_name'], $coverLetterPath);
    }
    
    // Handle resume upload (required)
    if(isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
        $resumeName = time() . '_resume_' . basename($_FILES['resume']['name']);
        $resumePath = $uploadDir . $resumeName;
        move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath);
    }
    
    // Submit application
    if(submitJobApplication($dbConnection, $jobId, $name, $email, $coverLetterPath, $resumePath)) {
        $_SESSION['application_success'] = true;
        header('Location: ../contentJobApplicationSent.php');
    } else {
        header('Location: ../jobDetails.php?id=' . $jobId . '&error=1');
    }
    exit;
}

header('Location: ../careers.php');
exit;
?>
