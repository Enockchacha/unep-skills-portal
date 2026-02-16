<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "unep_skills_db"; // make sure this matches your DB name in phpMyAdmin

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>

