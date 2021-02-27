<?php
    include "pdo.php";
    include "account.php";

    class User implements Account{
    private $fullname;
    private $email;
    private $city;
    private $password;

    public function __construct($fullname,$email,$city,$password)
    {
        $this->$fullname=$fullname;
        $this->email=$email;
        $this->city=$city;
        $this->password=$password;
        
    }
    public function check()
    {
        echo $this->fullname;
        echo $this->email;
        echo $this->city;
        echo $this->password;
        
    }
    public function setFullname($name){
        $this->fullname=$name;
    }
    public function getFullname(){
        $name = $this->fullname;
        echo $name; 
        return $this->fullname;

    }

    public function setEmail($mail){
        $this->email=$mail;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setCity($city){
        $this->city=$city;
    }
    public function getCity(){
        return $this->city;
    }

    public function setPassword($code){
        $this->password=$code;
    }
    public function getPassword(){
        return $this->password;
    }

    public function register($pdo)
    {
        try{
            if($pdo){
                
                $stmt= $pdo->prepare("INSERT INTO users(fullname,email,city,password) values(?,?,?,?)",array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stmt->execute([$this->fullname,$this->email,$this->city,$this->password]);
                $names= $stmt->fetchAll();
                foreach($names as $name){
                    echo $names['email'].'-------'.$names['password'].'<br>';
                }
                echo"<br> Successfully done";
            }else{
                echo "Account pdo is not set";
            }
        }catch(PDOException $e){
            echo "Error!".$e->getMessage();
        }
    }
   public function login($pdo){

        $sql= "SELECT * FROM Users WHERE email = ? AND password = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$this->email,$this->password]);
        $names= $stmt->fetchAll();

        foreach($names as $name){
            echo $names['email'].'-------'.$names['password'].'<br>';
        }
        
        // if ($name != $this->fullname || $code != $this->password){
        //     $login_error="true";
        // }elseif ($name == $this->fullname && $code == $this->password){
        //     header:location:"../pages/index.php";
        // }
    }
    public function changePassword($pdo){
        $this->setPassword($pdo);

    }

    public function logout($pdo){
        header:location:"../pages/login.php";
        $_SESSION=null;
    }
     // function register($pdo)
    // {
    //     $sql= "SELECT* FROM Users";
    //     $stmt= $this->connect()->query($sql);
    //     while($row=$stmt->fetch()){
    //         echo $row['fullname'].'<br>';
    //     }
    // }
}
