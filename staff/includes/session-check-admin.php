<?php

session_start();
if ($_SESSION['status_login'] === true) {
//    if ($_SESSION['role'] != 1) {
//        include './session-destroy.php';
//        header('Location: login.php');
//
//    }
} else {
    include './session-destroy.php';
    header('Location: login.php');
}
?>