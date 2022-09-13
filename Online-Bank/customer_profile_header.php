<?php 
session_start();
if($_SESSION['customer_login'] != true)
{
	
	 header('location:customer_login.php');

}	

?>

<html>
    <head>
    
    <link rel="stylesheet" type="text/css" href="css/customer_profile_header.css" />
    <style>
    #home, #logout{

        background-color:rgba(5, 21, 71,0.9);
        border:none;
        padding:5px;
        width:70px;
        color:white;
        cursor:pointer;
        box-shadow:2px 2px 6px rgba(5, 21, 71,0.9);
        transition-duration: 0.6s;
    }

    #home:hover, #logout:hover{

        padding:10px;
        

    }
	</style>
	</head>
    
<body id="customer_profile">
    		
			
	<?php	
		include 'database.php';
		
		$customer_id=$_SESSION['customer_Id'];
		$sql="SELECT * FROM customers_account WHERE Customer_ID='$customer_id'";
		$result=$connection->query($sql);
		if($result->num_rows > 0)
		$row = $result->fetch_assoc();

	?>
       <div class="head">
            
        </div>
        <!-- <br>
        <marquee class="warning"><p>Please Change your password regularly</p></marquee> 
        <br> -->
        

    </body>
</html>