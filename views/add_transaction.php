<?php include '../includes/header.php'; ?>
<?php include '../includes/db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $category_id = $_POST['category_id']; // Updated to use category_id
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Input validation
    if (empty($amount) || empty($category_id) || empty($date) || !is_numeric($amount)) {
        echo "Please provide valid inputs.";
    } else {
        // Insert transaction
        $conn = getDbConnection();
        $stmt = $conn->prepare("INSERT INTO transactions (amount, category_id, date, description) VALUES (?, ?, ?, ?)"); // Removed type
        $stmt->bind_param("diss", $amount, $category_id, $date, $description); // Updated to match the new parameters

        if ($stmt->execute()) {
            echo "Transaction added successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<link rel="stylesheet" href="../assets/css/style.css">

<?php
// Fetch categories from the database
$conn = getDbConnection(); // Added to ensure connection
$categoriesResult = $conn->query("SELECT * FROM categories");
?>

<form action="add_transaction.php" method="POST">
    <label for="amount">Amount:</label>
    <input type="number" name="amount" required>

    <label for="category">Category:</label>
    <select name="category_id" required>
        <?php while ($row = $categoriesResult->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>">
                <?php echo $row['name']; ?>
            </option>
        <?php } ?>
    </select>

    <label for="date">Date:</label>
    <input type="date" name="date" required>

    <label for="description">Description:</label>
    <input type="text" name="description" required>

    <button type="submit">Add Transaction</button>
</form>

<?php include '../includes/footer.php'; ?>
