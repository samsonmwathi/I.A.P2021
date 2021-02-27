<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <title>Signup</title>
</head>
<body>
    <header class ="header"></header>
    <div class="container">
        <form action="../classes/signup_controller.php" method="POST" >
            <h1 class = "title">Signup</h1>
            <label for="fullname">fullname</label><br>
            <input name="fullname" type="text" placeholder="fullname">
            <br><br>
            <label for="city of residence" >city of residence</label><br>
            <input name="city of residence" type="text" placeholder="city">
            <br><br>
            <label for="email">email</label><br>
            <input name="email" type="email" placeholder="email">
            <br><br>
            <label for="password">password</label><br>
            <input name="password" type="password" placeholder="password">
            <br><br>
            <button type="submit" id="sub-submit" value="sub-submit">signup</button>
            <p>or <a href="/html/login.html">login</a> instead</p>

        </form>
    </div>
    
</body>
</html>