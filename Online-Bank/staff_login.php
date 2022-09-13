<?php
session_start();
if(isset($_SESSION['staff_login'])){
	
	header('location:staff_profile.php') ;
	
}

 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>I-Bank</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
   
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="login.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    </head>

<body>
    <div class="wide" id="all">
        <!-- Top bar--> 
        <section class="py-5">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-7 mx-auto"> 
                        <form  method="post" >
                            <div class="row">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="email_address"  placeholder="STAFF NAME" name="staff_name" required ><br>
                                </div>
                                <div class=" mb-3"> 
                                    <input type="password" class="form-control" id="email" placeholder="PASSWORD" required name="password"><br>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-outline-light btn-lg" href="dashboard.php" name="staff_login-btn">login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

        
        <?php include 'staff_login_process.php'?>
</body>