<?php
require 'db.php';
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = $_POST['item'];
    $price = round($_POST['price'], 2);
    $qty = $_POST['qty'];

    validateNumber($price);
    validateNumber($qty);

    $total = computeTotal($price, $qty);

    $sql = "INSERT INTO transactions (item, price, qty, total)
            VALUES (:item, :price, :qty, :total)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':qty' => $qty,
        ':total' => $total
    ]);

    redirect("read.php");
}
?>