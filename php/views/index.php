<?session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Colossal</title>
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
</head>

<body>
    <header>
		<div class="wrapper">
			<div>
                <a class= "logo" href="login.html">mega-colossal</a>
            </div>
            <div>
                <img class="dp" src="../../images/snimbus.jpg">
                <h1><?php $_SESSION['username']?></h1>
			</div>
		</div>
	</header>
        <div class="menutitle"><h1>welcome</h1></div>
	
		<div class="content">
			<div>
                
                    <img class="pic" src="../../images/smushroom.jpg">
                
                    
                    <img class="pic"src="../../images/slava.jpg">
                
                    
                    <img class="pic" src="../../images/ssummit.jpg">
                
                
                    <img class="pic" src="../../images/sdormant.jpg">

			</div>
        </div>
        <footer>
            <h2>Important links</h2>
            <a> aboutus</a>
            <a>blog</a>
            <a>branches</a>
        </footer>
</body>
</html>