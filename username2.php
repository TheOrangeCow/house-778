<?php
session_start();


// If form submitted, update the session username
if (isset($_POST["new_username"])) {
    $newName = trim($_POST["new_username"]);
    if ($newName !== "") {
        $_SESSION['username'] = $newName;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Username</title>
</head>
<body>

<h2>Current Username: <?php echo htmlspecialchars($_SESSION["username"]); ?></h2>

<form method="POST">
    <label>New Username:</label><br>
    <input type="text" name="new_username" required>
    <button type="submit">Update</button>
</form>

</body>
</html>
