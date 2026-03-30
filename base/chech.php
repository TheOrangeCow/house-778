<?php
$cookieParams = session_get_cookie_params();
session_set_cookie_params([
    'lifetime' => $cookieParams["lifetime"],
    'path' => $cookieParams["path"],
    'domain' => '.theorangecow.org',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Lax'
]);
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: https://house-778.theorangecow.org/home.php");
    exit;
}
?>
