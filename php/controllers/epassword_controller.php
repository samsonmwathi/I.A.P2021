<?php

include "../models/user.php";
session_start();
// starts the SESSION

//print_r($_POST);// remove slashes to check if form posted properly

if(isset($_POST))//prevents empty requests
{
    if(empty($_POST['email']||$_POST['pass']&&$_POST['c_pass']))
    {
        $f_Error="please enter an email";
        include "../views/epassword.php";
    }elseif($_POST['pass']!=$_POST['c_pass']){
        $f_Error="Confirm you email";
        include "../views/epassword.php";
    }else{
        //handling real requests
        $email = $_POST['email'];
        $password=$_POST['pass'];
        include "../models/pdo.php";
        
        //searching for the specific user email
        try{
            $user = new User($email,$password);
           
            //$user->checkUser($pdo);
        }catch(Exception $ex){
            echo $ex->getMessage;
        }
        print_r($user);
    }
       
}else{
    //handling empty requests
    $f_Error="Please fill in your email";
    include "../views/fpassword.php";
}

