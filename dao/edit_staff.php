<?php

include '../admin/includes/session-check.php';
include './StaffDAO.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['update_btn'])) {

        $_idStore = $_POST['store_id'];
        $_idStaff = $_POST['staff_id'];
        $_note = $_POST['staff_description'];
        $_role = $_POST['staff_role'];
        $staffDAO = new StaffDAO();
        $response = $staffDAO->update_staff($_role, $_note, $_idStore, $_idStaff);
        header("Location: ../admin/admin_staffs.php");
    }
}
?>

