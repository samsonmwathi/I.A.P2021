<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
    <header class ="header"></header>
    <div class="container">
        <form action="../controllers/login_controller.php" method="POST">
            <br><h1 class="title">Login</h1>
            <label for="email">email</label><br>
            <input id="email" name="email" type="email" placeholder="email">
            <br>
            
            <?php

                if(isset($emailError)){
                    echo '<label style = "color:red";>'.$emailError.'</label><br>
                    <label style = "color:red;">please try again</label><br>';  
                 }
            ?>
            <br>
            <label for="password">password</label><br>
            <input id="email" name="password" type="password" placeholder="password">
            <br><br>
            <?php

                if(isset($passError)){
                    echo '<label class="warning">'.$error.'</label><br><br>';
                 }
            ?>
            <a href="../views/epassword.php">forgot password?</a>
            <br><br>
            <?php

                if(isset($error)){
                    echo '<label style = "color:red";>'.$error.'</label><br>';  
                 }
            ?>
            <br>
            <button type="submit" value="login">login</button><br>
            <p>or<a href="../views/signup.php"> signup</a> here</p>
        </form>
    </div>
    
</body>
</html>