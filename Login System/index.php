<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con); //checks whether the user has already signed in during the current session
?>

<!doctype html>
<html>
<link rel="stylesheet" href="styles.css">
<head>
    <title>Login project</title>
</head>
<body>
    <h1>Hello, <?php echo $user_data['user_name']; ?>! You are logged in.</h1>

    <a href="logout.php">Click here to log out</a> <br>   
</body>
</html>