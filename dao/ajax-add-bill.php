<?php

//include '../admin/includes/session-check.php';
session_start();
include './BillDAO.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
//    $arrayCart_json = $_POST['arrayCart'];
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
    $billDAO = new BillDAO();
    $response = $billDAO->add_bill($_idStore, $_idStaff, $_idExpress, $_linkExpress, $_ecommerceLevel, $_buyerName, $_buyerPhone, $_buyerAddress, $_buyerEmail, $_note, $_orderStatus);

//    
//    $arrayCart = json_decode($arrayCart_json,true);
//    
//  

    echo $response;
}
?>
