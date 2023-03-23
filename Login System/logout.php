<?php
session_start();
include("functions.php");

if(isset ($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}
redirect('login.php');
die;
