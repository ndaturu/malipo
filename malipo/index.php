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
		tab sample
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
	<div id ="Home">
		<div class="" style="background: url(./img/mostwanted.png);background-size: cover;width: 100%;height: 100%;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
			<h1>TRANSACTIONs RECORDING</h1>
			<p>keeping records of your money movement, is all you need to do to make sure that you know where every coin originate and where it is spent.
				 
				feel as home for privacy is assured not even admin can know what goes on to your account. Be sure to keep your password and username safe.

			</p><br>
			<div class="back">
				Records 
			</div>
			<div class="btn-cool sageBush flex">
			<div class ="about_us">
				<div class="a_holder algae"><h4>Loan</h4></div>
				<div class="inner"><p>Loans in our life are inevitable, therefore keeping records of every money borrowed is necessary.
					Record all money borrowed from others in here.
					Also, record all money rented to others.
					Amount rented is recorded ... 

				</p></div>
				</div>
				<div class="contact bluegray">
					<div class ="c_holder  grey"><h4>Profile</h4></div>
					<div class="inner"><p>username and password are crucial to ensure safety of your account.
						It is your responsibility to make sure your account is safe, to avoid any leakage.
					Login informations can be changed here as well, it is good to change password several times,
					the risk to be known by others to avoid   </p> </div>
				</div>			
			<div class ="about_us">
				<div class="a_holder silver" ><h4>Payments</h4></div>
				<div class="inner">	  
				<p>In this part, you are able to Record all money spent and all money received.You could say it could help you identify what have you spent and for what purpose. This way You can control your ways of spending your money, also you can realize important sources of your money.
				</p>
				</div>
			</div>
			<div class="contact dodgerBlue">
				<div class ="c_holder blonde"><h4>About</h4></div>
				<div class="inner">
				
					<div class="circle mid paul"></div>
				<p>Paul malgado<br>Chief Engineer</p>
			</div>
			<div class="inner">
				
				<div class="circle mid mbise"></div><p>Herman Einstein<br>Chief Coordinator</p>
		
			
				<div class="circle mid salim"></div><p>Sheikh Salim<br>Junior Engineer</p>
			 </div>
			</div>
		</div>
		</div>
	</div> 
	</div>
	<footer class="btn-cool dark">
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
				mangaka<br>
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
<script type="text/javascript" src="malipo.js"></script>
</body>
</html>
