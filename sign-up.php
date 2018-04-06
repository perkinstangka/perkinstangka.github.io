<?php 
  require 'functions.php';

  if( isset($_POST["register"]) ){
 
    if( registrasi($_POST) > 0 ) {
      echo "<script>
        alert('user baru berhasil di tambahkan!')
        <script>";

          header("Location: index.php");
          exit;
    }else{
      echo mysqli_error($conn);

      
    }

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
      <div class="container text-center img-rounded w3-animate-zoom" style="background-color: rgba(64,64,64,0.7); height: 550px;  margin-top: 60px;">
        

        <div class="isi" style="margin-top: 30px;">
        <img class="img-circle" src="background/web.jpg" style="height: 100px; ">
             
  <h1>Sign-up</h1> 
  <p>Silahkan mengisi dengan benar.</p>

  <form class="form-inline" action="" method="post">
    <div class="input-group">

      <input name="username" type="Name" class="form-control" size="70" placeholder="User Name" required><br>  <br> 

      <input name="password" type="Password" class="form-control" size="70" placeholder="Password" required>
      <br>  <br> 

      <input name="password2" type="Password" class="form-control" size="70" placeholder="Konfirmasi Password" required>
      <br>  <br>  

      <button class="btn btn-info" name="register">Sign-up</button>
            <br>  <br>  
     
      <a href="login.php" style="float: center; color: aqua;">have an account?</a>
          
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


