<?php

unset($_SESSION['phone']);
unset($_SESSION['status_login']);
unset($_SESSION['category']);
session_unset();
session_destroy();
?>