<!DOCTYPE html>
<html>
<head>
    <title>Add Transaction</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Add Transaction</h2>

    <form method="post" action="create.php">
        Item:
        <input type="text" name="item" required>

        Price:
        <input type="number" step="0.01" name="price" required>

        Quantity:
        <input type="number" name="qty" required>

        <button type="submit">Save</button>
    </form>

    <br>
    <a href="read.php">View Transactions</a>
</div>

</body>
</html>