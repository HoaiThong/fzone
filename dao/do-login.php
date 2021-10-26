<?php

session_start();
include('./UserDAO.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $phoneNumber = $_POST['username'];
    $password = $_POST['password'];
    $userDAO = new UserDAO();
    $response = $userDAO->signin_by_phone($phoneNumber, $password);
    if (!empty($response)) {
//Lưu tên đăng nhập
        $_SESSION['phone'] = $phoneNumber;
        $_SESSION['userName'] = $response[0]['userName'];
        $_SESSION['idUser'] = $response[0]['idUser'];
        $_SESSION['status_login'] = true;
        if ($_POST["checked"] == 'true') {
            setcookie("member_login", $phoneNumber, time() + (10 * 365 * 24 * 60 * 60));
        }
        if ($_POST["checked"] == 'false') {
            if (isset($_COOKIE["member_login"])) {
                setcookie("member_login", "");
            }
        }
        echo 'true';
    } else {
//        echo "Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        echo "false";
    }
}
?>
