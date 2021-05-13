<?php
session_start();

$_SESSION['cart'];
if (isset($_POST['update'])) {
    foreach ($_POST['quantity'] as $key => $value) {
        $_SESSION['cart'][$key]['quantity'] = $value;
        var_dump($value);
    }
}
//header("location:cart.php");
