
<html>
<head>
  <title>Login PointOfSale </title>
  <link href="../css/login_style.css" rel="stylesheet" type="text/css">
</head>
<body>
  
  <div class="login"> 
    <h1>Login to your account</h1>

    <form class="form" method="post" action="login.php">

      <p class="field">
        <input type="text" name="username" placeholder="Username or email" required/>
        <i class=" fa-user"></i>
      </p>

      <p class="field">
        <input type="password" name="password" placeholder="Password" required/>
        <i class=" fa-lock"></i>
      </p>

      <p class="submit"><input type="submit" name="commit" value="Login"></p>

      <p class="remember">
        <input type="checkbox" id="remember" name="remember" />
        <label for="remember"><span></span>Remember Me</label>
      </p>
	  <p class="123">
        <a href="regjistro_user.php" style="position:relative; color: #a7a599;font-size: 12px; text-decoration: none;font-style: italic;transition: all 0.3s ease-out;">Create Account</a>
      </p>
      <p class="forgot">
      </p>
      <p>
          <a href="#"><img src="../img/google_login.png" style="margin-left:80px;margin-top: -26px;"></a>
      </p>
    </form>
  </div>
  <div class="copyright">
    <p>Copyright &copy; 2014. Created by Edon</a></p>
  </div>
</body>
</html>
