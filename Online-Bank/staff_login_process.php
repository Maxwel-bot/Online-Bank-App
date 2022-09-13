<?php  ob_start();  ?>
<?php
include 'database.php';
if(isset($_POST['staff_login-btn'])){
	
if(isset($_POST['staff_name'])){
$staff_name = $_POST['staff_name'];
$password = md5($_POST['password']);
}
    
		$sql="SELECT * FROM bank_staff where staff_name='$staff_name' and Password='$password' ";
		$result = $connection->query($sql);
		$row = $result->fetch_assoc();
		if($staff_name != $row['staff_name'] && $password != $row['Password']){
			
		echo '<script>alert("Incorrect Id/Password.")</script>';
			
		}

			
		else{
			
		$_SESSION['staff_login'] = true;
		$_SESSION['staff_name'] = $row['staff_name'];
        $_SESSION['staff_id'] = $row['staff_id'];
		date_default_timezone_set('Africa/Lagos'); 
		$_SESSION['staff_last_login'] = date("d/m/y h:i:s A");
		header('location:staff_profile.php');
		}
		
}



?>