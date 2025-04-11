<?php
include 'config.php'; // তোমার ডাটাবেস কানেকশন

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE mamber SET status='$status' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php"); // কাজ শেষে আবার মেইন পেইজে পাঠিয়ে দিবে
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
