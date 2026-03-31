<?php
if (stripos($_SESSION['username'], 'player') !== false || stripos($_SESSION['username'], 'guest') !== false) {
    http_response_code(418);
    echo "You must have a house account to use this feature";
    //header("Location: https://house-778.theorangecow.org/error/eror.php?code=418");
    exit;
}