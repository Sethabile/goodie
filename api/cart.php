<?php
header('Content-type: application/json');
include('db.php');

function get () {
    include('db.php');
    $products = $db->query("SELECT cart.id, products.image, products.name, products.price FROM cart INNER JOIN products ON cart.product_id=products.id");
    echo json_encode($products->fetch_all(MYSQLI_ASSOC));
}

// Get JSON as a string
$json_str = file_get_contents('php://input');
// Get as an object
$json_obj = json_decode($json_str);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    get();
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    try {

        $product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : $json_obj->product_id;

        if ($product_id) {
            $result = $db->query("INSERT INTO cart (product_id) VALUES ('" . $product_id . "');");
            get();
        } else {
            throw new Exception("Error Processing Request");
        }
    } catch (Exception $e) {
        throw $e;
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    try {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : $json_obj->id;
        if ($id) {
            $result = $db->query("DELETE FROM cart WHERE id = '" . $id . "';");
            get();
        } else {
            throw new Exception("Error Processing Request");
        }
    } catch (Exception $e) {
        throw $e;
    }
}

$db->close();
