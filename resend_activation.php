<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: activation.php');
    exit();
}

$email = sanitize_input($_POST['email']);
$errors = [];

// Validate email
if (empty($email) || !is_valid_email($email)) {
    $errors[] = "Valid email is required";
}

// Check if email exists and account is pending
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND status = 'pending' LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $errors[] = "No pending account found with this email address";
    }
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    $errors[] = "An error occurred. Please try again later.";
}

// If there are errors, redirect back with error messages
if (!empty($errors)) {
    $_SESSION['error_message'] = implode("<br>", $errors);
    header('Location: activation.php');
    exit();
}

// Generate new activation code
$new_activation_code = bin2hex(random_bytes(16));

try {
    // Update activation code
    $stmt = $pdo->prepare("UPDATE users SET activation_code = ? WHERE email = ?");
    $stmt->execute([$new_activation_code, $email]);

    // Prepare email content
    $email_subject = "Your New " . SITE_NAME . " Activation Code";
    $email_message = "
    <html>
    <head>
        <title>New Activation Code</title>
    </head>
    <body>
        <h2>New Activation Code</h2>
        <p>You requested a new activation code. Please use the following code to activate your account:</p>
        <p style='font-size: 24px; font-weight: bold; color: #4F46E5; padding: 10px; background-color: #EEF2FF; border-radius: 5px;'>" . $new_activation_code . "</p>
        <p>Please click the link below to enter your activation code:</p>
        <p><a href='" . SITE_URL . "/activation.php' style='background-color: #4F46E5; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Activate Account</a></p>
        <p>If you did not request this code, please ignore this email.</p>
        <br>
        <p>Best regards,<br>" . SITE_NAME . " Team</p>
    </body>
    </html>";

    // Send activation email
    if (!send_email_notification($email, $email_subject, $email_message)) {
        error_log("Failed to send new activation email to: " . $email);
        throw new Exception("Failed to send activation email");
    }

    // Set success message and redirect
    $_SESSION['flash_message'] = "A new activation code has been sent to your email address.";
    header('Location: activation.php');
    exit();

} catch (Exception $e) {
    error_log("Error resending activation code: " . $e->getMessage());
    $_SESSION['error_message'] = "An error occurred while resending the activation code. Please try again later.";
    header('Location: activation.php');
    exit();
}