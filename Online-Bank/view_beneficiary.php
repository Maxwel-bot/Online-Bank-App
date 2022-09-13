<!DOCTYPE html>
<html>
<?php 

include 'customer_profile_header.php';
if($_SESSION['customer_login'] == FALSE)
{
	 header('location:customer_login.php');
     return 0;

}
include 'database.php';
$cust_id=$_SESSION['customer_Id'];
$sql = "SELECT * FROM beneficiary_$cust_id";
$result1 = $connection-> query($sql);
if($result1->num_rows <= 0){

    echo '<script>alert("No Beneficiary found")
    location="fund_transfer.php"</script>';

}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>View Beneficiary</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="dashb.css">
    <link rel="stylesheet" href="customer_profile_myacc.css">
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
                <a href="dashboard.php">
                <i class="fa-solid fa-grid-horizontal"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="account.php">
                    <i class="fas fa-user-circle"></i> <span>Account</span>
                </a>
            </li>
            <li>
                <a href="#">
                <i class="fa-solid fa-arrow-right-arrow-left"></i><span>Transfer</span>
                </a>
            </li>
            <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa-solid fa-money-bill"></i> <span>Beneficiary</span>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href=""><i class="fa-solid fa-arrow-right-arrow-left"></i><span>Add Beneficiary</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-piggy-bank"></i><span>Delete Beneficiary</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-solid fa-money-simple-from-bracket"></i><span>View Beneficiary</span></a>
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
                        <a href="customer_profile.php">Profile</a>
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
                    <div class="row gy-5">
                        <div class="pending_customer_account">
                        <table class="table">
                            <thead>
                                <th>Serial Number</th>
                                <th>Beneficiary Name</th>
                                <th>Beneficiary Account Number</th>
                                <th>Status</th>
                                <th>Date Added</th>
                            </thead>
                            <tbody>
                                <?php
                                include 'database.php';
                                $cust_id =$_SESSION['customer_Id'];
                                $sql ="SELECT * FROM beneficiary_$cust_id";
                                $result = $connection->query($sql);
                                if($result->num_rows > 0){
                                    $Sl_no = 1 ;
                                    while($row = $result->fetch_assoc()){
                                        echo '<tr>
                                     
                                        <td>'.$Sl_no++.'</td>
                                        <td>'.$row['Beneficiary_name'].'</td>
                                        <td>'.$row['Beneficiary_ac_no'].'</td>
                                        <td>'.$row['Status'].'</td>
                                        <td>'.$row['Date_added'].'</td>
                                         ';
                                    }
                                }
                                ?>
                            </tbody>
                            
                        </table>
                        </div>

                    </div>
                </div>
            </section>

            </div>
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