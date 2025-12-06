<?php

// If honeypot is filled, it's a bot
if (!empty($_POST['website'])) {
    exit("Spam detected.");
}

$name    = strip_tags($_POST['name'] ?? '');
$email   = strip_tags($_POST['email'] ?? '');
$phone   = strip_tags($_POST['phone'] ?? '');
$service = strip_tags($_POST['service'] ?? '');

$to = "insuluxcontracting@gmail.com";
$subject = "New Quote Request from Insulux Website";

$message = "
Name: $name
Email: $email
Phone: $phone

Service Requested:
$service
";

$headers  = "From: Website Form <no-reply@yourdomain.com>\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "<h2 style='font-family:Arial;text-align:center;color:green;'>Message Sent Successfully</h2>";
    echo "<p style='text-align:center;'>Thank you, we will contact you shortly.</p>";
} else {
    echo "<h2 style='font-family:Arial;text-align:center;color:red;'>Error Sending Message</h2>";
}
?>
