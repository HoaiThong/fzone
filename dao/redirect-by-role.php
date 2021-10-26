<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header('Location: login.php');
} else {
    include '../dao/ProductsDAO.php';
    include '../dao/StoreDAO.php';
    $_idUser = $_SESSION['idUser'];
    $_idStore = '';
    $_idStaff = '';
    if (isset($_POST['store_id'])) {
        $_idStore = $_POST['store_id'];
        $_idStaff = $_POST['staff_id'];
        $_SESSION['storeId'] = $_idStore;
        $_SESSION['staffId'] = $_idStaff;
    } else {
        if (isset($_SESSION['storeId'])) {
            $_idStore = $_SESSION['storeId'];
        }
    }
    $storeDAO = new StoreDAO();
    $store = $storeDAO->get_store_info_by_id_store($_idUser, $_idStore);
    $optionCategory = $store[0]['optionCategory'];
    $nameStore = $store[0]['nameStore'];
    $idStore = $store[0]['idStore'];
    $_SESSION['category'] = $optionCategory;
    $_SESSION['nameStore'] = $nameStore;
    $_SESSION['idStore'] = $idStore;
    $_SESSION['role'] = $store[0]['role'];
    $role = $_SESSION['role'];
//    switch ($role) {
//        case 1:
//            header('Location: ../admin/admin_store.php');
//            break;
//        case 0:
//            header('Location: ../staff/store.php');
//            break;
//        default :
//            include '../admin/includes/session-destroy.php';
//            header('Location: ../admin/login.php');
//    }
    echo $role;
}
?>
