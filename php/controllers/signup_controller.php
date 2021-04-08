<?php
    session_start();
    include "../models/user.php"; //to make sure we can construct a new user
    //default variables
        $name = "";
        $email= "";
        $city = "";
        $password = "";
    //check if the submit button was clicked  
    //print_r($_POST);  
    if(isset($_POST)){
        if(empty($_POST['fullname']||$_POST['city']&&$_POST['email']||$_POST['password'])){
            $bottom_error="please fill in the form";
            include "../views/signup.php";
        }
        if(empty($_POST['fullname']||$_POST['city'])){
            $middle_error = "fill both fullname and city";
            include "../views/signup.php";
        }else if(empty($_POST['email']||$_POST['password'])){
            $bottom_error="fill both email and password";
            include "../views/signup.php";
        }else{
        //set the variables to be the same as the user input 
            $name=$_POST['fullname'];
            $email=$_POST['email'];;
            $city=$_POST['city'];
            $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
        //create a user to pass the variables in using oop
            include_once "../models/pdo.php";
            $person = new User($name,$email,$city,$password);
            $person->register($pdo);
        }
    }else if(!isset($_POST['sub-submit'])){
        $sign_error = "submission error"."<br>";
        include "../views/signup.php";
    }
        //print_r($person->check());

    



    // try{
    //     $connected = new PDO("mysql:host = localhost;dbname = mega","root","");
        
    // }catch(PDOException $ex){
    //     echo $ex->getMessage();
    // }

    // if(isset($_POST['email'])){
    //     $fullName=$_POST["fullname"];
    //     $city=$_POST["city"];
    //     $email=$_POST["email"];
    //     $password=$_POST["password"];
    
    //     $sql=$connected->prepare("INSERT INTO `users`(`fullname`, `email`, `city`, `password`) VALUES (?,?,?,?)");
    //         $sql->execute([$fullName],[$city],[$email],[$password]);
    //         echo "success";
    // }elseif(!isset($_POST['signup'])){
    //     echo"oh no";
    // }
    
    // if ($connected){
    //     echo "connected successfully";
    // }else{
    //     echo"oh no";
    // }
   
    //  $host = "localhost";
    //  $user="root";
    //  $password="";
    //  $dbName="mega";
        
    // $connected = new PDO( "mysql:host=$host; $dbName", $user,$password);
    // // $connected->parent::connect();
    // try{
    //     if ($connected){
    //         echo"successfully connected to database";
    //     }else{
    //         echo"oh no";
    //     }
    // }catch(Exception $ex ){
    // echo $ex->getMessage();
    // }