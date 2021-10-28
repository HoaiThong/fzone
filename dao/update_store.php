<?php
//include '../admin/includes/session-check.php';
session_start();
include './StoreDAO.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_idStore = $_POST['store_id'];
    $_nameStore = $_POST['store_name'];
    $_phone = $_POST['store_phone'];
    $_email = $_POST['store_email'];
    $_address = $_POST['store_addr'];
    $_optionCategory = $_POST['store_option_category'];
    $_description = $_POST['store_description'];

    $_SESSION['category'] = $_optionCategory;
    $storeDAO = new StoreDAO();
    $response = $storeDAO->update_store($_idStore, $_nameStore, $_phone, $_email, $_address, $_optionCategory, $_description);
    echo $response;
}
?>
