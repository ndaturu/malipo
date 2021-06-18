<?php require "function.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" href="malipo.css">
	<style type="text/css">
	

	</style>
</head>
<body style="background: url('img/tz2.JPG');background-size: 100%">
	<div class="modal-content lg tz">

  	<div class="btn" style="width: 55%;margin: auto;padding:4px 11px;margin-top: 111px;text-align: center;">
  		<h1 class="center">Login</h1>
  	</div>
  <!-- /.login-logo -->
  <div class="btn dark" style="width: 55%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6">

		<form method="post">
      <div class="form-group ">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

		  <div class="form-group ">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

          <button type="submit" name="login" class="btn primary">Sign In</button>


									<a class="btn-cool success" style="bacground-color:green;" href="register.php" role="button">Register today</a>

  </div>

	</div>
  <br>
  <div class="alert danger" id="error"  style="width: 25%;margin: auto;display: none;"></div>
  <div style="position: fixed;;top:0;background: rgba(0,0,4,0.7); width: 100%;height: 100%;z-index: -1"></div>

  <!-- /.login-box-body -->
</div>

</form>
</body>
</html>

<?php

if (isset($_POST['login']))
{
	$user = $_POST['email'];
    $pass = $_POST['password'];
    $con = new mysqli('sql109.epizy.com','epiz_28475707','9IEMi4HHtcAdp','epiz_28475707_miamala_db');

    $result = $con->query("select * from users where email='$user' AND password='$pass'");
    if($result->num_rows>0)
    {
    	session_start();
    	$data = $result->fetch_assoc();
    	$_SESSION['userId']=$data['id']; 
			$_SESSION['name']=$data['name'];
			$_SESSION['contact']=$data['number'];
      $_SESSION['bill'] = array();
      if($data['id']>0)
	  header('location:index.php');
      }
    else
    {
     	echo
     	"<script>
     		\$(document).ready(function(){\$('#error').slideDown().html('Login Error! Try again. '.$con->error).delay(3000).fadeOut();});
     	</script>
     	";
    }
}

 ?>
