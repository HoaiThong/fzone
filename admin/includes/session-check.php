<?php

session_start();
if ($_SESSION['status_login'] != true) {
    header('Location: http://127.0.0.1/gstore/admin/login.php');
}
?>