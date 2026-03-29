<?php
if (stripos($_SESSION['username'], 'player') !== false || stripos($_SESSION['username'], 'guest') !== false) {
    http_response_code(418);
    echo "You must have a house account to use this feature";
    header("Location: https://error.house-778.org/418.php");
    exit;
}