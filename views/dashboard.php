<?php include '../includes/header.php'; ?>
<?php include '../includes/db.php'; ?>
<link rel="stylesheet" href="../assets/css/style.css">
<h2>Dashboard</h2>

<p>Welcome to the Money Management System! Here's a summary of your finances.</p>

<?php
$conn = getDbConnection();

// Fetch total income and expenses using JOIN
$incomeResult = $conn->query("
    SELECT SUM(t.amount) AS total_income 
    FROM transactions t 
    JOIN categories c ON t.category_id = c.id 
    WHERE c.type = 'income'
");

$expenseResult = $conn->query("
    SELECT SUM(t.amount) AS total_expense 
    FROM transactions t 
    JOIN categories c ON t.category_id = c.id 
    WHERE c.type = 'expense'
");

// Fetch the results
$income = $incomeResult->fetch_assoc()['total_income'] ?? 0;
$expense = $expenseResult->fetch_assoc()['total_expense'] ?? 0;
$balance = $income - $expense;
?>

<ul>
    <li class="income">Total Income: <?php echo $income; ?></li>
    <li class="expense">Total Expense: <?php echo $expense; ?></li>
    <li>Balance: <?php echo $balance; ?></li>
</ul>

<?php include '../includes/footer.php'; ?>
