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
  if (isset($_POST['saveloan']))
  {
	$con = new mysqli('sql109.epizy.com','epiz_28475707','9IEMi4HHtcAdp','epiz_28475707_miamala_db');
    if ($con->query("insert into loans (name,mode,context,amount,date,status,userid) value ('$_POST[fname]','$_POST[loanmode]','$_POST[lcontext]','$_POST[lamount]','$_POST[ldate]','$_POST[lstatus]',$_SESSION[userId])")) {
  ?>
		<div class="alert success">Successfully Saved</div>
		<?php 
    }
    else
    ?>
	<div class="alert danger">Not saved Error:<?php echo $con->error?></div>;
	<?php 
  }
   ?>
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
		<!-- <div class="circle success">
			
			
		lend
		...
		</div>
		<div class="circle danger">
			
			
		pays
		...
		</div>
		<div class="circle blonde">
			
		deals
		...
		</div> -->
		<ul>
			<li class="btn angelBlue"><a href="index.php">Home</a></li>
			<li class="btn angelBlue" ><a href="payment.php">Payment</a></li>
			<li class="btn angelBlue" ><a id="loantab" href="loan.php">Loans</a></li>
			<li class="btn angelBlue"><a href="profile.php">profile</a></li>
			<li class="btn angelBlue"><a href="about.php">About</a></li>
		</ul>
		<button class="btn-cool nav-right"><a href="logout.php">logout</a></button>
	</header>
	
		<div class="me" style="background: url(./img/mostwanted.png);background-size: cover;width: 100%;height: 100%;">
			<div class="btn-cool angelBlue">
				<ul>
					<li></li>
					<button class="btn dodgerBlue" id="btn">Add New Record</button>
				</ul>
			</div>
			<br>
			<br>
			<table id="payment">
				<tr>
				  <th>#</th>
				  <th>Full Name</th>
				  <th>Loan Mode</th>
				  <th>Context</th>
				  <th>Amount</th>
				  <th>Date</th>
				  <th>Status</th>
				  <th>Action</th>
				</tr>
				<?php
				$loans=$con->query("select * from loans where userid='$_SESSION[userId]'");
				$i=0;
        while ($row = $loans->fetch_assoc())
        {
          $i=$i+1;
		  $id = $row['id'];
        ?>
		<tr>
				<td><?php echo $i; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['mode']; ?></td>
            <td><?php echo $row['context']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['status'];?></td>
			<td colspan="center"><a href="delete.php?item=<?php echo $row['id'] ?>&url=<?php echo $_SERVER['QUERY_STRING'] ?>"><button class='btn-cool danger btn-xs'>Delete Item</button></a><button class="btn-cool default">Update</button></td>				  
				  
				  <?php }?></tr>
				  <!-- gghgg -->
			  </table>
			  <form method="POST">
		<div class="modal" id="myModal">
			<!-- Modal content -->
			
			<div class="modal-content btn-cool">

			  <div class="btn-cool default platnum">
				<span class="close" data-dismis="modal">&times;</span>
				<h2>Record a Loan Transaction</h2>
			  </div>
			  <div class="modal-body">
				  
			  <div class="form-group">
				  <input type="text" name="fname" id="" placeholder="Full Name" required>
			  </div>
	
			  <div class="form-group">
				<select name="loanmode" id="ltype" name="ltype" aria-placeholder="pay">
					<option value= "nonen" selected disabled>--Loan Mode Type--</option>
					<option value="Creditors">Cash In</option>
					<option value="Debtors">Cash Out</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="lcontext" id="" placeholder="Context" required>
			</div>
			<div class="form-group">
				<input type="number" name="lamount" id="" placeholder="AMOUNT" required>
			</div>
			<div class="form-group">
				<input type="date" name="ldate" id="" placeholder="Date" required>
			</div>
			<div class="form-group">
				<select name="lstatus" id="lstatus">
					<option value="none" selected disabled>--Loan Status--</option>
					<option value="Paid">Paid</option>
					<option value="Pending">Pending</option>
				</select>
			</div>
			  </div>
			  <div class="modal-footer">
				<!-- <h3>Modal Footer</h3> -->
				<button type="button" class="btn default" id="closeD" data-dismis="modal">Close</button>
        <button type="submit" class="btn primary" name="saveloan">Record Loan</button>
			  </div>
			</div>
		  </div>
		</div>
		</form>
		<!-- <section id ="Home" hidden></section> -->
	<footer>
		<div class ="about_us">
			<div class="a_holder"><h4>About us</h4></div>
			<div class="inner">
			<p>we make things for every one to shine with<br>
				Feel free to make a comment to us for the best<br>
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
