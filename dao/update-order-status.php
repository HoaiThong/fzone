<?php

include '../admin/includes/session-check-admin.php';
include '../dao/BillDAO.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $_idBill = $_POST['idBill'];
    $_status = $_POST['status'];
    $billDAO = new BillDAO();
    $response = $billDAO->update_order_status($_idBill, $_status);
    echo $response;
//    header("Location: ../admin/admin_orders.php");
//    echo "Hủy: ".$_idBill;
}
?>
