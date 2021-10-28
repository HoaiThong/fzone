<?php
session_start();
include('./UserDAO.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $phoneNumber = $_POST['username'];
    $password = $_POST['password'];
    $checked = $_POST["checked"];
    if ($checked == 'true') {
        setcookie("member_login", $phoneNumber, time() + (10 * 365 * 24 * 60 * 60),"/");
    }
    
    $userDAO = new UserDAO();
    $response = $userDAO->signin_by_phone($phoneNumber, $password);
    if (!empty($response)) {
        $_SESSION['phone'] = $phoneNumber;
        $_SESSION['userName'] = $response[0]['userName'];
        $_SESSION['idUser'] = $response[0]['idUser'];
        $_SESSION['status_login'] = true;
        echo 'true';
    } else {
        echo "false";
    }
}
?>
