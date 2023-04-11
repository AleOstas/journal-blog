<?php 

include("../admin/connect.php"); 
include("../admin/register.php"); 

session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location: login.php');  
}

 //Fetch articless
 $sql = $conn->prepare("SELECT * FROM articles WHERE topic = 'News' ORDER BY date DESC LIMIT 0,3");
 $sql->execute();
 $articles = $sql->fetchAll(); 
 

?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>NewsWithAle</title>
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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline">
                        <input type="text" class="form-control" placeholder="What you are looking for?">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="topbar-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
                    </div> <!-- end col -->

                    <div class="col-lg-4 hidden-md-down">
                    </div><!-- end col -->
                
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="topsearch text-right">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a>
                             <!-- Dropdown button -->
                             <?php
            $profile = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $profile->execute([$user_id]);
            $fetchProfile = $profile->fetch(PDO::FETCH_ASSOC);
            ?> 

<div class="btn-group"> 
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"      aria-haspopup="true" aria-expanded="false"><img class="img-profile rounded-circle" width="50px;" height="50px;"
src="../admin/user_img/<?= $fetchProfile['image']; ?>">
    <?= $fetchProfile['name']; ?>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" class="text-gray" href="../admin/user_dashboard.php">Dashboard</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
    </div>
</div>      
                       </div><!-- end search -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end topbar -->

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

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Forest Timemenu" aria-controls="Forest Timemenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
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

        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                <div class="d-flex flex-row">
                <?php foreach($articles as $article):?>     
                        <div class="masonry-box post-media">
                             <img src="../admin/upload/<?php echo $article['image'];?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua" title="topic"><?php echo $article['topic']; ?></span>
                                        <h4><a href="singlepost.php?article_id=<?= $article['article_id']; ?>" title="title"><?php echo substr($article['title'], 0, 100); ?></a></h4>
                                        <small><a title="date"><?php echo $article['date']; ?></a></small>
                                        <small><a title="author"><?php echo $article['author']; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                        <?php endforeach;?>
                    </div><!-- end left-side -->                
                </section>

<?php
$page = $_GET["page"];
if($page == "" || $page == "1") {
   $page1 = 0;
}
else {
    $page1 = ($page*5)-5;
}
 $sql = $conn->prepare("SELECT * FROM articles LIMIT $page1,5");
 $sql->execute();
 $articles = $sql->fetchAll(); 

?>
        <section class="section wb">
            <div class="container">     
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                            <?php foreach($articles as $article):?>
                                <div class="blog-box row">
                                    <div class="col-md-3">
                                        <div class="post-media">
                                            <a href="singlepost.php" title="">
                                                <img src="../admin/upload/<?php echo $article['image'];?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div> <!--end media -->
                                    </div><!-- end col -->     
                                             
                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua" title="topic"><?php echo $article['topic']; ?></span>
                                        <h4><a href="singlepost.php?article_id=<?= $article['article_id']; ?>" title="title"><?php echo substr($article['title'], 0, 100). '...';?></a></h4>
                                        <p><?php echo substr($article['content'], 0, 150). '...'; ?></p>
                                        <small><i class="fa fa-eye"></i>1887</small>
                                        <small title="date"><?php echo $article['date']; ?></small>
                                        <small title="author">by Matilda</small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                
                                <hr class="invis">

                                <?php endforeach;?>
                                 
                                <hr class="invis">

                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->
                        
                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                    <?php //pagination
                                    $sql = $conn->prepare("SELECT * FROM articles");
                                    $sql->execute();
                                    $articles = $sql->fetchAll(); 
                                    $count = $sql->rowCount();
                                    $pages = $count / 5;
                                    $pages = ceil($pages); 
                                     for($i = 1; $i <= $pages; $i++) { ?>
                                        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i." "; ?></a></li>
                                        <?php
                                      }
                                         ?>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Search</h2>
                                <form class="form-inline search-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search on the site">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- end widget -->

<?php $sql = $conn->prepare("SELECT * FROM articles ORDER BY date DESC LIMIT 0,3");
 $sql->execute();
 $articles = $sql->fetchAll(); ?>
                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <?php foreach($articles as $article) :?>
                                        <a href="singlepost.php?article_id=<?= $article['article_id']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="../admin/upload/<?php echo $article['image'];?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?php echo substr($article['title'], 0, 100). '...';?></h5>
                                                <small><?php echo $article['date'];?></small>
                                            </div>
                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Advertising</h2>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="../admin/upload/<?php echo $article['image'];?>" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Instagram Feed</h2>
                                <div class="instagram-wrapper clearfix">
                                    <a href="#"><img src="upload/garden_sq_01.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_02.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_03.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_04.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_05.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_06.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_07.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_08.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_09.jpg" alt="" class="img-fluid"></a>
                                </div><!-- end Instagram wrapper -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    <ul>
                                        <li><a href="#">News <span>(21)</span></a></li>
                                        <li><a href="#">Sports <span>(15)</span></a></li>
                                        <li><a href="#">Travel <span>(31)</span></a></li>
                                        <li><a href="#">Design <span>(22)</span></a></li>
                                        <li><a href="#">Lifestyle <span>(66)</span></a></li>
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
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
                                <img src="images/version/garden-footer-logo.png" alt="" class="img-fluid">
    
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

</body>
</html>