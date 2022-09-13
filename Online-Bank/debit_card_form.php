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
                        <h4 class="lined text-center lined-center md-4">Debit Card Registration</h4><br><br>
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="holder-name">Account Holder Name</label>
                                        <input type="text" class="form-control" name="holder_name" >
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <label for="date_of birth">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" >
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" class="form-control" name="mob" >
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" class="form-control" name="acc_no" >
                                   </div>
                                   <div class="col-md-12">
                                    <button class="form-control btn btn-outline-primary" name="dbt_crd_submit" type="submit">Submit</button>
                                   </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php

if(isset($_POST['dbt_crd_submit'])){
    $holder_name = $_POST['holder_name'];
    $dob = $_POST['dob'];

    $mob = $_POST['mob'];
    $acc_no = $_POST['acc_no'];
    if(empty($_POST['holder_name']) || empty($_POST['dob']) ||empty($_POST['mob']) ||empty($_POST['acc_no'])){

        echo '<script>alert("No field should be empty")</script>';
    }
    else{

    include 'database.php'; 
    $sql = "SELECT * FROM customers_account WHERE Account_no = '$acc_no' ";
    $result = $connection->query($sql);
    if($result->num_rows <= 0){

        echo '<script>alert("No Data match with the details provided")</script>';

    }
    
    else{

    $row = $result->fetch_assoc();
    if(!is_numeric($mob) || (strlen($mob) > 10 || strlen($mob) < 10)){

        echo '<script>alert("Invalid Mobile Number\nPlease enter 10 Digit registered mobile number")</script>';

        }

        elseif($mob != $row['Mobile_no']){

            echo '<script>alert("Please enter your registered mobile number")</script>';
        }
        elseif($holder_name != $row['Username']){

            echo '<script>alert("Incorrect Account Holder Name")</script>';
            echo $row['Username'];
        }
        elseif($dob != $row['DOB']){

            echo '<script>alert("Incorrect Date of Birth\nPlease enter Date of Birth as on PAN Card")</script>';
    
        }
      
     

        else{
     
            
            $mob_no = $row['Mobile_no'];
           if($row['Debit_Card_No'] === NULL){

            $debit_card = "4213".mt_rand(1000,9999).mt_rand(1000,9999);
            $debit_card_pin = mt_rand(10,99).mt_rand(10,99);
            $sql = "UPDATE customers_account SET Debit_Card_No = '".$debit_card."', Debit_Card_Pin = '".$debit_card_pin."' WHERE Account_no = '$acc_no' ";
            if($connection->query($sql) == TRUE ){


           
	


            echo '<script>alert("Debit Card issued successfully.\n\nIt will be delivered to your home address soon.\n\nYour Debit Card No is : '.$debit_card.' and Pin is : '.$debit_card_pin.'\n\n Please change this pin as soon as possible.")</script>';
                
            }
      
        }

        else{

            echo '<script>alert("You have already applied for debit card\n\nYour Debit Card number is : '.$row['Debit_Card_No'].'")</script>';
        }

        }
    
    }
}

}
?>
</body>

</html>