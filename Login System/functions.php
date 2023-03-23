<?php

function check_login($con) //checks whether the user has already logged in during the current session, and redirects to the login page if it hasn't
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
         else
        {
            header("location: login.php");
            die;
        }
    }
}

function random_num($lenght) //creates an integer with a random lenght between 5 and the set parameter in the function. Used to generate user IDs
{
    $text = "";
    if($lenght < 5)
    {
        $lenght = 5;
    }
    $len = rand(4,$lenght);
    for ($i=0; $i < $len; $i++)
    {
        $text .= rand(0,9);
    }
    return $text;
}

function redirect($location) //used for troubleshooting. Turned out the header function wasn't at fault, but left it in because I like the sintax better.
{
    header("location: $location");
    die;
}