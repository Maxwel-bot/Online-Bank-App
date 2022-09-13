<?php 



	session_start();
	
		include 'database.php';
		// Update date & time
		
		$staff_id=$_SESSION['staff_id'];
		$last_login=$_SESSION['staff_last_login'];
		
		$sql="UPDATE bank_staff SET Last_login = '$last_login' WHERE bank_staff.Staff_id ='$staff_id' ";
		$connection->query($sql);
	
		session_destroy();
		session_unset();
	
	header('location:staff_login.php');
	
	
?>