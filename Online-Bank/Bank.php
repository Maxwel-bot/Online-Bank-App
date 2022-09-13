<?php
error_reporting();
session_start();
require('bankdatabase.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Bank Regisration</title>
    <script>
        function showPreview(event){
            if(event.target.files.length>0){
                var src =URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("image-preview");
                preview.src =src;
                preview.style.display="block";
                preview.style.width = "100%";
            }
        }
    </script>

    <style>
    .form-input input{
    display: none;
    }
    .form-input label{
                        display: block;
                        width: 45%;
                        height: 45px;
                        margin-left: 25%;
                        background: black;
                        line-height: 50px;
                        text-align: center;
                        border-radius: 10px;
                        font-size: 15px;
                        color: white;
                        margin-top: 10px;
                        cursor: pointer;
                    }
     .form-input{
        margin-left: 300px;
     }               
                </style>
</head>
<?php


if(isset($_POST['register'])){
    $passport=$_FILES['photo']['name'];
    $category=$_POST['category'];
    $account_type=$_POST['account_type'];
    $name=$_POST['name'];
    $certificate=$_POST['certificate'];
    $date=$_POST['date'];
    $type_of_business=$_POST['type'];
    $industry=$_POST['sector'];
    $operating_business_address=$_POST['address'];
    $registered_address=$_POST['regaddress'];
    $lga=$_POST['LGA'];
    $state=$_POST['state'];
    $website=$_POST['website'];
    $email=$_POST['email'];
    $mobile_number=$_POST['mobile'];
    $phone_number=$_POST['phone']; 
    $fixed=450;
    $account_number=$fixed.mt_rand(1100000,9999999);
    

    mkdir("passport/".$name);
   
                //filename
                $type=pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);


        $QUERY=mysqli_query($connection,"select * from newaccounts where name='$name'");
    
    $count=mysqli_num_rows($QUERY);

    if($count==0){
        $query=mysqli_query($connection,"insert into newaccounts(passport,category,account_type,name,certificate,date,type_of_business,industry,operating_business_address,registered_address,lga,state,website,email,mobile_number,phone_number)values('$passport','$category','$account_type','$name','$certificate','$date','$type_of_business','$industry','$operating_business_address','$registered_address','$lga','$state','$website','$email','$mobile_number','$phone_number')");

        if($query){
            $message="Welcome $name,
            \nYour Account has been successfully created.\n Here is Your Account Number=$account_number\n\n Warm Regards";
            $header="BBC://maxwellmaxwell252@gmail.com";
            $sendmail=mail($email,$message,$header);
            $alert="Form Submitted";
        }

    if($query){
        $moved=move_uploaded_file($_FILES['photo']['tmp_name'],"passport/".$name."/".rand().".".$type);
       if($moved){
        $alert="Form Submitted";
       }
        
     }
    }
    else{
        $alert="Company Name already exists";

    }
}
   


?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 mx-auto border">
                <form method="post" enctype="multipart/form-data">
                     <h2>ACCOUNT OPENING FORM</h2><br>
                     <?php
                     echo $alert;?>
                     <div class="form-input">
                        <div style="width:150px;text-align:center;margin:0 auto;border:1px solid;">
                        <img id="image-preview">
                    </div>
                    <input type="file" class="" id="passport" name="photo" accept="image/*" onchange="showPreview(event);">
                        <label class="" for="passport">Choose file</label>
                     </div>
                     <div class="form-group">
                     <label for="catergory">Category of Business:</label><br>
                        <input type="radio"  id="LLC" name="category" value="Limited_Liability_Company">
                        <label for="categoryofBusiness">Limited Liabilty Company</label>
                        <input type="radio"  id="others" name="category" value="others">
                        <label for="categoryofBusiness">Others</label>
                    </div>
                    <div class="form-group">
                        <label for="typeofaccount">Account Type:</label><br>
                        <input type="radio"  id="current" name="account_type" value="current">
                        <label for="current">Current</label>
                        <input type="radio"  id="deposit" name="account_type" value="deposit">
                        <label for="deposit">Deposit</label>
                   </div>
                   <div class="form-group">
                    <label for="name">Company Name:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                   </div>
                   <div class="form-group">
                    <label for="name">Certificate of Incoperation Number:</label>
                    <input type="text" class="form-control" name="certificate" id="certificate" required>
                   </div>
                   <div class="form-group" data-provide="datepicker">
                    <label for="date">Date of Incorporation:</label>
                    <input type="date" class="form-control" name="date" required>
                   </div>
                   <div class="form-group">
                    <label for="nature">Type/Nature of Business:</label>
                    <input type="text" class="form-control" name="type" id="type" required>
                   </div>
                   <div class="form-group">
                    <label for="nature">Sector/Industry:</label>
                    <input type="text" class="form-control" name="sector" id="sector" required>
                   </div>
                   <div class="form-group">
                    <label for="nature">Operating Business Address 1:</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                   </div>
                   <div class="form-group">
                    <label for="nature">Registered Address:</label>
                    <input type="text" class="form-control" name="regaddress" id="regaddress" required>
                   </div>
                   <div class="form-group">
                    <label for="LGA">Local Government Area:</label>
                    <input type="text" class="form-control" name="LGA" id="LGA" required>
                   </div>
                   <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" class="form-control" name="state" id="state" required>
                   </div>
                   <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                   </div>
                   <div class="form-group">
                    <label for="nature">Website(if any):</label>
                    <input type="text" class="form-control" name="website" id="website">
                   </div>
                   <div class="form-group">
                    <label for="nature">Mobile Number:</label>
                    <input type="tel" class="form-control" name="mobile" id="mobile" required>
                   </div>
                   <div class="form-group">
                    <label for="nature">Phone Number:</label>
                    <input type="tel" class="form-control" name="phone" id="phone" required>
                   </div>
                   <br>
                   <div class="form-group mt-3">
                        <input type="submit" id="" name="register" value="Create Now">
                    </div>
                </form>

            </div>
        </div>
    </div>
 
    
</body>
</html>