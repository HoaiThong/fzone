<?php

include '../admin/includes/session-check.php';
include './StaffDAO.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['create_btn'])) {

        $_idStore = $_POST['store_id'];
        $_idUser = $_POST['user_id'];
        $_create_by_user_id = $_POST['create_by_user_id'];
        $_note = $_POST['staff_description'];
        $_role = $_POST['staff_role'];
        $staffDAO = new StaffDAO();
        $response = $staffDAO->add_staff($_idStore, $_idUser, $_create_by_user_id, $_note, $_role);
        header("Location: ../admin/admin_staffs.php");
    }
}
?>

