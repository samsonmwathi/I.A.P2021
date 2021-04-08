<?php
    include "pdo.php";
    include "account.php";

    class User implements Account{
    private $fullname;
    private $email;
    private $city;
    private $password;

    
    public function __construct(){
            $num=3;
            $a = func_get_args();
            $i = func_num_args();
            if(method_exists($this,$f='  __construct'.$i)){
                call_user_func_array(array($this,$f),$a);
            }
        
    }
    
    public function __construct2($email,$password){
        $this->email=$email;
        $this->password=$password;
    }

    public function __construct4($fullname,$email,$city,$password)
    {
        $this->fullname=$fullname;
        $this->email=$email;
        $this->city=$city;
        $this->password=$password;
        
    }

    public static function makeUser($login,$password){
        $obj= new User();

    }
    public function check()
    {
        echo $this->fullname."<br>";
        echo $this->email."<br>";
        echo $this->city."<br>";
        echo $this->password."<br>";
        
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
            //verify pdo
            if($pdo){
                //to prevent duplicate emails
                try{
                    $check = $pdo->prepare("SELECT * FROM users WHERE email = ?"); 
                    $check->execute([$this->email]);
                }catch(PDOException $e){
                    echo"Error checking email".$e->getMessage;
                }
                try{
                    $names = $check->rowCount();
                    if($names>=1){
                        //to stop re-signups
                        $sign_error = "Existing Account";
                        include "../views/signup.php";

                    }else{
                        try{
                        $stmt= $pdo->prepare ("INSERT INTO users(fullname,email,city,password) values (?,?,?,?)");
                        $stmt->execute ([$this->fullname,$this->email,$this->city,$this->password]);
                        }catch(PDOExecption $e){
                            
                            $sign_error = "Error signing you up <br> please try again";
                            echo $sign_error.$e->getMessage();
                            include "../views/signup.php";
                        }
                        try{

                            $check->execute([$this->email]);
                            if($names>1){
                                echo "double entry detected";
                            }else if($names<=0){
                                echo "no entry made";
                            }else{
                                $sign_success= "signed up successfully";
                                include "../views/signup.php";
                                $_SESSION['name'] = $this->fullname;
                                include("../views/index.php");
                            }
                        }catch(PDOException $e){
                            echo"error authenticating signup".$e->getMessage();
                        }
                    }
                }catch(PDOException $e){
                   echo $e->getMessage();
                    $error = "signup error";
                    include "../views/signup.php";
                }

                // try{
                // $names= $stmt->fetchAll();
                // foreach($names as $name=>$jina){
                //     echo $names['email'].'-------'.$names['password'].'<br>';
                // }
                // }catch(PDOException $ex){
                //     echo"Error printing names in the USER!".$e->getMessage();
                // }
                
            }else{
                echo "Account pdo is not set";
            }
        
    }
   public function login($pdo){
    //to makes sure pdo isset
    if($pdo){
        //handles pdo request
        try{
            $stmt= $pdo->prepare("SELECT * FROM users WHERE email = ? and password = ?");
            $stmt->execute([$this->email,$this->password]);
        }catch(PDOException $e){
            $error ="Error logging you in <br>".$e->getMessage();
            include "../views/login.php";
        }
        //to handle query execution
        try{
            
            $names = $stmt->fetchcolumn();
        }catch(PDOException $e){
            $error = "ERROR in executing login <br>".$e->getMessage();
            include "../views/login.php";
        }
        //to count names in the results
        print_r($names);
        //to prevent multiple users with the same email
        if($names==1){
            $_SESSION['name'] = $_POST["email"];
            header("location:../views/index.php");
        }else{
            $error = 'invalid login <br>try again';
            include "../views/login.php";
        }

        //foreach($names as $name['email']=>$this->email){
          //  print_r ($names['3']);
            // echo'-------';
            // print_r(['password']);
            // echo'<br>';
    }else{
        $error = "Login PDO not set";
        include "../views.login.php";
        
    }
        // if ($name != $this->fullname || $code != $this->password){
        //     $login_error="true";
        // }elseif ($name == $this->fullname && $code == $this->password){
        //     header:location:"../pages/index.php";
        // }
    }

    public function checkUser($pdo){
        try{
            $check = $pdo->prepare("SELECT * FROM users WHERE email = ?"); 
            $check->execute([$this->email]);
            }catch(PDOExecption $e){
                $sign_error = "Error searching <br> please try again";
                echo $sign_error.$e->getMessage();
                include "../views/fpassword.php";
            }
            try{
                $names = $check->rowCount();
                if($names==1){
                    echo "email found";
                    header(location:"../views/epassword.php");
                }else if($names==0){
                    $f_Error = "That email does not exist";
                    include "../views/fpassword.php";
                }
            }catch(PDOException $e){
                echo"error authenticating search".$e->getMessage();
            }
    }
    public function changePassword($pdo){try{
            $sql= "SELECT * FROM users WHERE email = ?";
            $search= $pdo->prepare($sql);
            $search->execute($this->email);
        }catch(PDOException $e){
            echo "Error in search pdo:".$e->getMessage();
        }
        //check of the email exists
        try{
            $names = $search->rowCount();
            if($names==0){
                $change_err="this email is not recognized";
                include "../views/fpassword.php";
            }elseif($names==1){
                try{
                    $update="UPDATE users SET password=? where email=?";
                    $update->execute($this->password,$this->email);
                }catch(PDOException $ex){
                    echo"error changing password".$ex->getMessage();
                }
            }
        }catch(PDOException $ex){
            $f_Error = "There was a search issue";
            echo $f_Error.$ex->getMessage();
        }
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
