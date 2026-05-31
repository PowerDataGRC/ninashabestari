<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}

// Config lives one level above public_html so it is never web-accessible
$configPath = dirname(__DIR__) . '/private/config.php';
if (!file_exists($configPath)) {
    http_response_code(500);
    exit('Server configuration error');
}
require $configPath;

// Cloudflare Turnstile verification
$turnstileToken = $_POST['cf-turnstile-response'] ?? '';
if (!$turnstileToken) {
    header('Location: /contact/?status=bot');
    exit;
}

$verifyResponse = file_get_contents(
    'https://challenges.cloudflare.com/turnstile/v0/siteverify',
    false,
    stream_context_create(['http' => [
        'method'  => 'POST',
        'content' => http_build_query([
            'secret'   => TURNSTILE_SECRET,
            'response' => $turnstileToken,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
        ]),
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
    ]])
);

$turnstileResult = json_decode($verifyResponse, true);
if (empty($turnstileResult['success'])) {
    header('Location: /contact/?status=bot');
    exit;
}

// Sanitize inputs
$name    = htmlspecialchars(trim($_POST['name'] ?? ''));
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars(trim($_POST['message'] ?? ''));

if (!$name || !$email || !$message) {
    header('Location: /contact/?status=error');
    exit;
}

// PHPMailer — vendor/ installed on Hostinger via: composer require phpmailer/phpmailer
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.hostinger.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom(SMTP_USER, 'Nina Shabestari Portfolio');
    $mail->addAddress(SMTP_USER);
    $mail->addReplyTo($email, $name);
    $mail->Subject = "Portfolio contact from $name";
    $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    $mail->send();
    header('Location: /contact/?status=sent');
} catch (Exception $e) {
    header('Location: /contact/?status=error');
}
