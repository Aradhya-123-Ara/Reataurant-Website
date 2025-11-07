<?php
// Define variables and set to empty values
$name = $email = $message = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Email settings
    $to = "your-email@example.com"; // <-- replace with your email
    $subject = "New message from your restaurant website";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $success = "Thank you! Your message has been sent.";
        $name = $email = $message = ""; // Clear form
    } else {
        $success = "Sorry, something went wrong. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">My Restaurant</div>
        <nav>
            <a href="index.html">Home</a>
            <a href="menu.html">Menu</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <section class="contact-form">
        <h2>Contact Us</h2>
        <?php if ($success) echo "<p style='color: #f39c12;'>$success</p>"; ?>
        <form method="POST" action="contact.php">
            <input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>" required>
            <input type="email" name="email" placeholder="Your Email" value="<?php echo $email; ?>" required>
            <textarea name="message" placeholder="Your Message" rows="5" required><?php echo $message; ?></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>

    <footer>
        &copy; 2025 My Restaurant. All rights reserved.
    </footer>
</body>
</html>
