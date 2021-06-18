<?php
session_start();
if(!isset($_SESSION['userId']))
{
  header('location:login.php');
}
 ?>
<?php require "function.php" ?>
<?php include_once 'includes/db.inc.php';?>
<?php
  $notice="";
  if (isset($_POST['savepay']))
  {
    if ($con->query("insert into payments (details,mode,type,context,amount,date,userid) value ('$_POST[details]','$_POST[paymode]','$_POST[paytype]','$_POST[context]','$_POST[amount]','$_POST[date]',$_SESSION[userId])")) 
	{
      $notice ="<div class='alert success'>Successfully Saved</div>";
    }
    else{
    $notice ="<div class='alert danger'>Not saved Error:".$con->error."</div>";
	}
	
  }
   ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		miamala
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
			<li class="btn angelBlue" ><a id="paytab" href="payment.php">Payment</a></li>
			<li class="btn angelBlue" ><a id="loantab"href="loan.php">Loans</a></li>
			<li class="btn angelBlue"><a href="profile.php">profile</a></li>
			<li class="btn angelBlue"><a href="about.php">About</a></li>
		</ul>
		<button class="btn-cool nav-right"><a href="logout.php">logout</a></button>
	</header>
	<!-- <section id ="Home" hidden></section> -->
		<div class="me" style="background-size: cover;width: 100%;height: 100%;">			
			<div class="form-group">
				<div class="board">
				<?php echo $notice;?>
				</div>
				<br>
				<ul>
					<li></li>
					<li class="btn dodgerBlue" ><a id="paymt">Payments</a></li>
					<li class="btn dodgerBlue" ><a id="receipt">Receipts</a></li>
					<button class="btn angelBlue" id="btn">Add New Record</button>
				</ul>
			</div>
			<table id="payment">
				<tr>
				  <th>#</th>
				  <th>Payment Details</th>
				  <th>Payment Type</th>
				  <th>Payment Mode</th>
				  <th>Context</th>
				  <th>Amount</th>
				  <th>Date</th>
	
				</tr>
				<tr>	<?php
				$payments=$con->query("select * from payments where userid='$_SESSION[userId]'");
				$i=0;
        while ($row = $payments->fetch_assoc())
        {
          $i=$i+1;
        ?>
				<tr>
				<td><?php echo $i; ?></td>
            <td><?php echo $row['details']; ?></td>
            <td><?php echo $row['type']; ?></td>
			<td><?php echo $row['mode']; ?></td>
            <td><?php echo $row['context']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['date']; }?></td>
			</tr>	  
		</table>
		
		<div class="modal" id="myModal">
			<!-- Modal content -->
			<form method="POST">
			<div class="modal-content">
			  <div class="modal-header">
				<span class="close" data-dismis="modal">&times;</span>
				<h2>Add New Transaction</h2>
			  </div>
			  <div class="modal-body">
		  <div class="me">
			  <div class="form-group">
				  <input type="text" name="details" id="" placeholder="Transaction Details" required>
			  </div>
			  <div class="form-group">
				<select name="paytype" id="ptype" aria-placeholder="pay">
					<option value= "nonen" selected disabled>--Transaction Type--</option>
					<option value="expense">Expenditure</option>
					<option value="receipt">Receipt</option>
				</select>
			</div>
			<div class="form-group">
				<select name="paymode" id="pmode">
					<option value="none" selected disabled>--Transaction Mode--</option>
					<option value="Cash">Cash</option>
					<option value="AirtelMoney">AirtelMoney</option>
					<option value="Mpesa">Mpesa</option>
					<option value="Tigopesa">Tigo Pesa</option>
					<option value="Tpesa">T-Pesa</option>
					<option value="Halopesa">Halopesa</option>
					<option value="ezypesa">ezypesa</option>
					<option value="Bank">Bank</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="context" id="context" placeholder="Context" required>
			</div>
			<div class="form-group">
				<input type="number" name="amount" id="Amount" placeholder="AMOUNT" required>
			</div>
			<div class="form-group">
				<input type="date" name="date" id="" placeholder="Date" required>
			</div>
		  </div>
			  </div>
			  <div class="modal-footer">
				<!-- <h3>Modal Footer</h3> -->
				<button type="button" class="btn default" id="closeD" data-dismis="modal">Close</button>
        <button type="submit" class="btn primary" name="savepay">Save Transaction</button>
			  </div>
			</div>
		  </div>
		</div>
		</form>
		<?php ?>
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
<script type="text/javascript" src="modal.js"></script>
</body>
</html>
