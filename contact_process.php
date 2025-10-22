<?php
include "config.php"; // Database connection

// Get form data safely
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$message = trim($_POST['message']);

if ($name == "" || $email == "" || $message == "") {
    echo "<script>
        alert('⚠️ Please fill all required fields.');
        window.history.back();
    </script>";
    exit;
}

$stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    echo "<script>
        alert('✅ Your message has been sent successfully!');
        window.location.href = 'indext.php';
    </script>";
} else {
    echo "<script>
        alert('❌ Failed to send your message. Please try again.');
        window.history.back();
    </script>";
}

$stmt->close();
$conn->close();
?>
