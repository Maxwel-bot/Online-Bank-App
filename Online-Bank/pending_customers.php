<!DOCTYPE html>
<html>
<?php
error_reporting();
session_start();
require('database.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="dashb.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3></h3>
            </div>

            <ul class="list-styled components">
            <li>
                <a href="active_customers.php">
                <i class="fa-solid fa-grid-horizontal"></i>Active Customers
                </a>
            </li>
            <li>
                <a href="view_customer_by_acc_no.php">
                    <i class="fas fa-user-circle"></i> <span>View Customer</span>
                </a>
            </li>
            <li>
                <a href="pending_customers.php">
                    <i class="far fa-credit-card"></i><span> Pending Accounting</span>
                </a>
            </li>
            <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa-solid fa-money-bill"></i> <span>Loan Requests</span>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="loan_requests.php"><i class="fa-solid fa-arrow-right-arrow-left"></i><span>View Requests</span></a>
                        </li>
                        <li>
                            <a href="delete_beneficiary.php"><i class="fa-solid fa-piggy-bank"></i><span>Delete Requests </span></a>
                        </li>
                        
                    </ul>
                </li>
            <li>
                <a href="delete_customer.php">
                    <i class="far fa-credit-card"></i><span> Delete Customer</span>
                </a>
            </li>
            <li>
                <a href="credit_customer_ac.php">
                    <i class="fa-solid fa-message"></i><span> Credit Customer</span>
                </a>
            </li>
            <li>
                <a href="staff_logout.php">
                <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                      
                    </button>
                   
                </div>
            </nav>
			<?php
	include 'staff_profile_header.php' ;?>
         <section class="py-5">
			<div class="container py-4">
				<div class="row gy-4">
				<div class="application_search">
<form method="post">
<input type="text" name="application_no" placeholder="Application number" required>
<input type="submit" name="search_application" value="Search">

</form>
</div>
					<div class="pending_customers_container">
					<table border="1px" cellpadding="10">
			   <th>#</th>
			   <th>Application No.</th>
			   <th>Name</th>
			   <th>Gender</th>
			   <th>Mobile</th>
			   <th>Email</th>
			   <th>Landline</th>
			   <th>DOB</th>
			   <th>Citizenship</th>
			   <th>Home Address</th>
			   <th>Office Address</th>
			   <th>Country</th>
			   <th>State</th>
			   <th>City</th>
			   <th>Pin</th>
			   <th>Area Loc.</th>
			   <th>Nominee Name</th>
			   <th>Nominee A/c no</th>
			   <th>Accoount Type</th>
			   <th>Application Date</th>

<?php

	
	if(isset($_POST['search_application'])){
		if(empty($_POST['application_no'])){

			echo '<script>alert("Please enter application number")</script>';
		}
		else{   


			$application_no  = $_SESSION['application_no'] = $_POST['application_no'];
			$sql = "SELECT * from pending_accounts Where Application_no = '$application_no' ";
			$result = $connection->query($sql);
			
			if ($result->num_rows > 0) {   
					  $Sl_no = 1; 
			// output data of each row
				while($row = $result->fetch_assoc()) {
					
				echo '
					<tr>
					<td>'.$Sl_no++.'</td>
					<td>'.$row['Application_no'].'</td>
					<td>'.$row['Name'].'</td>
					<td>'.$row['Gender'].'</td>
					<td>'.$row['Mobile_no'].'</td>
					<td>'.$row['Email_id'].'</td>
					<td>'.$row['Landline_no'].'</td>
					<td>'.$row['DOB'].'</td>
					<td>'.$row['CITIZENSHIP'].'</td>
					<td>'.$row['Home_Addr'].'</td>
					<td>'.$row['Office_Addr'].'</td>
					<td>'.$row['Country'].'</td>
					<td>'.$row['State'].'</td>
					<td>'.$row['City'].'</td>
					<td>'.$row['Pin'].'</td>
					<td>'.$row['Area_Loc'].'</td>
					<td>'.$row['Nominee_name'].'</td>
					<td>'.$row['Nominee_ac_no'].'</td>
					<td>'.$row['Account_type'].'</td>
					<td>'.$row['Application_Date'].'</td>
					</tr>';
			}
			
			
		}
		
		else{
		
			echo '<script>alert("Application not found")</script>';
		}
		 
		}
	}	

?>

</table>
					</div>
				</div>
			</div>
			<form method="post">
<div class="approve">
<input type="submit" name="approve_cust" value="Approve">
</div>
</form>
		 </section>
		 <?php	

include 'account_approve_process.php';?>
          
           
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');

                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>