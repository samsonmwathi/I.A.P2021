<?php

    include "user.php"; //to make sure we can construct a new user
    //default variables
        $name = "";
        $email= "";
        $city = "";
        $password = "";
    //check if the submit button was clicked  
    print_r($_POST);  
    if(isset($_POST['sub-submit'])){
        $name=$_POST['fullname'];
        $email=$_POST['email'];;
        $city=$_POST['city of residence'];
        $password=$_POST['password'];
        //create a user to pass the variables in using oop
        $person = new User($name,$email,$city,$password);
        echo "initialized";
    }else if(!isset($_POST['sub-submit'])){
        echo "submission error";
        exit();
    }
    
    //set the variables to be the same as the user input 
    $person->setFullname($name);
    $person->getFullname();
    $person->setEmail($email);
    $person->setCity($city);
    $person->setPassword($password);
    print_r($person->check());
    //PDO constants becasue they donot change
    define('dsn',"mysql:host=localhost;dbname=mega");
    define('user','root');
    define ('password','');
    $options = [PDO ::ATTR_EMULATE_PREPARES => false,PDO::FETCH_ASSOC,PDO::ATTR_PERSISTENT=>true,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
    //$pdo = new PDO("mysql:host=localhost;dbname=mega",'root',"",$options); 

    //our PDO 
    try{
        $pdo = new PDO(dsn,user,password,$options);
    //echo to check for the actual connection to the database
        echo " 1st pdo connected successfully";
    }catch(PDOException $ex){
        echo $ex->getMessage();
    } 
    try{
         $person->register($pdo);
     }catch(PDOException $ex){
         echo $ex->getMessage();
     }































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