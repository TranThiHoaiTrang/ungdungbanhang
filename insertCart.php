<?php 
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});
$idProduct = $_GET['id'];
$productModel = new ProductModel();
$item = $productModel->getProductById($idProduct);
$product = $productModel->getProducts();
$new = array();

session_start();

$qty = isset($_POST['quantity']) ? $_POST['quantity'] : null;
echo $qty;

foreach ($product as $val) {
    $new[$val['id']] = $val;
}



if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
    $new[$idProduct]['quantity'] = $qty;
    $_SESSION['cart'][$idProduct] = $new[$idProduct];
} else {
    if (array_key_exists($idProduct, $_SESSION['cart'])) {
        $_SESSION['cart'][$idProduct]['quantity'] += $qty;
    } else {
        $new[$idProduct]['quantity'] = $qty;
        $_SESSION['cart'][$idProduct] = $new[$idProduct];
    }
}
 header("location:cart.php");