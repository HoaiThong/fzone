<?php

include '../includes/session-check.php';
include './BillDAO.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_idStore = $_POST['idStore'];
    $_idStaff = $_POST['idStaff'];
    $_idExpress = $_POST['idExpress'];
    $_linkExpress = $_POST['linkExpress'];
    $_ecommerceLevel = $_POST['ecommerceLevel'];
    $_buyerName = $_POST['buyerName'];
    $_buyerPhone = $_POST['buyerPhone'];
    $_buyerAddress = $_POST['buyerAddress'];
    $_buyerEmail = $_POST['buyerEmail'];
    $_note = $_POST['note'];
    $_orderStatus = $_POST['orderStatus'];
    $_idProduct = $_POST['idProduct'];
    $_quantity = $_POST['quantity'];
    $_finalPrice = $_POST['finalPrice'];
    $billDAO = new BillDAO();
    $response=$billDAO->add_bill_buy_now($_idStore, $_idStaff, $_idExpress, $_linkExpress, $_ecommerceLevel, $_buyerName, $_buyerPhone, $_buyerAddress, $_buyerEmail, $_note, $_orderStatus, $_idProduct, $_quantity, $_finalPrice);
    echo $response;
}
?>
