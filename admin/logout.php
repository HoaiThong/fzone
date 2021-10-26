<?php

session_start();

include './includes/session-destroy.php';
header('Location: login.php');
?>