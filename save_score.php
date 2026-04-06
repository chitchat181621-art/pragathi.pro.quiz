<?php
session_start();
$conn = new mysqli("localhost", "root", "", "quiz_db");

if (isset($_SESSION['user_id']) && isset($_POST['final_score'])) {
    $id = $_SESSION['user_id'];
    $score = intval($_POST['final_score']);

    // Update the record created at login with the actual score
    $sql = "UPDATE quiz_results SET score = $score, status = 'Completed' WHERE id = $id";
    
    if ($conn->query($sql)) {
        echo "Score saved successfully!";
    }
}
?>