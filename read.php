<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM transactions ORDER BY id DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Transaction List</h2>

    <a href="index.php">Add New</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>
        </tr>

        <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['item'] ?></td>
            <td><?= number_format($row['price'], 2) ?></td>
            <td><?= $row['qty'] ?></td>
            <td><?= number_format($row['total'], 2) ?></td>
            <td class="actions">
                <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" 
                   onclick="return confirm('Are you sure you want to delete this record?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>