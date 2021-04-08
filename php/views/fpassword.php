<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="../../css/fpassword.css">
</head>
<body>
    <header class ="header"></header>
    <div class="container">
        <form action ="../controllers/fpassword_controller.php" method="POST">
            <br><h1 class="title">Forgot password</h1>
            
            <label for="email">Enter your email </label><br>
            <input name="email" type="email" placeholder="email">
            <br><br>
            <label for="email">Confirm your email</label><br>
            <input name="c_email" type="c_email" placeholder="confirm email">
            <br>
            <?php
                if(!isset($f_Error)){

                }
                elseif(isset($f_Error)){
                    echo'<label style = "color:red";>'.$f_Error.'</label><br>
                    <label style = "color:red;">and try again</label><br>'; 
                }
            ?>
            <br>
            <button type="submit" value="esubmit">submit</button><br><br>
            <p>or<a href="/html/signup.html"> signup</a> here</p>
        </form>
    </div>
    
</body>
</html>