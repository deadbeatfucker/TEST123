<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Send email notification
        $to = 'Mario.canizales@gmail.com';
        $subject = 'New subscription from website';
        $message = 'A new user has subscribed to your website with the following email address: ' . $email;
        $headers = 'From: website@example.com' . "\r\n" .
            'Reply-To: website@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            // Email sent successfully
            echo 'Thank you for subscribing! You will receive an email notification shortly.';
        } else {
            // Failed to send email
            echo 'An error occurred while trying to process your subscription. Please try again later.';
        }
    } else {
        // Invalid email address entered
        echo 'Please enter a valid email address.';
    }
}
?>
