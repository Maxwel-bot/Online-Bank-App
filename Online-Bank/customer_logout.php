<?php 



	session_start();
	
		include 'database.php';
		// Update date & time
		
		$customer_id=$_SESSION['customer_Id'] ;
		$this_login=$_SESSION['this_login'];
		
		$sql="UPDATE customers_account SET  Last_Login='$this_login' WHERE customers_account.Customer_ID=$customer_id ";
		$connection->query($sql);
	
		session_destroy();
		session_unset();

	header('location:customer_login.php');
	
	
?>