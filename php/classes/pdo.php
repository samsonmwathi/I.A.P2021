<?php 
    
    Class pop{
       
       
       public function __construct(){
            define('dsn',"mysql:host=localhost;dbname=mega");
            define('user','root');
            define ('password','');
            $options = [PDO ::ATTR_EMULATE_PREPARES => false,PDO::FETCH_ASSOC,PDO::ATTR_PERSISTENT=>true];
            //$pdo = new PDO("mysql:host=localhost;dbname=mega",'root',"",$options);        
            try{
                $pdo = new PDO(dsn,user,password,$options);
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                echo " 1st pdo connected successfully";
            }catch(PDOException $ex){
                echo $ex->getMessage();
            } 
            return $pdo;
        }
        public function prepare($statement){
            $this->prepare($statement);
        }
       
        
        
    }
   
    
    
    
        
       