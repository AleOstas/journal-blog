<?php 
session_start();
include("../admin/connect.php");

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $sql->execute([$email, $password]);
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    if ($sql->rowCount() > 0) {

        if ($user['type'] == 1) {

            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['message'] = "Welcome " . " " . $user['name'] . "!";
            header("location: ../admin/admin.php");

        } else if ($user['type'] == 0) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['message'] = "Welcome " . " " . $user['name'] . "!";
            header("location: ../admin/user_dashboard.php");
        }
    }else {
            $_SESSION['status'] = 'User not found *';     
        }
    }


?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Forest Time - Stylish Magazine Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="../front/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../front/images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="../front/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="../front/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="../front/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="../front/css/colors.css" rel="stylesheet">

    <!-- Version Garden CSS for this template -->
    <link href="../front/css/version/garden.css" rel="stylesheet">

    <!-- Form validation -->
    <script defer src="script.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="navbar fixed-top navbar-inverse navbar-toggleable-md" style="background-color:#74a044">
                <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link color-green-hover" href="index.php">News</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link color-green-hover" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div><!-- end container -->
    </header><!-- end header -->

    <div id="wrapper">
        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="#"><img src="images/version/garden-logo.png" alt=""></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end header -->
                           <hr class="invis"> 
                 <section class="section wb">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="header">
                                        <h1 class="text-center">Log in or register</h1> 
                                        <?php include('message.php');?>
                                    </div>

                                    <div id="error" class="text-danger"></div>
                                    <form id="form" class="form-wrapper" method="post" enctype="multipart/form-data" onclick="return validateLoginForm()">
                                        <input type="text" id="email" name="email" class="form-control" placeholder="email@example.com">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary text-center">Login</button>
                                        </div>
                                        <p class="text-center">
                                            Don't have an account yet? <a href="register.php">Register here</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">
                                <a href="index.php"><img src="images/version/garden-footer-logo.png" alt="" class="img-fluid"></a>
                                
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-center">
                                    <form class="form-inline">
                                        <input type="text" class="form-control" placeholder="Enter your email address">
                                        <button type="submit" class="btn btn-primary">Subscribe <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <div class="copyright">&copy; Forest Time. Design: <a href="http://html.design">HTML Design</a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="../front/js/jquery.min.js"></script>
    <script src="../front/js/tether.min.js"></script>
    <script src="../front/js/bootstrap.min.js"></script>
    <script src="../front/js/custom.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAkADq7R0xf6ami9YirAM1N-yl7hdnYBhM "></script>
   
</body>
</html>