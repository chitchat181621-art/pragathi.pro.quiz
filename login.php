<?php
session_start();
// Use the name from your photo: quiz_db
$conn = new mysqli("localhost", "root", "", "quiz_db");

if ($conn->connect_error) { die("Connection failed"); }

if (isset($_POST['full_name'])) {
    $name = $conn->real_escape_string($_POST['full_name']);
    
    // Create the row with the name. Score and Status will be added later.
    $sql = "INSERT INTO quiz_results (full_name, score, status) VALUES ('$name', 0, 'In Progress')";
    
    if ($conn->query($sql)) {
        // This is CRITICAL: Save the ID so save_score.php knows which row to update!
        $_SESSION['user_id'] = $conn->insert_id;
        echo "Success";
    }
}
$conn->close();
?>