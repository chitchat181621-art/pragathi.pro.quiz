<?php
$conn = new mysqli("localhost", "root", "", "your_database_name");
$result = $conn->query("SELECT * FROM quiz_results ORDER BY score DESC");

echo "<h2>Quiz Participation List</h2>";
echo "<table border='1'>
<tr>
    <th>Name</th>
    <th>Score</th>
    <th>Time Joined</th>
    <th>Status</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['full_name']}</td>
        <td>{$row['score']}</td>
        <td>{$row['created_at']}</td>
        <td>{$row['status']}</td>
    </tr>";
}
echo "</table>";
?>