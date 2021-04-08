<?php
include "../models/user.php";
session_start();// strats the SESSION

//print_r($_POST);// remove slashes to check if form posted properly


if(isset($_POST))//prevents empty requests
{
    if(empty($_POST['email']))
    {
        $emailError="please enter an email";
        include "location:../views/login.php";
    }elseif(empty($_POST['password'])){
        $passError="please enter your password";
        include "../views/login.php";
    }else{
        //handling real requests
        $email = $_POST['email'];
        $password = $_POST['password']; 
        include_once "../models/pdo.php";
        
        //login process using user class
        $user = new User($email , $password);
        $user->login($pdo);
    }
       
}else{
    //handling empty requests
    $error="log in error <br> please try again";
    include "../views/login.php";
}

