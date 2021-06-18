<?php
session_start();

if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
 ?>
<?php require "function.php" ?>
<?php require 'dd.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Miamala
	</title>
	<link rel="stylesheet" href="malipo.css">
</head>
<body>
<div class="container">
	<header>
		<div class="logo">
		</div>
		<ul>
			<li class="btn angelBlue"><a href="index.php">Home</a></li>
			<li class="btn angelBlue" ><a href="payment.php">Payment</a></li>
			<li class="btn angelBlue" ><a href="loan.php">Loans</a></li>
			<li class="btn angelBlue"><a href="profile.php">profile</a></li>
			<li class="btn angelBlue"><a href="about.php">About</a></li>
		</ul>
		<button class="btn-cool nav-right"><a href="logout.php">logout</a></button>
	</header>
<!-- <section id ="profile" hidden></section> -->
	
	<footer>
		<div class ="about_us">
			<div class="a_holder"><h4>About us</h4></div>
			<div class="inner">
			<p>we make things for every one to shine with<br>
				Feee free to make a comment to us for the best<br>
			rejoice the pleasure</p>
			</div>
		</div>
		<div class="contact">
			<div class ="c_holder">
			<h4>Contact</h4></div>
			<div class="inner">
			<address>
				mangaka<
				0694387907<br>
				malgadopr8@gmail.com<br>
			</address>
			</div>
		</div>	
	</footer>
	<div class="copyright">
			<h4>copyright</h4>
			<h4>2021@production<h4>
		</div>
</div>
</body>
<script type="text/javascript" src="malipo.js">
</script>
</html>