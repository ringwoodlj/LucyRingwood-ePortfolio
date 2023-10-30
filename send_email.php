<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        
        // Email recipient address
        $recipient = "lucy.j.ringwood@gmail.com";
        
        // Email subject
        $subject = "New message from " . $_POST['name'];

        // Email headers
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=utf-8\r\n";
        $headers .= "From: " . $_POST['email'] . "\r\n";

        // Email content
        $content = "Name: " . $_POST['name'] . "\n";
        $content .= "Email: " . $_POST['email'] . "\n";
        $content .= "Message:\n" . $_POST['message'] . "\n";

        // Send the email
        if (mail($recipient, $subject, $content, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send the message.";
        }
    } else {
        echo "Please fill all the fields.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>
