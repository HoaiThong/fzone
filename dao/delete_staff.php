<?php

include '../admin/includes/session-check.php';
include './StaffDAO.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['delete_btn'])) {

        $_idStore = $_POST['store_id'];
        $_idStaff = $_POST['staff_id'];
        $staffDAO = new StaffDAO();
        $response = $staffDAO->remove_staff($_idStaff, $_idStore);
        header("Location: ../admin/admin_staffs.php");
    }
}
?>
