<!DOCTYPE html>
<html>
<?php
error_reporting(0);
session_start();
require('database.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>I-Bank</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
    <!-- Choices.js [Custom select]-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.css">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="bb.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>


    <div class="wide" id="all">
        <!-- Top bar-->
        <div class="top-bar py-2" id="topBar" style="background: #555">
            <div class="container px-lg-0 text-light py-1">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6 d-md-block d-none">
                        <p class="mb-0 text-xs">Contact us on +420 777 555 333 or hello@universal.com.</p>
                    </div>

                </div>
            </div>
        </div>

        <header class="nav-holder make-sticky">
            <div class="navbar navbar-light bg-white navbar-expand-lg py-0">
                <div class="container py-3 py-lg-0 px-lg-0">
                    <a class="navbar-brand"><img class="d-none d-md-inline-block" src="img/logo.png" alt="Universal logo"><img class="d-inline-block d-md-none" src="img/logo-small.png" alt="Universal logo"><span class="sr-only">Universal - go to homepage</span></a>
                    <button class="navbar-toggler text-primary border-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navigationCollapse" aria-controls="navigationCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="sr-only">Toggle navigation</span><i class="fas fa-align-justify"></i></button>
                    <div class="collapse navbar-collapse" id="navigationCollapse">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link " href="home.php" role="button">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php" role="button">About</a></li>
                            <li class="nav-item"><a class="nav-link" role="button">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="customer_login.php">SIGN IN</a></li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="conactMegamenu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sign up</a>
                                <ul class="dropdown-menu dropdown-menu-end m-0" aria-labelledby="contactMegamenu">
                                    <li><a class="dropdown-item text-uppercase border-bottom" href="customer_reg_form.php">Personal Account</a></li>
                                    <li><a class="dropdown-item text-uppercase border-bottom" href="Bank.php">Co-operate Account</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
        </header>
        <section class="bg-pentagon py-4">
            <div class="container py-3">
                <div class="row d-flex align-items-center gy-4">
                    <div class="col-md-7">
                        <h1 class="text-uppercase">Contact</h1>

                    </div>
                    <div class="col-md-5">
                        <!-- Breadcrumb-->
                        <ol class="text-sm justify-content-start justify-content-lg-end mb-0 breadcrumb undefined">
                            <li class="breadcrumb-item"><a class="text-uppercase" href="ome.php">Home</a></li>
                            <li class="breadcrumb-item text-uppercase active">Contact </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="container py-4">
            <?php
if(isset($_POST['send'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email_address=$_POST['email_address'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];


    $QUERY=mysqli_query($connection, "insert into contact(firstname,lastname,email_address,subject,message) values('$firstname','$lastname','$email_address','$subject','$message')");
    if($QUERY){
        $alert="<div class='alert alert-warning' role='alert'>Message Sent Successfully</div>";
    }
    else{
      $alert="";
    }
}

?>
                <h2 class="text-uppercase lined mb-4">We are here to help you</h2>
                <p class="lead mb-5">Are you curious about something? Do you have some kind of problem with our products? As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built gay party world. Of so am he remember although
                    required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity.</p>
                <p class="text-sm mb-5">Please feel free to contact us, our customer service center is working for you 24/7.</p>

                <div class="row gy-5 mb-5">
                    <div class="col-lg-4  block-icon-hover text-center">
                        <div class="icon icon-outlined icon-thin mx-auto icon-outlined-primary mb-3"><i class="fas fa-map-marker-alt"></i></div>
                        <h4 class="text-uppercase mb-3">Address</h4>
                        <p class="text-gray-600 text-sm">13/25 New Avenue<br>New Heaven, 45Y 73J<br>England, <strong>Great Britain</strong></p>
                    </div>
                    <div class="col-lg-4 block-icon-hover text-center">
                        <div class="icon icon-thin icon-outlined icon-outlined-primary mx-auto mb-3"><i class="fas fa-map-marker-alt"></i></div>
                        <h4 class="text-uppercase  mb-3">Call Center</h4>
                        <p class="text-gray-600 text-sm">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                        <p class="text-gray-600 text-sm"><strong>+33 555 444 333</strong></p>
                    </div>
                    <div class="col-lg-4 block-icon-hover text-center">
                        <div class="icon icon-outlined icon-outlined-primary icon-thin mx-auto mb-3"><i class="fas fa-map-marker-alt"></i></div>
                        <h4 class="text-uppercase mb-3">Electronic Support</h4>
                        <p class="text-gray-600 text-sm">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                        <ul class="list-unstyled text-sm mb-0">
                            <li><strong><a href="mailto:">info@fakeemail.com</a></strong></li>
                            <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <h2 class="lined lined-center text-uppercase md-4">Contact form</h2>
                        <form action="#" method="post">
                        <?php
                                echo $alert;?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="firstname" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="lastname" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email_address" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="subject">Subject</label>
                                    <input type="text" class="form-control" id="sub" name="subject">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" rows="4" id="messages" name="message" ></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-outline-primary" type="submit" name="send" value="send_message"><i class="far fa-envelope me-2"></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="bg-dark py-5">
                <div class="container">
                    <div class="row align-items-cenrer gy-3 text-center">
                    <ul class="list-inline">
                            <li class="list-inline-item"><a class="social-link facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a class="social-link twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="social-link youtube" href="#"><i class="fab fa-youtube"></i></a></li>
                            <li class="list-inline-item"><a class="social-link email" href="#"><i class="fas fa-envelope"></i></a></li>
                        </ul>
                        <div class="col-md-6 text-md-start">
                            <p class="mb-0 text-gray-500">© 2022 Maxwell Project.Inc</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/waypoints/lib/noframework.waypoints.js"></script>
        <script src="vendor/swiper/swiper-bundle.min.js"></script>
        <script src="vendor/choices.js/public/assets/scripts/choices.js"></script>
        <script src="js/theme.js"></script>
        <script>
            // ------------------------------------------------------- //
            //   Inject SVG Sprite - 
            //   see more here 
            //   https://css-tricks.com/ajaxing-svg-sprite/
            // ------------------------------------------------------ //
            function injectSvgSprite(path) {

                var ajax = new XMLHttpRequest();
                ajax.open("GET", path, true);
                ajax.send();
                ajax.onload = function(e) {
                    var div = document.createElement("div");
                    div.className = 'd-none';
                    div.innerHTML = ajax.responseText;
                    document.body.insertBefore(div, document.body.childNodes[0]);
                }
            }
            // this is set to BootstrapTemple website as you cannot 
            // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
            // while using file:// protocol
            // pls don't forget to change to your domain :)
            injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
        </script>
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</body>