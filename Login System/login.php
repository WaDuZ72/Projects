<?php
ob_start();
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password =  $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        $query = "select * from users where user_name = '$user_name' limit 1"; // until line 20 checks the database for matching usernames
         
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password'] === $password)
            {
                $_SESSION['user_id'] = $user_data['user_id'];
                redirect('index.php');
            }
            else
            {
                echo "Wrong username or password";                
            }   
        } 
        else
        {
            echo "Wrong username or password";                
        }
    }
    else
    {
        echo "Wrong username or password";                
    }
}
ob_end_flush(); //I don't remember what I tried to fix with it and I'm too scared to delete it.
?>

<!doctype html>
<html>
    <link rel="stylesheet" href="styles.css">
<head>
    <title>Login</title>
</head>
<body>
    <div id="box">
        <form method="post">

            <div style="font-size: 20px; margin: 10px;">Username</div>
            <input id="text" type="text" name="user_name"> <br>

            <div style="font-size: 20px; margin: 10px;">Password</div>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            Don't have an account? <br> 
            <a href="signup.php">Sign-up</a>
        </form>
    </div>
</body>
</html>