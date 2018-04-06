<?php 
session_start();
require 'functions.php';

//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $result = mysqli_query($conn, "SELECT username from user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);


  if($key === hash('sha256', $row['username']) ) {
    $_SESSION['login'] = true;
  }

}

if( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}



if( isset($_POST["login"]) ) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if( mysqli_num_rows($result) === 1 ) {
    
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"]) ) {

      //set session
      $_SESSION["login"] = true;

      // cek remember me
      if( isset($_POST["ingat"]) ) {
        setcookie('id', $row['id'], time() + 3600);
        setcookie('key',hash('sha256', $row['username']), time() +  3600);


      }

      header("Location: index.php");
      exit;
    }
  }

  $error = true;

}

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href=" css/w3.css">
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-image:  url(background/45.jpg);   background-size: 100%;\
  background-position: center; color: white;">
          
      <div class="col-md-7 col-md-offset-1 w3-animate-zoom"> 
      <div class="container text-center img-rounded w3-animate-zoom" style="background-color: rgba(64,64,64,0.7); height: 550px;  margin-top: 60px; animation: 2s;">
          
        <div class="isi" style="margin-top: 30px;">
        <img class="img-circle" src="background/web.jpg" style="height: 150px; ">
             
  <h1>Sign-in</h1> 
  <p>Silahkan Melakukan sign-in, Jika Tidak memiliki akun bisa melakukan sign-up.</p>
  <?php if( isset($error) ) : ?>
  <h3><p style="color: red; font-style: italic;">Username / Password salah</p>
  <?php endif; ?> </h3>
  <form class="form-inline" action="" method="post">
    <div class="input-group">

      <input type="Name" class="form-control" size="50" placeholder="User Name" name="username" required>

      <br>  <br>  <br>  

      <input type="Password" name="password" class="form-control" size="50" placeholder="Password" required>

      <input type="checkbox" name="ingat" value="Car">Remember Me 

      <br>  <br>  <br> 
       
    <button class="btn btn-info" name="login">sign-in</button>
            <br>  <br>  
     
      <a href="sign-up.php" style="float: center; color: aqua;">Do not have an account?</a>
          
      </div>
    </div>
  </form>
   
</div>
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


