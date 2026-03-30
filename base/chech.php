<?php
session_set_cookie_params(0, '/', 'house-778.org');
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: https://house-778.theorangecow.org/home.php");
    exit;
}
?>
