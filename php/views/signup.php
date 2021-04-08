<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/signup.css">
    <title>Signup</title>
</head>
<body>
    <header class ="header"></header>
    <div class="container">
        <form action="../controllers/signup_controller.php" method="POST" >
            <h1 class = "title">Signup</h1>
            <label for="fullname">fullname</label><br>
            <input name="fullname" id="fullname" type="text" placeholder="fullname">
            <br><br>
            <label for="city" >city of residence</label><br>
            <input name="city" id="city" type="text" placeholder="city">
            <br><br>
            <?php
                if(isset ($middle_error)){
                    echo '<label style="color:red;">'.$middle_error.'</label><br><br>';
                }elseif(isset($middle_success)){
                    echo '<label style= "color:green;">'.$middle_success.'</label><br><br>';
                }else{
                    echo "<br>";
                }
            ?>
            <label for="email">email</label><br>
            <input name="email" id="email" type="email" placeholder="email">
            <br><br>
            <label for="password">password</label><br>
            <input name="password" id="password" type="password" placeholder="password">
            <br><br>
            <?php
                if(isset ($bottom_error)){
                    echo '<label style="color:red;">'.$bottom_error.'</label><br><br>';
                }elseif(isset($sign_success)){
                    echo '<label style= "color:green;">'.$bottom_success.'</label><br><br>';
                }else{
                    echo "<br>";
                }
            ?>
            <?php
                if(isset ($sign_error)){
                    echo '<label style="color:red;">'.$sign_error.'</label><br><br>';
                }elseif(isset($sign_success)){
                    echo '<label style= "color:green;">'.$sign_success.'</label><br><br>';
                }else{
                    echo"<br>";
                }
            ?>
            <button type="submit" id="sub-submit" value="sub-submit">signup</button>
            <p>or <a href="../views/login.php">login</a> instead</p>

        </form>
    </div>
    
</body>
</html>