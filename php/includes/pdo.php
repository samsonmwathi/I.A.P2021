<?php 
    $user="admin";
    $password="";
    try{
     $pdo= new $pdo('mysql:host=localhost;dbname=mega,$user,$password'); 
    }catch(PDOException $e){
     print "ERROR!: ".$e->getMessage()."<br>";
    }
    echo "connected succefully"
    
?>