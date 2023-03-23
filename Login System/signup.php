<?php
    session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name']; //takes the user inputs and stores them in a variable
        $password =  $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) 
        {
            $av = "select * from users where user_name = '$user_name' limit 1"; //until line 20 checks availability of the username in the database
            $result = mysqli_query($con, $av);

            if($result && mysqli_num_rows($result) > 0)  
            {
                echo "That username is already taken.";
            }
            else
            {
                $user_id = random_num(10); 
                $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
            
                mysqli_query($con, $query);

                redirect('login.php');
            }
        }
        else
        {
            echo "Please enter valid information";                
        }
    }
?>

<!doctype html>
<html>
<link rel="stylesheet" href="styles.css">
<head>
    <title>Sign up</title>
</head>
<body>
    <div id="box">
        <form method="post">

            <div style="font-size: 20px; margin: 10px;">Username</div>
            <input id="text" type="text" name="user_name"> <br>

            <div style="font-size: 20px; margin: 10px;">Password</div>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Sign Up"><br><br>
            
            Already have an account? <br>
            <a href="login.php">Log in</a>
        </form>
    </div>
</body>
</html>