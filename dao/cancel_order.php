<?php

include '../admin/includes/session-check-admin.php';
include '../dao/BillDAO.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $_idBill = $_POST['idBill'];
    $billDAO = new BillDAO();
    $response = $billDAO->cancel_order($_idBill);
    echo $response;
//    header("Location: ../admin/admin_orders.php");
//    echo "Hủy: ".$_idBill;
}
?>
