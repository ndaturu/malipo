<?php
session_start();
include 'includes/db.inc.php';
if (isset($_GET['category']))
{
	if ($con->query("delete from categories where id = '$_GET[category]'"))
	{
		header("location:manageCat.php");
	}
	else
		echo "error is:".$con->error;
}
if (isset($_GET['item']))
{
	if ($con->query("delete from loans where id = '$_GET[item]'"))
	{	$url = "location:loan.php?".$_GET['url'];
		header($url);
	}
	else
		echo "error is:".$con->error;
}
 ?>
