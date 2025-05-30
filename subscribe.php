<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save email to a file (or database)
        file_put_contents("subscribers.txt", $email . "\n", FILE_APPEND);

        // Send confirmation email
        $subject = "Subscription Confirmation";
        $message = "Thank you for subscribing!";
        $headers = "From: no-reply@yourwebsite.com\r\n"; // Change to your domain email

        if (mail($email, $subject, $message, $headers)) {
            echo "✅ Subscription successful! A confirmation email has been sent.";
        } else {
            echo "✅ Subscription successful, but email sending failed.";
        }
    } else {
        echo "❌ Invalid email address!";
    }
} else {
    echo "❌ Invalid request!";
}
?>
