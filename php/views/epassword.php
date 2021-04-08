<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password reset</title>
    <link rel="stylesheet" href="../../css/efpassword.css">
</head>
<body>
    <header class ="header"></header>
    <div class="container">
        <form action="../controllers/epassword_controller.php" method="POST">
            <br><h1 class="title">password reset</h1>

            <label for="email">Enter your email </label><br>
            <input name="email" type="email" placeholder="email">
            <br><br>
            <label for="new password">Enter new password </label><br>
            <input id="pass" name="pass" type="password" placeholder="new password">
            <br><br>
            <label for="confirm new password">Confirm new password</label><br>
            <input id="c_pass" name="c_pass" type="password" placeholder="new password">
            <br><br>
            <?php
                if(!isset($f_Error)){

                }
                elseif(isset($f_Error)){
                    echo'<label style = "color:red";>'.$f_Error.'</label><br>
                    <label style = "color:red;">and try again</label><br>'; 
                }
            ?>
            <button type="submit" value="passsubmit">submit</button><br><br>
            <p>or<a> signup</a> here</p>
        </form>
    </div>
    
</body>
</html>