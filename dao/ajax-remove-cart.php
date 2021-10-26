<?php

//include '../admin/includes/session-check.php';
session_start();
include './CartDAO.php';
$_idCart = $_POST['idCart'];
$_idProduct = $_POST['idProduct'];
$_quantity = $_POST['quantity'];
$cartDAO = new CartDAO();
$response = $cartDAO->remove_cart($_idCart, $_idProduct, $_quantity);
echo $response;
?>
