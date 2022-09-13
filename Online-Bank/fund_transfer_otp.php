<!DOCTYPE html>
<html>
<?php
ob_start();
error_reporting(0);
include 'customer_profile_header.php' ;
$sender_mob = $_SESSION['sender_mob'];
$hidden_mob_no = substr($sender_mob, 0, 3)."XXXX".substr($sender_mob, 7, 10);
$ref_no = $_SESSION['ref_no'];
	

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
                <div class="container py-4">
                    <div class="row gy-4">
                        <label for="otp_number">OTP with Ref no.<?php echo $ref_no." sent to <b>".$hidden_mob_no."</b> please verify to complete your transaction <br><br> *OTP :".$_SESSION['fund_trnsfer_otp']."" ; ?></label>
                        <form method="post">
                            <div class="col-md-6 mb-4">
                                <input type="password" class="form-control" placeholder="ENTER OTP NUMBER" name="otpcode"> 
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" name="verify-btn">Verify OTP </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>  
            <?php
          
            if(isset($_POST['verify-btn'])){
                $otpcode = $_POST['otpcode'];
                if($otpcode == $_SESSION['fund_trnsfer_otp']){
                    $sender_ac_no = $_SESSION['Account_No'];
     
                    $trnsf_amount = $_SESSION['trnsf_amount'];

                    $beneficiary_ac_no =$_SESSION['beneficiary_ac_no'];

                    include 'database.php';

                    $sql = "SELECT * FROM customers_account WHERE Account_no = $beneficiary_ac_no ";
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
	$receiver_ac_no = $row['Account_no'];
	$receiver_custmr_id = $row['Customer_ID'];
	$receiver_name = $row['Username'];
	$receiver_mob = $row['Mobile_no'];
	$receiver_netbal = $row['Current_Balance'] + $trnsf_amount;
	$receiver_passbk = "passbook_".$receiver_custmr_id;
	
	
	//Senders Details require_onced for transaction 
	$sql = "SELECT * FROM customers_account WHERE Account_no = '$sender_ac_no' " ;
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
	$sender_custmr_id = $row['Customer_ID'];
	$sender_name = $row['Username'];
	$sender_mob = $row['Mobile_no'];
	$sender_ac_no = $row['Account_no'];
	$sender_netbal = $row['Current_Balance'] - $trnsf_amount;
	$sender_passbk = "passbook_".$sender_custmr_id;


                    $connection->autocommit(FALSE);

                    $sql1 = "UPDATE customers_account SET Current_Balance = '$receiver_netbal' WHERE customers_account.Account_no = '$receiver_ac_no'";

                    $sql2 = "UPDATE customers_account SET Current_Balance = '$sender_netbal' WHERE customers_account.Account_no = '$sender_ac_no'";

                    $transaction_id = mt_rand(100,999).mt_rand(1000,9999).mt_rand(10,99);


                    date_default_timezone_set('Africa/Lagos'); 
                    $transaction_date = date("d/m/y h:i:s A");

                    $Transac_description = $receiver_name ."/".$receiver_ac_no;

                    $sql3="INSERT INTO $sender_passbk(Transaction_Id, Transaction_date, Description, Cr_amount, Dr_amount,Net_Balance) values('$transaction_id','$transaction_date','$Transac_description','0','$trnsf_amount','$sender_netbal')";

                    $Transac_description = $sender_name. "/" . $sender_ac_no;

                    $sql4="INSERT INTO $receiver_passbk (Transaction_id,Transaction_date,Description,Cr_amount,Dr_amount,Net_Balance)
                    VALUES ('$transaction_id','$transaction_date','$Transac_description','$trnsf_amount','0','$receiver_netbal')";   
                    
                    if($connection->query($sql1) == TRUE && $connection->query($sql2) == TRUE && $connection->query($sql3) == TRUE && $connection->query($sql4)){
                        $connection->commit();

				date_default_timezone_set('Africa/Lagos'); 
				$date_time = date("d/m/y h:i:s A");
                unset($_SESSION['fund_trnsfer_otp']);
                unset($_SESSION['trnsf_amount']);
                unset($_SESSION['beneficiary_ac_no']);
                unset($_SESSION['trnsf_remark']);
    
                echo '<script>alert("Transaction Successful 🎉")
                location="transfer.php"</script>';
                                
                    }
                    
		else{
			
			
			echo "Transaction failed!\nPlease contact bank<br>".$connection->error;
			$connection->rollback();
		
			
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
