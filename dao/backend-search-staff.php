<?php

include '../admin/includes/session-check.php';
//session_start();
include './UserDAO.php';
if (isset($_POST['phone'])) {
    $_phone = $_POST['phone'];
    $userDAO = new UserDAO();
    $search = $userDAO->search_user_by_phone($_phone);
    echo json_encode($search);
}
?>
