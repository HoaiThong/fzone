<?php
include '../admin/includes/session-check.php';
include './StoreDAO.php';

if (isset($_POST['create_btn'])) {
    $_idUser = $_SESSION['idUser'];
    $_nameStore = $_POST['store_name'];
    $_phone = $_POST['store_phone'];
    $_email = $_POST['store_email'];
    $_address = $_POST['store_addr'];
    $_optionCategory = $_POST['store_option_category'];
    $_description = $_POST['store_description'];
    $role=1;
    $storeDAO=new StoreDAO();
    $response=$storeDAO->create_store($_idUser, $_nameStore, $_phone, $_email, $_address, $_optionCategory, $_description, $role);
    header("Location: ../admin/admin.php");
}
?>
