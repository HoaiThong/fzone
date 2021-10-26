<?php

//include '../admin/includes/session-check.php';
session_start();
include './CartDAO.php';
include './functions.php';
$funcs = new Functions();
$_idProduct = $_POST['idProduct'];
$_idStaff = $_POST['idStaff'];
$_idStore = $_POST['idStore'];
$_quantity = $_POST['quantity'];
$_idCart = $funcs->create_id_cart($_idStaff, $_idProduct);
$_finalPrice = $_POST['finalPrice'];
$_note = $_POST['note'];
$cartDAO = new CartDAO();
$response = $cartDAO->add_cart($_idCart, $_idStore, $_idProduct, $_idStaff, $_quantity, $_finalPrice, $_note);
echo $response;
?>
