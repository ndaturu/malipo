<?php require "function.php" ?>
<?php include_once 'includes/db.inc.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
	<style type="text/css">
	<?php include 'malipo.css'; ?>

	</style>
</head>
<body style="background: url('img/tz.jpg');background-size: 100%">
	<div class="btn dark pad" style="width: 45%;margin: auto;padding:4px 11px;margin-top: 11px;text-align: center;">
  	
	<div class="btn center dodgerBlue" style="width: 45%;margin: auto;padding:4px 11px;margin-top: 11px;text-align: center;">
  		<h2 class="center">USER REGISTRATION</h2>
  	</div><br><br>
  <!-- /.login-logo -->
  
		<form method="POST" enctype="multipart/form-data" >
			<div class="form-group has-feedback">
				<label for="em" class="col-form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email" id="em" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
		  <div class="form-group has-feedback ">
				<label for="pas" class="col-form-label">Password</label>
        <input type="password" name="password" class="form-control" id="pas" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
			<div class="form-group has-feedback">
				<label for="cpas" class="col-form-label">Confirm Password</label>
        <input type="password" name="confpassword" class="form-control" id="cpas" placeholder="confirm Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
			<div class="form-group has-feedback">
				<label for="nam" class="col-form-label">Name</label>
				<input type="text" name="name" class="form-control" id="nam" placeholder="name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
			<div class="form-group has-feedback">
				<label for="fileToUpload" class="col-form-label">Picture</label>
				<input type="file" name="fileToUpload" 	class="form-control" id="fileToUpload" placeholder="picture" required>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<label for="asa" class="col-form-label">Mobile</label>
        <input type="text" id="asa" name="number" class="form-control" placeholder="phone" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
									<a class="btn success " style="bacground-color:green;" href="login.php" name="saveDetail" role="button">Login</a>
									<button type="submit" name="saveP"  class="btn-cool primary" style="bacground-color:green;">Save

									<span class="glyphicon glyphicon-check"></span></button>

  

	</div>
  <br>
  <div class="alert alert-danger" id="error"  style="width: 25%;margin: auto;display: none;"></div>
  <div style="position: fixed;;top:0;background: rgba(0,0,0,0.7); width: 100%;height: 100%;z-index: -1"></div>

  <!-- /.login-box-body -->
</div>

</form>
</body>
</html>

<?php
if (isset($_POST['saveP']))
 {
	
	$result=$con->query("select * from users");
$checker=0;
	while($data = $result->fetch_assoc())
	{
		if($data['email']==$_POST['email']){
			$checker=1;
			 $notice ="<div style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' class='alert alert-danger'>User already exist, change email!!</div>";
			 echo $notice;
break;	}
		else{$checker=2;}
	}
	if($checker==2){
		$pass1 = $_POST['password'];
							$pass2 = $_POST['confpassword'];
							$pass=sha1($pass1,$pass1);
							if($pass1 != $pass2)
                            {
								?>
								<div style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' class='alert alert-danger'>Error! Password do not match</div>
								<?php
							}
							else {
								// code...}
								$target_file = $_FILES["fileToUpload"]['name'];
								move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "img/".$_FILES["fileToUpload"]["name"]);
								if ($con->query("insert into Users (email,password,name,pic,number) values ('$_POST[email]','$pass1','$_POST[name]','$target_file','$_POST[number]')"))
								{
									$notice ="<div class='alert success' style='width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6' >Successfully Saved</div>";
									echo $notice;
								}
								else{
									$notice ="<div class='alert danger'>Error is:".$con->error."</div>";
									echo $notice;
									}
								}
}
}
?>
