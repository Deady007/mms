<?php
include '../includes/db.php';

$conn = getDbConnection();
$id = $_GET['id'];

$sql = "DELETE FROM transactions WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Transaction deleted successfully!";
    header("Location: view_transactions.php");
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
