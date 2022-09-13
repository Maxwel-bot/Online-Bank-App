<!DOCTYPE html>
<html>
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

    
           
            <section class="py-4">
                <div class="container py-3">
                    <div class="row gy-4">
                        <div class=" col-lg-7 mx-auto">
                        <h4 class="lined text-center lined-center md-4">E-Banking Registration</h4><br><br>
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="holder-name">Account Holder Name</label>
                                        <input type="text" class="form-control" name="holder_name" required >
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <label for="date_of birth">Account Number</label>
                                    <input type="text" class="form-control" name="accnum" required >
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <label for="mobile">Debit Card Number</label>
                                    <input type="text" class="form-control" name="dbtcard" required>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <label for="account_number">Debit Card Pin</label>
                                    <input type="password" class="form-control" name="dbtpin" required >
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <label for="mobile_number">Registered Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control" required>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <label for="dateofbirth">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" required>
                                   </div>
                               
                                   
                                   <div class="col-md-6 mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" name="cnfrm_password" required>
                                   </div>
                                   <div class="col-md-12">
                                    <button class="form-control btn btn-outline-primary" name="submit" type="submit">Submit</button>
                                   </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php
        if(isset($_POST['submit'])){
            if(empty($_POST['holder_name']) || empty($_POST['accnum']) ||
            empty($_POST['dbtcard']) || empty($_POST['dbtcard']) ||
            empty($_POST['dbtpin']) || 
            empty($_POST['mobile']) ||
            empty($_POST['dob']) || empty($_POST['password']) ||
            empty($_POST['cnfrm_password'])){

        echo '<script>alert("Field should not be empty")</script>';
    }
    else{
        error_reporting(0);

        include 'database.php';

        $holder_name=$_POST['holder_name'];
        $account_no=$_POST['accnum'];
        $debitcard_no=$_POST['dbtcard'];
        $debitcrd_pin=$_POST['dbtpin'];
        $dob=$_POST['dob'];
        $mobileno=$_POST['mobile'];
        
        $password=md5($_POST['password']);
        $cnfrm_password = md5($_POST['cnfrm_password']);

        $sql1="SELECT * FROM customers_account WHERE Account_no ='$account_no'";
        $result1= $connection->query($sql1);
        $row1 = $result1->fetch_assoc();
        $custmr_id = $row1['Customer_ID'];

        if($result1->num_rows > 0){
            //Get Last transaction (Dr) amount
        $sql2 = "SELECT  Cr_amount FROM passbook_$custmr_id WHERE Id=(SELECT max(Id) FROM passbook_$custmr_id) ";
        $result2 = $connection->query($sql2);
        $row2 = $result2->fetch_assoc();
        echo $last_trans_cr = $row2['Cr_amount'];

        //Get Last transaction (Cr) amount
        $sql3 = "SELECT  Dr_amount FROM passbook_$custmr_id WHERE Id=(SELECT max(Id) FROM passbook_$custmr_id)  ";
        $result3 = $connection->query($sql3);
        $row3 = $result1->fetch_assoc();
        echo $last_trans_dr = $row3['Dr_amount'];

        
        if($row1['Username'] != $holder_name ){

            echo '<script>alert("Incorrect Account Holder Name")</script>';
        }

        elseif($row1['Debit_Card_No'] != $debitcard_no){
            
            echo '<script>alert("Incorrect Debit Card Number")</script>';
 
        }

        elseif($row1['Debit_Card_Pin'] != $debitcrd_pin){

            echo '<script>alert("Incorrect Pin")</script>';
         }

         elseif($row1['Mobile_no'] != $mobileno){

            echo '<script>alert("Incorrect PAN number")</script>';
        }

        elseif($row1['DOB'] != $dob){

            echo '<script>alert("Incorrect Date of Birth\nPlease enter Date of Birth as on PAN Card")</script>';

        }
     

        elseif( $password != $cnfrm_password){

            echo '<script>alert("Password and Confirm password should be same")</script>';

        }
        
        elseif($row1['Password'] != NULL){

            echo '<script>alert("You have already registerd for Internet banking, you cannot register again")
            location="customer_login.php"</script>';

        }
        
        else{


            $sql="UPDATE customers_account SET  Password='$password' WHERE customers_account.Customer_ID= '$custmr_id' ";
		    $connection->query($sql);
		    if($result=$connection->query($sql)== TRUE){	
			
				
			echo '<script>alert("Registration Successfull\n\nCustomer ID : '.$custmr_id.' \n\nPlease use this customer id to login")</script>';
			
            }
            else{

                echo '<script>alert("Registration Failed")</script>';
                
            }   

            

        }

     }

            else{

                echo '<script>alert("Account number not found")</script>';
            }

        }
        }

?>


 
       
</body>

</html>