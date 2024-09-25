<?php include '../includes/header.php'; ?>
<?php include '../includes/db.php'; ?>

<?php
$conn = getDbConnection();
$id = $_GET['id'];

// Fetch the transaction details
$sql = "SELECT * FROM transactions WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Fetch categories for the dropdown
$categoriesResult = $conn->query("SELECT * FROM categories");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $category_id = $_POST['category_id']; // Updated to use category_id
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Update the transaction in the database
    $stmt = $conn->prepare("UPDATE transactions SET amount = ?, category_id = ?, date = ?, description = ? WHERE id = ?"); // Updated to use category_id
    $stmt->bind_param("dissi", $amount, $category_id, $date, $description, $id); // Updated binding parameters

    if ($stmt->execute()) {
        echo "Transaction updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
?>

<link rel="stylesheet" href="../assets/css/style.css">
<form method="post" action="">
    <label for="amount">Amount:</label>
    <input type="number" name="amount" value="<?php echo $row['amount']; ?>" required>

    <label for="category">Category:</label>
    <select name="category_id" required>
        <?php while ($categoryRow = $categoriesResult->fetch_assoc()) { ?>
            <option value="<?php echo $categoryRow['id']; ?>" <?php echo ($categoryRow['id'] == $row['category_id']) ? 'selected' : ''; ?>>
                <?php echo $categoryRow['name']; ?>
            </option>
        <?php } ?>
    </select>

    <label for="date">Date:</label>
    <input type="date" name="date" value="<?php echo $row['date']; ?>" required>

    <label for="description">Description:</label>
    <input type="text" name="description" value="<?php echo $row['description']; ?>" required>

    <input type="submit" value="Update Transaction">
</form>

<?php include '../includes/footer.php'; ?>
