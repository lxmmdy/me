<?php
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $comment = htmlspecialchars($_POST['comment']);
    $contact = isset($_POST['contact']) ? 'Yes' : 'No';

    // Insert data into the database
    $sql = "INSERT INTO guestbook (name, email, comment, contact) 
            VALUES ('$name', '$email', '$comment', '$contact')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Thank you! Your response has been recorded.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
    }
}
?>
