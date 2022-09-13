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

    <title>View Customer Account Number</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="dashb.css">
    <link rel="stylesheet" href="view_customer_by_acc_no.css">
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

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                      
                    </button>

                    
                </div>
            </nav>
            <?php
	include 'staff_profile_header.php' ;?>
    <section class="py-4">
        <div class="container py-3">
            <div class="row gy-4">
                
                <form method="post">
                    <div class="col-md-6 mb-3">
                        <label for="account_number">Customer Account Number</label>
                        <input type="text" class="form-control" name="account_no">
                    </div>
                    <div class="col-mb-12">
                        <button type="submit" class="" name="submit_view" value="Submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    if(isset($_POST['submit_view'])){
        $cust_ac=$_POST['account_no'];
        include 'database.php'; 
        $sql="SELECT * FROM customers_account where Account_no= '$cust_ac'";
        $result = $connection->query($sql);
        if($result->num_rows > 0){
        $row = $result->fetch_assoc();

	    echo '<div class="view_cust_byac_container_inner">
            <div class="cust_details">
                <span class="heading">Customer Details</span><br>
                <label>Customer Id : '.$row['Customer_ID'].'</label>
                <label>Account Number : '.$row['Account_no'].'</label>
                 <label>Account Name : '.$row['Username']. '</label>
                <label>Account Type : '.$row['Account_type']. '</label>
                <label>IFSC Code : '.$row['IFSC_Code']. '</label>
                <label>Available Balance : $'.$row['Current_Balance'].'</label>
                <label>Mobile No : '.$row['Mobile_no'].'</label>
                <label>Debit Card No : '.$row['Debit_Card_No'].'</label>
                <label>Nominee Name : '.$row['Nominee_name'].'</label>
                <label>Nominee Ac/no : '.$row['Nominee_ac_no'].'</label>
                <label>Email Id : '.$row['Email_ID'].'</label>
            </div>
            </div>'; 
    
    }

    else{

        echo '<script>alert("Customer not found")</script>';
    }
    }
    ?>
           
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