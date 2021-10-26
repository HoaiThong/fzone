<?php
//include '../admin/includes/session-check.php';
session_start();
include './BillDAO.php';
$_idBill = $_POST['idBill']; 
$billDAO=new BillDAO();
$detailsBill = $billDAO->get_details_order($_idBill);
echo json_encode($detailsBill);
?>
