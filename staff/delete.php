<?php
include("../config/db.php");

$id = $_GET["id"] ?? null;
if (!$id) { die("Missing ID"); }

$stmt = $conn->prepare("DELETE FROM staff WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: list.php");
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}
