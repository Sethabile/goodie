<?php
header('Content-type: application/json');
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = $db->query("SELECT * FROM products");
    echo json_encode($products->fetch_all(MYSQLI_ASSOC));
} else {
    throw new Exception('not found');
}

$db->close();
