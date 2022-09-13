<!DOCTYPE html>
<html>
<?php
ob_start();
include 'customer_profile_header.php' ;
if($_SESSION['customer_login'] != true){

	header('location:customer_login.php');
	return 0;
	}

	

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Transfer</title>

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
                <a href="customer_profile.php">
                <i class="fa-solid fa-grid-horizontal"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="account.php">
                    <i class="fas fa-user-circle"></i> <span>Account</span>
                </a>
            </li>
            <li>
                <a href="transfer.php">
                <i class="fa-solid fa-arrow-right-arrow-left"></i><span>Transfer</span>
                </a>
            </li>
            <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa-solid fa-money-bill"></i> <span>Beneficiary</span>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="add_beneficiary.php"><i class="fa-solid fa-arrow-right-arrow-left"></i><span>Add Beneficiary</span></a>
                        </li>
                        <li>
                            <a href="delete_beneficiary.php"><i class="fa-solid fa-piggy-bank"></i><span>Delete Beneficiary</span></a>
                        </li>
                        <li>
                            <a href="view_beneficiary.php"><i class="fa-solid fa-money-simple-from-bracket"></i><span>View Beneficiary</span></a>
                        </li>
                    </ul>
                </li>
            <li>
                <a href="#">
                    <i class="far fa-credit-card"></i><span> Cards</span>
                </a>
            </li>
            <li>
                <a href="loan.php">
                    <i class="far fa-credit-card"></i><span> Loan</span>
                </a>
            </li>
            <li>
                <a href="message.php">
                    <i class="fa-solid fa-message"></i><span> Message</span>
                </a>
            </li>
            <li>
                <a href="faq.php">
                    <i class=" fas fa-question"></i><span> FAQ</span>
                </a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa-solid fa-gear"></i> <span> Settings</span>
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="change_password.php">Change Password</a>
                    </li>
                    <li>
                        <a href="#">Withdraw</a>
                    </li>
                    <li>
                        <a href="#">Deposit</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="customer_logout.php">
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
            <section class="py-5">
                <div class="container py-5">
                    <div class="row gy-4">
                        <div class="col-lg-9">
                           
                            
                            <div class="mb-3" id="faqAccordion" role="tablist">
                                <div class="accordion-item mb-3">
                                    <h4 class="accordion-header" id="faqAccordion-headingOne">
                                        <button type="button" data-bs-toggle="collapse" aria-expanded="true"  class="accordion-button text-uppercase fw-bold" aria-labelledby="faqAccordion-collapseOne" data-bs-target="#faqAccordion-collapseOne" aria-controls="faqAccordion-collapseOne">Transfer to Ibank Account</button>
                                    </h4>
                                    <div class="accordion-collapse collapse" data-bs-parent="#faqAccordion" aria-labelledby="faqAccordion-collapseOne" id="faqAccordion-collapseOne">
                                        <div class="accordion-body">
                                            <form method="post">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="firstname">Account Number</label>
                                                       <select name="beneficiary" class="form-control">
                                                       <option class="default" value="" disabled selected>Select Beneficiery</option>
                                                       <?php

		include 'database.php';
		$cust_id = $_SESSION['customer_Id']; 
		$sql = "SELECT * from beneficiary_$cust_id ";
		$result = $connection->query($sql);
		while($row = $result->fetch_assoc()){
							
						echo '
						'; ?>
						
		 <option value="<?php echo $row['Beneficiary_ac_no']; ?>"> <?php echo
		  $row['Beneficiary_name']; ?> </option>
					
		<?php } ?>
                                                       </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="lastname">Amount</label>
                                                        <input type="text" class="form-control" id="Amount" name="trnsf_amount" >
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="email">Password / Pin</label>
                                                        <input type="password" class="form-control" id="password/pin" name="trnsf_remark">
                                                    </div><br>
                                                    <div class="col-md-12 mb-3">
                                                        <button class="btn btn-outline-primary text-uppercase" name="fnd_trns_btn" type="submit" data-toggle="modal" data-target="#myModal">Transfer</a></button>
                                                    </div>    
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h4 class="accordion-header" id="faqAccordion-headingTwo">
                                        <button class="accordion-button text-uppercase fw-bold" data-bs-target="#faqAccordion-collapseTwo" aria-controls="faqAccordion-collpaseTwo" aria-labelledby="faqAccordion-collapseTwo" data-bs-toggle="collapse" aria-expanded="false" type="button">Other Banks</button>
                                    </h4>
                                    <div class="accordion-collapse collapse" data-bs-parent="#faqAccordion" aria-labelledby="faqAccordion-collapseTwo" aria-expanded="false" id="faqAccordion-collapseTwo">
                                        <div class="accordion-body">
                                            <form method="post" enctype="multipart/form-data" action="modal">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="accountnumber">Account Number</label>
                                                        <input type="text" class="form-control" name="account_number" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="amount">Amount</label>
                                                        <input type="text" class="form-control" name="amount" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name">Account Name</label>
                                                        <input type="text" class="form-control" name="name" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="bank">Select Other Bank</label>
                                                        <select id="bank" name="Banks" class="form-control" required>
                                                            <option></option>
                                                            <option value="First Bank">First Bank</option>
                                                            <option value="Union Bank">Union Bank</option>
                                                            <option value="GT Bank">GT Bank</option>
                                                            <option value="FCMB">FCMB</option>
                                                            <option value="Access Bank">Access Bank</option>
                                                            <option value="Kuda">Kuda</option>
                                                            <option value="Eco bank">Eco Bank</option>
                                                            <option value="Polaris Bank">Polaris Bank</option>
                                                            <option value="Keystone">Keystone Bank</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="password">Password / Pin</label>
                                                        <input type="password" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                    <button class="btn btn-outline-primary text-uppercase"  type="submit" name="transfer" ><a href="#" data-bs-target="#login-modal" data-bs-toggle="modal">Transfer</a></button>
                                                    </div>
                                                    <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title text-uppercase" id="login-modalLabel"></h4>
                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="text-uppercase">Transfer Sucessful 🎉</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>               
                 </div>

            </section>
            <?php 

if(isset($_POST['fnd_trns_btn'])){

	$_SESSION['trnsf_remark'] = $_POST['trnsf_remark'];

	if(!is_numeric($_POST['trnsf_amount'])){

		
	}
	
	else{ 

		
	$sender_ac_no = $_SESSION['Account_No'];	//Sender's Account_No

	$_SESSION['trnsf_amount'] = $trnsf_amount = $_POST['trnsf_amount'];	

	include 'database.php';

	//Receivers account number
	$_SESSION['beneficiary_ac_no'] = $beneficiary_ac_no = $_POST['beneficiary'];
	
	//Check Senders Minimum balance
	$sql = "SELECT * FROM customers_account WHERE Account_no = '$sender_ac_no' " ;
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION['sender_mob'] = $sender_mob = $row['Mobile_no'];
	$sender_name = $row['Username'];
	if($row['Current_Balance'] < $trnsf_amount){

		echo '<script>alert("Insufficient balance")
					   location="transfer.php";		
						</script>';

	}

	else {

		$_SESSION['fund_trnsfer_otp'] = $otp_fund_trnsfer = mt_rand(100,999).mt_rand(100,999);


		
		header("Location:fund_transfer_otp.php");
	}
}

}

	
?>
            
        </div>
    </div>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/waypoints/lib/noframework.waypoints.js"></script>
       
        <script src="vendor/choices.js/public/assets/scripts/choices.js"></script>
        <script src="js/theme.js"></script>

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
