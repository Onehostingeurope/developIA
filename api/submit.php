<?php
/**
 * DevelopIA - Form Submission API Endpoint (MySQL Storage)
 */

header('Content-Type: application/json');

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

// Retrieve raw JSON input or POST fields
$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);

if (!$input && !empty($_POST)) {
    $input = $_POST;
}

$name = trim($input['name'] ?? '');
$email = trim($input['email'] ?? '');
$projectType = trim($input['project_type'] ?? ($input['project'] ?? 'General Inquiry'));
$message = trim($input['message'] ?? '');

// Basic validation
if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Valid name and email are required']);
    exit;
}

$ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
$userAgent = substr($_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN', 0, 250);

$pdo = getDBConnection();

if (!$pdo) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database connection failed. Please ensure MySQL is configured.']);
    exit;
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO `inquiries` (`name`, `email`, `project_type`, `message`, `ip_address`, `user_agent`, `status`, `created_at`)
        VALUES (:name, :email, :project_type, :message, :ip_address, :user_agent, 'new', NOW())
    ");

    $stmt->execute([
        ':name'         => $name,
        ':email'        => $email,
        ':project_type' => $projectType,
        ':message'      => $message,
        ':ip_address'   => $ipAddress,
        ':user_agent'   => $userAgent
    ]);

    $inquiryId = $pdo->lastInsertId();

    // Optionally attempt email notification to admin
    @mail(
        ADMIN_EMAIL,
        "New Inquiry #{$inquiryId} from {$name}",
        "Name: {$name}\nEmail: {$email}\nProject Type: {$projectType}\nMessage:\n{$message}\n\nSubmitted at: " . date('Y-m-d H:i:s'),
        "From: noreply@" . ($_SERVER['HTTP_HOST'] ?? 'developia.org')
    );

    echo json_encode([
        'success' => true,
        'message' => 'Your project parameters have been uploaded via secure handshake.',
        'inquiry_id' => $inquiryId
    ]);

} catch (PDOException $e) {
    error_log("Failed to insert inquiry: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to save inquiry to database.']);
}
