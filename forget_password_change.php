<?php
$email = $_GET['email'];
// Retrieve account details given email
include "dbconnect.php";
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$num_results = $result->num_rows;
for ($index = 0; $index < $num_results; $index++) {
    $row = $result->fetch_assoc();
    echo "Hi, " . $row['name'];

}


$result->free();
$db->close();
?>