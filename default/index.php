<?php 
include "../base/chech.php"; 
include "../base/main.php";
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Default</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://house-778.org/base/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
        <link rel="icon" href="https://house-778.org/base/icon.ico" type="image/x-icon">
    </head>
    <body>
        <canvas class="back" id="canvas"></canvas>
        <?php include '../base/sidebar.php'; ?>
        <div class="con">
            <button class="circle-btn" onclick="openNav()">☰</button> 
            <h1>Default page</h1>
        </div>
        
    <script src="https://theme.house-778.org/background.js"></script>
    <script src="https://house-778.org/base/main.js"></script>
    <script src="https://auth.house-778.org/account/track.js"></script>
    <script src="https://house-778.org/base/sidebar.js"></script>
    </body>
</html>
