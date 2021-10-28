<?php
//include '../admin/includes/session-check.php';
session_start();
include './BillDAO.php';
$_idStore = $_POST['idStore']; 
$_idStaff = $_POST['idStaff']; 
//$_idStore=1000;
//$_idStaff=1000;
$billDAO=new BillDAO();
$detailsBill = $billDAO->get_array_order_on_store_by_idStaff($_idStore, $_idStaff);
echo json_encode($detailsBill);
?>
