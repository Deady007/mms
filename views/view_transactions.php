<?php include '../includes/header.php'; ?>
<?php include '../includes/db.php'; ?>

<?php
$conn = getDbConnection();
$sql = "SELECT t.*, c.name AS category_name, c.type FROM transactions t JOIN categories c ON t.category_id = c.id"; // Updated query

$result = $conn->query($sql);

if (!$result) {
    // Display an error message if the query fails
    echo "Error executing query: " . $conn->error;
    exit; // Stop execution
}
?>

<link rel="stylesheet" href="../assets/css/style.css">
<h2>All Transactions</h2>

<table>
    <tr>
        <th>Amount</th>
        <th>Category</th>
        <th>Date</th>
        <th>Description</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['amount']; ?></td>
        <td><?php echo $row['category_name']; ?></td> <!-- Updated to use category name -->
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td class="<?php echo $row['type'] == 'income' ? 'category-income' : 'category-expense'; ?>">
            <?php echo $row['type']; ?>
        </td>
        <td>
            <a href="edit_transaction.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete_transaction.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

<?php include '../includes/footer.php'; ?>
