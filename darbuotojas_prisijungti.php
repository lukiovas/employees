<?php 
if(isset($_SESSION)) { session_destroy(); }

session_start();
$_SESSION['valid']=false;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Prisijungimas</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
   .login-form {
      width: 340px;
      margin: 50px auto;
   }
    .login-form form {
      margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Sign UpF</h2>       
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
        </div>
        <div class="clearfix">
        </div>        
    </form>
</div>
</body>
</html>                                                                  
<?php

   $db = mysqli_connect('localhost', 'root', '', 'naujas_localhost');

 if (isset($_POST['login']) || isset($_POST['username']) 
               || isset($_POST['password'])) {
 $result = mysqli_query($db,
        "SELECT * FROM users WHERE Username='".$_POST['username']."' AND Password='".$_POST['password']."'")  or die (mysqli_error($db));

    if(mysqli_fetch_row($result)) {
         $_SESSION['valid'] = true;
         $_SESSION['username'] = $_POST['username'];
         echo '<script> location.href="darbuotojai_pareigos.php"</script>';
              }else{
                session_destroy();
                $_SESSION['valid'] = false;
              }
           }

