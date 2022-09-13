<?php 
error_reporting(0);
session_start();
if($_SESSION['staff_login'] != true)
{
	
	 header('location:staff_login.php');

}	

?>

<html>
    <head>
    
    <link rel="stylesheet" type="text/css" href="css/staff_profile_header.css" />
	
	</head>
    
<body>
    		
			
	<?php	
		include 'database.php';
        
        $staff_id = $_SESSION['staff_id'];
		$sql="SELECT * FROM bank_staff WHERE Staff_id= '$staff_id' ";
        $result=$connection->query($sql);
        if($result->num_rows > 0)
		$row = $result->fetch_assoc();

        $dates=date("G");
        
        if($dates>=0 && $dates <=12)
        $welcome_string="Good Morning";
        elseif($dates>=12 && $dates <=17)
        $welcome_string="Good Afternoon";
        elseif($dates>=17 && $dates <=23)
        $welcome_string="Good Evening";
                   
                   

	?>
       <div class="head">
            
           
             <div class="welcome">

             <label> <?php echo $welcome_string?> <?php echo $_SESSION['staff_name']; ?></label>
                  </div>
        
        </div>
        <br>
			

    </body>
</html>