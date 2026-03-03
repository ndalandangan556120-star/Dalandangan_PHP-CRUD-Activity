<?php
require 'db.php';
require 'functions.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = $_POST['item'];
    $price = round($_POST['price'], 2);
    $qty = $_POST['qty'];

    validateNumber($price);
    validateNumber($qty);

    $total = computeTotal($price, $qty);

    $sql = "UPDATE transactions 
            SET item=:item, price=:price, qty=:qty, total=:total
            WHERE id=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':qty' => $qty,
        ':total' => $total,
        ':id' => $id
    ]);

    redirect("read.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Transaction</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Update Transaction</h2>

    <form method="post">
        Item:
        <input type="text" name="item" value="<?= $data['item'] ?>" required>

        Price:
        <input type="number" step="0.01" name="price" value="<?= sprintf('%.2f', $data['price']) ?>" required>

        Quantity:
        <input type="number" name="qty" value="<?= $data['qty'] ?>" required>

        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>